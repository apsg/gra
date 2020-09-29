<?php
namespace App\Domains\Missions\Controllers;

use App\Domains\Missions\Models\Mission;
use App\Http\Controllers\Controller;

class MissionsController extends Controller
{
    public function index()
    {
        $missions = Mission::all();

        return view('domains.missions.index')->with(compact('missions'));
    }

    public function show(Mission $mission)
    {
        return view('mission')->with(compact('mission'));
    }

    public function demo()
    {
        $mission = Mission::where('slug', 'm1')->first();

        return view('mission')->with(compact('mission'));
    }

}
