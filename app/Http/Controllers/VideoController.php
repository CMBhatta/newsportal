<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Video;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('backend.video.index',compact('videos'));
    }

    public function create(){
        $categories = Category::all();
        return view('backend.video.create',compact('categories'));
    }

    public function store( Request $request){
        $request->validate([
            'category_name' => 'sometimes|string|max:255',
            'title'=>'required|string',
            'url'=>'required|string',
            'description'=>'required|string',
            'status' => 'required|in:active,inactive',

        ]);
        $video = new Video([
            'category_name'=>$request->input('category_name'),
            'title'=>$request->input('title'),
            'url'=>$request->input('url'),
            'description'=>$request->input('description'),
            'status'=>$request->input('status'),

        ]);
        $video->save();
        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }
    public function edit(string $id)
{
    $video = Video::find($id);
    return view('backend.video.edit', compact('video'));
}
   public function update(Request $request, $id){
    $request->validate([
        'category_name' => 'sometimes|string|max:255',
        'title'=>'required|string',
        'url'=>'required|string',
        'description'=>'required|string',
        'status' => 'required|in:active,inactive',

    ]);
    $video = Video::find($id);
    // Update the video record with the form data
    $video->category_name = $request->input('category_name');
    $video->title = $request->input('title');
    $video->url = $request->input('url');
    $video->description = $request->input('description');
    $video->status = $request->input('status');

    // Save the updated video record
    $video->save();

    // Redirect to a success page or back to the video list
    return redirect()->route('videos.index')->with('success', 'Video updated successfully');
   }
}
