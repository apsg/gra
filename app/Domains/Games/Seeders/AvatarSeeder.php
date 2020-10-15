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
            'images/avatars/mario-8-bit.gif',
            'images/avatars/cat.png',
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
