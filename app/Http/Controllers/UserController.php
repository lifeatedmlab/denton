<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function store(StoreUserRequest $request)
    {
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
            'password' => $request->nim,
            'profile_photo_path' => $request->getClientOriginalName(),

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
    public function update(UpdateUserRequest $request, $id)
    {
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
            'password' => $request->nim,
            'profile_photo_path' => $request->getClientOriginalName(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
