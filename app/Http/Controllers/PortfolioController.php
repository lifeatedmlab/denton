<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(5);

        return view('admin.portfolio.index', compact('portfolios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/images/', $image->hashName());

        Portfolio::create([
            'name' => $request->name,
            'image' => $image->hashName(),
            'description' => $request->description,
            'year' => $request->year,
            'link' => $request->link
        ]);

        if ($request->submit == 'add') {
            return redirect()->route('portfolio.create')
                ->with('success', 'Portfolio has been successfully created');
        }
        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio has been successfully created');
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
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {        
        //get data portfolio ID
        $portfolio = Portfolio::findOrFail($portfolio->id);

        if ($request->file('image') != "") {
            //delete the old pict first
            Storage::disk('local')->delete('public/images/'.$portfolio->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images/', $image->hashName());

            $portfolio->update([
                'name' => $request->name,
                'image' => $image->hashName(),
                'description' => $request->description,
                'year' => $request->year,
                'link' => $request->link
            ]);
        } else {

        $portfolio->update([
            'name' => $request->name,            
            'description' => $request->description,
            'year' => $request->year,
            'link' => $request->link
        ]);
        }

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        //delete image
        Storage::disk('local')->delete('public/images/' . $portfolio->image);

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio deleted successfully');
    }
}
