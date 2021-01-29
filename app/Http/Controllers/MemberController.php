<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.member.index');
        $members = Member::latest()->paginate(5);
        return view('admin.member.index', compact('members'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request) 
    {
        // notice that this func is not using default Request
        // but use SApp\Http\Requests\StoreMemberRequest
        // as input request validator

        Member::create([
            'name' => $request->name,
            'code' => strtoupper($request->code),
            'position' => $request->position,
            'generation' => $request->generation,
            'batch_year' => $request->batch_year,
            'status' => $request->status,
            'socmed' => [
                'linkedin' => $request->sm_linkedin,
                'github' => $request->sm_github,
                'instagram' => $request->sm_instagram,
            ],
        ]);

        if($request->submit == 'add'){
            return redirect()->route('member.create')->with('success', 'Member added successfully');
        }

        return redirect()->route('member.index')->with('success', 'Member added successfully');
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
        $member = Member::where('code', $code)->first();
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        // notice that this func is not using default Request
        // but use SApp\Http\Requests\UpdateMemberRequest
        // as input request validator

        Member::find($id)->update([
            'name' => $request->name,
            'code' => strtoupper($request->code),
            'position' => $request->position,
            'generation' => $request->generation,
            'batch_year' => $request->batch_year,
            'status' => $request->status,
            'socmed' => [
                'linkedin' => $request->sm_linkedin,
                'github' => $request->sm_github,
                'instagram' => $request->sm_instagram,
            ],
        ]);

        return redirect()->route('member.index')->with('success', 'Member edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect()->route('member.index')->with('success', 'Member deleted successfully');
    }
}
