<?php
namespace App\Http\Controllers;

use App\Helpers\Trello;
use App\Http\Requests\SuggestionRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SuggestionsController extends Controller
{
    public function store(SuggestionRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        Trello::createCard(
            $user->name . ' ' . Carbon::now()->format('Y-m-d'),
            $request->text . PHP_EOL
            . '--' . PHP_EOL
            . $user->name . ' ' . $user->email . PHP_EOL
            . url()->previous()
        );
    }
}
