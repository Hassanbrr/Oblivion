<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $singers = Singer::all();
        return view('index', compact('singers'));
    }


    public function create()
    {
        return view('/create');
    }
    public function store(Request $request)
    {
        if (!Auth::check() || (Auth::check() and Auth::user()->role != 2))
            return "<h1>Forbidden Action</h1>";
        $file = $request->file('imagefile');
        $uid = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
        $file->move('uploads', $uid);
        $request["image"] = $uid;
        $request["user_id"] = Auth::user()->id;
        Singer::create($request->all());



        return redirect()->route('index');
    }
    public function show(string $id)
    {
        //
    }
    public function edit($id)
    {
        $singers = Singer::findOrFail($id);
        return  view('edit', compact('singers'));
    }
    public function update(Request $request, string $id)
    {
        $singers = Singer::findOrFail($id);

        if (file_exists("uploads/" . $singers->image)) {
            unlink('uploads/' . $singers->image);
        };
        $file = $request->file('imagefile');
        $uid = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
        $file->move('uploads', $uid);
        $request["image"] = $uid;
        $request["user_id"] = Auth::user()->id;
        $singers->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
        ]);
        return redirect()->route('index');
    }
    public function destroy(string $id)
    {
        $singers = Singer::findOrFail($id);
        if (file_exists("uploads/" . $singers->image)) {
            unlink('uploads/' . $singers->image);
        };
        $singers->destroy($id);
        return redirect()->route('index');
    }
}
