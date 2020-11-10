<?php
namespace Tests\Feature;

use App\Domains\Games\Models\Game;
use App\Domains\Games\Models\RemoteToken;
use App\Domains\Games\Repositories\RemoteTokenRepository;
use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class RemoteTokenTest extends TestCase
{
    /**
     * @var RemoteTokenRepository
     */
    private $tokenRepository;

    /**
     * @var Game
     */
    private $game;

    protected function setUp() : void
    {
        parent::setUp();

        /** @var Game game */
        $this->game = Game::factory()
            ->for(User::factory())
            ->has(Mission::factory()->count(3))
            ->create();

        $this->tokenRepository = app(RemoteTokenRepository::class);
    }

    /** @test */
    public function it_creates_remote_token_correctly()
    {
        // when
        /** @var RemoteToken $token */
        $token = $this->tokenRepository
            ->create($this->game->user, $this->game);

        // then
        $this->assertNotNull($token);
        $this->assertInstanceOf(RemoteToken::class, $token);

        $this->assertNotNull($token->user);
        $this->assertInstanceOf(User::class, $token->user);

        $this->assertNotNull($token->game);
        $this->assertInstanceOf(Game::class, $token->game);

        $this->assertNull($token->expires_at);
        $this->assertTrue($token->isValid());
    }

    /** @test */
    public function token_without_expiration_gives_unlimited_access()
    {
        // given
        $token = $this->tokenRepository
            ->create($this->game->user, $this->game);

        // when
        $response = $this->get(route('remote', ['token' => $token->token]));

        // then
        $response->assertOk();

        // when
        Carbon::setTestNow(Carbon::now()->addDay());
        $response = $this->get(route('remote', ['token' => $token->token]));

        // then
        $response->assertOk();
    }

    /** @test */
    public function token_expires_after_some_time()
    {
        // given
        $token = $this->tokenRepository
            ->create($this->game->user, $this->game, Carbon::now()->addHour());

        // when
        $response = $this->get(route('remote', ['token' => $token->token]));

        // then
        $response->assertOk();

        // when
        Carbon::setTestNow(Carbon::now()->addDay());
        $response = $this->get(route('remote', ['token' => $token->token]));

        // then
        $response->assertStatus(403);
    }

    /** @test */
    public function token_is_removed_if_game_gets_deleted()
    {
        // given
        $token = $this->tokenRepository
            ->create($this->game->user, $this->game, Carbon::now()->addHour());

        // when
        $this->game->delete();
        $response = $this->get(route('remote', ['token' => $token->token]));

        // then
        $response->assertStatus(404);
        $this->assertNull($token->fresh());
    }
}
