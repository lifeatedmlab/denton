<?php

namespace App\Http\Controllers;

use App\Models\TermOfOffice;
use Illuminate\Http\Request;

class TermOfOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term_of_offices=TermOfOffice::all();
        return view('admin.term_of_office.index', compact('term_of_offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.term_of_office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TermOfOffice::create([
            'year' => $request->year,
        ]);

        if ($request->submit == 'add') {
            return redirect()->route('term_of_office.create')
                ->with('success', 'Term of Office has been successfully created');
        }
        return redirect()->route('term_of_office.index')
            ->with('success', 'Term of Office has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermOfOffice  $termOfOffice
     * @return \Illuminate\Http\Response
     */
    public function show(TermOfOffice $term_of_office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermOfOffice  $termOfOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(TermOfOffice $term_of_office)
    {
        return view('admin.term_of_office.edit', compact('term_of_office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermOfOffice  $termOfOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermOfOffice $term_of_office)
    {
        $term_of_office = TermOfOffice::findOrFail($term_of_office->id);
        $term_of_office->update([
            'year' => $request->year,
        ]);
        return redirect()->route('term_of_office.index')
            ->with('success', 'Term of Office has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermOfOffice  $termOfOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermOfOffice $term_of_office)
    {
        $term_of_office->delete();
        return redirect()->route('term_of_office.index')
            ->with('success', 'Term of Office deleted successfully');
    }
}
