<?php
namespace App\Domains\Games\Seeders;

use App\Domains\Games\Models\Avatar;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    protected function avatars() : array
    {
        return [
            'images/avatars/mushroom.png',
            'images/avatars/mario.png',
            'images/avatars/cat.png',
            'images/avatars/ufo.svg',
        ];
    }

    public function run()
    {
        foreach ($this->avatars() as $avatar) {
            Avatar::firstOrCreate([
                'image' => $avatar,
            ]);
        }
    }
}
