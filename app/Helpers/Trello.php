<?php
namespace App\Helpers;

use GuzzleHttp\Client;

class Trello
{
    public static function createCard(string $title, string $description = null)
    {
        return \Http::post('https://api.trello.com/1/cards', [
            'key'         => env('TRELLO_KEY'),
            'token'       => env('TRELLO_TOKEN'),
            'idList'      => env('TRELLO_LIST'),
            'name'        => $title,
            'desc' => $description,
        ]);
    }
}
