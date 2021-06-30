<?php

namespace App\Http\Controllers;

use App\Models\BatchYear;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BatchYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch_years=BatchYear::all();
        return view('admin.batch_year.index', compact('batch_years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.batch_year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        BatchYear::create([
            'year' => $request->year,
            'is_active' => true
        ]);

        if ($request->submit == 'add') {
            return redirect()->route('batch_year.create')
                ->with('success', 'Batch Year has been successfully created');
        }
        return redirect()->route('batch_year.index')
            ->with('success', 'Batch Year has been successfully created');
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
    public function edit(BatchYear $batch_year)
    {
        return view('admin.batch_year.edit', compact('batch_year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BatchYear $batch_year)
    {
        $batch_year = BatchYear::findOrFail($batch_year->id);
        $batch_year->update([
            'year' => $request->year,
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('batch_year.index')
            ->with('success', 'Batch Year has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BatchYear $batch_year)
    {
        $batch_year->delete();
        return redirect()->route('batch_year.index')
            ->with('success', 'Batch Year deleted successfully');
    }
}
