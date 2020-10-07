<?php
namespace App\Domains\Missions\Controllers;

use App\Domains\Missions\Models\Mission;
use App\Domains\Missions\Repositories\MissionRepository;
use App\Domains\Missions\Requests\StoreMissionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MissionsController extends Controller
{
    public function index()
    {
        $missionsGlobal = Mission::global()
            ->get();

        $missions = Auth::user()->missions;

        return view('domains.missions.index')->with(compact('missions', 'missionsGlobal'));
    }

    public function preview(Mission $mission)
    {
        return view('mission')->with(compact('mission'));
    }

    public function show(Mission $mission)
    {
        return view('domains.missions.edit')->with(compact('mission'));
    }

    public function demo()
    {
        $mission = Mission::where('slug', 'm1')->first();

        return view('mission')->with(compact('mission'));
    }

    public function create()
    {
        return view('domains.missions.create');
    }

    public function store(StoreMissionRequest $request, MissionRepository $repository)
    {
        $filePath = $request->file('image')->storePublicly('public/missions');

        $mission = $repository->create(
            $request->input('title'),
            $filePath,
            Auth::user(),
            $request->answers()
        );

        return redirect(route('mission.index'))
            ->with('status', 'Zapisano pomyślnie');
    }

    public function delete(Mission $mission)
    {
        Storage::delete($mission->image);
        $mission->delete();

        return back()->with('status', 'Usunięto');
    }
}
