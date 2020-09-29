<?php
namespace App\Domains\Missions\Controllers;

use App\Domains\Missions\Models\Mission;
use App\Http\Controllers\Controller;

class MissionsController extends Controller
{
    public function show(Mission $mission)
    {
        return view('mission')->with(compact('mission'));
    }
}
