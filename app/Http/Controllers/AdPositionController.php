<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdPositionController extends Controller
{
    public function index(){
        $positions = Position::where('status',1)->get();
     
        return view('backend.Adposition.index',compact('positions'));
    }

    public function create(){
        $positions = Position::all();
        return view('backend.Adposition.create',compact('positions'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'position' => 'required|unique:positions,position',
            'status' => 'required|in:active,inactive',
        ]);
            // Automatically generate the slug from the name
            $slug = Str::slug($validatedData['position']);

            // Create a new category with the generated slug
            Position::create([
                'position' => $validatedData['position'],
                'slug' => $slug, // Automatically filled slug
                'status' => $validatedData['status'],
            ]);
    
            return redirect()->route('positions.index')->with('success', 'Positions for advertisement section are created successfully');
    }
    public function edit(string $id){
    
        $position= Position::where('id',$id)->first();
        // dd($position);
        return view('backend.Adposition.edit', compact('position'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'position' => 'required|unique:positions,position',
            'status' => 'required|in:active,inactive',
        ]);
        $position = Position::find($id);
        $position->position = $request->input('position');
    $position->status = $request->input('status');
    $position->save();
    }
    public function delete(string $id)
{
    $position = Position::findOrFail($id)->delete();
    return redirect()->route('positions.index')
    ->with('success', 'Positions deleted successfully.');
}

}
