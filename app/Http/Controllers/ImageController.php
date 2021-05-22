<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // tambahkan parameter $lang pada function dibawah jika ingin mengaktifkan localization
    // view($lang)
    public function view()
    {
        // Aktifkan untuk mengconfig otomatis tanpa mengganti locale dr config.app
        // App::setLocale($lang);
        $images = Image::all();
        return view('image',compact('images'));
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
    public function store(ImageRequest $request)
    {

        $image= $request->file('image');
        $new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('storage/images'),$new_name);
        Image::create([
            'title'=>$request->title,
            'description' => $request->description,
            'image' => $new_name,
        ]);
        return redirect('/upload')->with('success','Data has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image= $request->file('image');
        $new_name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('storage/images'),$new_name);

        $datas = Image::find($id);
        $datas->title = $request->title;
        $datas->description = $request->description;
        $datas->image = $new_name;
        $datas->save();

        return redirect('/upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        Storage::delete('images/'.$image->image);
        Image::where('id',$id)->delete();
        return redirect('/upload');
    }
}
