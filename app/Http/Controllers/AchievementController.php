<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use App\Models\UserHasAchievement;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements=Achievement::latest()->paginate(5);
        return view('admin.achievement.index', compact('achievements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        $userAchievements= UserHasAchievement::all();
        return view('admin.achievement.create',compact('users','userAchievements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Achievement $achievement,UserHasAchievement $userAchievement)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
        $image->storeAs('public/images/achievements/', $fileName);
        
        
        $achievementt = $achievement->create([
            'name' => $request->name,
            'image' => $fileName,
            'description' => $request->description,
            'year' => $request->year,
        ]);

        foreach($request->user as $usr)
        {
            $userrAchievement= $userAchievement->create([
                'achievement_id' => $achievementt->id,
                'user_id' => $usr,
            ]);
        }

        if ($request->submit == 'add') {
            return redirect()->route('achievement.create')
                ->with('success', 'Achievement has been successfully created');
        }
        return redirect()->route('achievement.index')
            ->with('success', 'Achievement has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        $users= User::all();
        $userAchievements= UserHasAchievement::all();
        return view('admin.achievement.edit', compact('achievement','users','userAchievements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement,UserHasAchievement $userAchievement)
    {
        //get data Achievements ID
        $achievement = Achievement::findOrFail($achievement->id);

        if ($request->file('image') != "") {
            //delete the old pict first
            Storage::disk('local')->delete('public/images/achievements/'.$achievement->image);

            //upload new image
            $image = $request->file('image');
            $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/achievements/', $fileName);


            $achievementt=$achievement->update([
                'name' => $request->name,
                'image' => $fileName,
                'description' => $request->description,
                'year' => $request->year,
            ]);

            foreach($request->user as $usr)
            {
                $userAchievement->update([
                    'achievement_id' => $achievementt->id,
                    'user_id' => $usr,
                ]);
            }

        } else {

            $achievementt=$achievement->update([
                'name' => $request->name,            
                'description' => $request->description,
                'year' => $request->year,
            ]);

            foreach($request->user as $usr)
            {
                $userAchievement->update([
                    'achievement_id' => $achievementt->id,
                    'user_id' => $usr,
                ]);
            }
        }

        return redirect()->route('achievement.index')
            ->with('success', 'achievement has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        //delete image
        Storage::disk('local')->delete('public/images/achievements/' . $achievement->image);

        return redirect()->route('achievement.index')
            ->with('success', 'Achievement deleted successfully');
    }
}
