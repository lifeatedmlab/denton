<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::latest()->paginate(5);
        return view('admin.gallery.index', compact('galleries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
        $image->storeAs('public/images/gallery/', $fileName);

        Gallery::create([
            'image' => $fileName,
            'is_archive' => true,
            
        ]);

        if ($request->submit == 'add') {
            return redirect()->route('gallery.create')
                ->with('success', 'Gallery has been successfully created');
        }
        return redirect()->route('gallery.index')
            ->with('success', 'Gallery has been successfully created');
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
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
         //get data Gallery ID
         $gallery = Gallery::findOrFail($gallery->id);

         if ($request->file('image') != "") {
             //delete the old pict first
             Storage::disk('local')->delete('public/images/gallery/'.$gallery->image);
 
             //upload new image
            $image = $request->file('image');
            $fileName=date("Y-m-d-His").'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/profile/', $fileName);
 
             $gallery->update([
                 'image' => $fileName,
                 'is_archive' => true
             ]);
         } else {
 
         $gallery->update([
             'is_archive'=>true
         ]);
         
         }
 
         return redirect()->route('gallery.index')
             ->with('success', 'achievement has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        //delete image
        Storage::disk('local')->delete('public/images/gallery/' . $gallery->image);

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery deleted successfully');
    }
}
