<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsdetail;

class NewsdetailsController extends Controller
{
    public function index(){
        $details= Newsdetail::all();
        return  view('backend.details.index',compact('details'));
    }
    public function create(){
        return  view('backend.details.create');
    }
    public function store(Request $request)
    {   $request->validate([
        'trendnews' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        'newshead' => 'required',
        'newsstart' => 'required',
        'description' => 'required',
    ]);

    $fileName = time() . '.' . $request->photo->extension();
    $request->photo->move(public_path('images/'), $fileName);
    
    $detail = new Newsdetail();
    $detail->trendnews = $request->input('trendnews');
    $detail->photo = $fileName;
    $detail->newshead = $request->input('newshead');
    $detail->newsstart = $request->input('newsstart');
    $detail->description = $request->input('description');
    $detail->save();
    return redirect()->route('newsdetails.index')
    ->with('success', 'News added successfully.');
}
public function edit(string $id)
{
    $detail = Newsdetail::find($id);
    return view('backend.details.edit', compact('detail'));
}
public function update(Request $request, string $id){
    $request->validate([
        'trendnews' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        'newshead' => 'required',
        'newsstart' => 'required',
        'description' => 'required',
    ]);
    $detail = Newsdetail::findOrFail($id);
    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($detail->photo) {
            $oldImagePath = public_path('images/' . $detail->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/'), $fileName);
        $detail->photo = $fileName;
    }
    $detail->newshead = $request->input('newshead');
    $detail->newsstart = $request->input('newsstart');
    $detail->description = $request->input('description');
    $detail->save();
    return redirect()->route('newsdetails.index')
    ->with('success', 'News Edited successfully.');
}
public function delete(string $id)
{
    $detail = Newsdetail::findOrFail($id)->delete();
    return redirect()->route('newsdetails.index')
    ->with('success', 'News deleted successfully.');
}
}
