<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profileId=Auth::user()->id;
        $profile = User::findOrFail($profileId);

            if ($request->file('image') != "" && $request->password != ""  ){
                
                $request->validate([
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    
                ]);

                Storage::disk('local')->delete('public/images/profile/' . Auth::user()->profile_photo_path);

                $image = $request->file('image');
                $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
                $image->storeAs('public/images/profile/', $fileName);

                Auth::user()->update([

                    'name' => $request->name,
                    'code' => strtoupper($request->code),
                    'nim' => $request->nim,
                    'generation' => $request->generation,
                    'batch_year' => $request->batch_year,
                    'status' => $request->status,
                    'socmed' => [
                        'linkedin' => $request->sm_linkedin,
                        'github' => $request->sm_github,
                        'instagram' => $request->sm_instagram,
                    ],
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'profile_photo_path' => $fileName,
                ]);

            }else{
                Auth::user()->update([

                    'name' => $request->name,
                    'code' => strtoupper($request->code),
                    'nim' => $request->nim,
                    'generation' => $request->generation,
                    'batch_year' => $request->batch_year,
                    'status' => $request->status,
                    'socmed' => [
                        'linkedin' => $request->sm_linkedin,
                        'github' => $request->sm_github,
                        'instagram' => $request->sm_instagram,
                    ],
                    'email' => $request->email,
                ]);
            }

        return redirect()->route('profile.index')
             ->with('success', 'Profile has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
