<?php
namespace Tests\Feature\Subscriptions;

use Tests\TestCase;

class MissionsTest extends TestCase
{
    /** @test */
    public function not_logged_user_cannot_access_missions_page()
    {
        // given
        // guest user

        // when - then
        $this->get(route('mission.index'))
            ->assertRedirect('login');
    }

    /** @test */
    public function logged_user_can_access_missions_page()
    {
        // given
        $user = $this->createUser();

        // when
        $response = $this->actingAs($user)
            ->get(route('mission.index'));

        // then
        $response->assertOk()
            ->assertSee('Twoje misje');
    }

    /** @test */
    public function user_can_add_limited_number_of_missions()
    {
        // given
        

        // when

        // then

    }
}
