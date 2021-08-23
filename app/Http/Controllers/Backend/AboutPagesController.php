<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutPagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $about = About::all();
        return view('backend.about.list', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title1' => 'required|string',
            'title2' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        $about = new About;
        $about->title1 = $request->title1;
        $about->title2 = $request->title2;
        $about->description = $request->description;


        $image = $request->file('image');
        Storage::putFile('public/img/', $image);
        $about->image = "storage/img/" . $image->hashName();

        $about->save();

        return redirect()->route('admin.about.create')->with('success', " New About created successfully!");
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
    public function edit($id)
    {
        $about = About::find($id);
        return view('backend.about.edit', compact('about'));
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
        $this->validate($request, [

            'title1' => 'required|string',
            'title2' => 'required|string',
            'description' => 'required|string',
        ]);

        $about = About::find($id);
        $about->title1 = $request->title1;
        $about->title2 = $request->title2;
        $about->description = $request->description;


        if ($request->file('image')) {
            $image = $request->file('image');
            Storage::putFile('public/img/', $image);
            $about->image = "storage/img/" . $image->hashName();
        }

        $about->save();

        return redirect()->route('admin.about.list')->with('success', " About Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        @unlink(public_path($about->image));
        $about->delete();
        return redirect()->route('admin.about.list')->with('success', " Portfolio Deleted Successfully!");
    }
}
