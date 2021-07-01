<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(5);
        return view('admin.user.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'code' => 'required|alpha|unique:users|size:3',
        ]);

        $image = $request->file('image');
        $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
        $image->storeAs('public/images/profile/', $fileName);   

        User::create([
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
            'password' => Hash::make($request->nim),
            'profile_photo_path' => $fileName,
        ]);

        if($request->submit == 'add'){
            return redirect()->route('user.create')->with('success', 'User added successfully');
        }
        return redirect()->route('user.index')->with('success', 'User added successfully');
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
    public function edit($code)
    {
        $user = User::where('code', $code)->first();
        return view('admin.user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        if ($request->file('image') != ""){
            
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'code' => 'required|alpha|unique:users|size:3',
            ]);

            Storage::disk('local')->delete('public/images/profile/'.$user->profile_photo_path);

            $image = $request->file('image');
            $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/profile/', $fileName);

            User::find($id)->update([

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
                'password' => Hash::make($request->nim),
                'profile_photo_path' => $fileName,
            ]);

        }else{
            User::find($id)->update([

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
                'password' => Hash::make($request->nim),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        //delete image
        Storage::disk('local')->delete('public/images/profile/' . $user->profile_photo_path);

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}
