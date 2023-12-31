<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Position;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(){
        $advertisements = Advertisement::all();
        $positions = Position::all();
        return view('backend.advertisement.index',compact('advertisements','positions'));
    }

    public function create(){

        $advertisements = Advertisement::all();
        $positions = Position::all();
        return view('backend.advertisement.create',compact('advertisements','positions')); 
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'position_id' => 'required|exists:positions,id',
            'description' => 'required|string',
            'url' => 'required|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:now', // Ensure end date is in the future or now
            'status' => 'required|in:active,inactive',
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/'), $fileName);

        $advertisement = new Advertisement();
        $advertisement->title = $request->input('title');
        $advertisement->image = $fileName;
        $advertisement->position_id = $request->input('position_id');
        $advertisement->description = $request->input('description');
        $advertisement->url = $request->input('url');
        $advertisement->start_date = $request->input('start_date');
        $advertisement->end_date = $request->input('end_date');
        $advertisement->status = $request->input('status');
        $advertisement->save();
        return redirect()->route('advertisements.index')
        ->with('success', 'News added successfully.');

    }
    public function edit(string $id)
{
    $advertisement = Advertisement::find($id);
    $positions = Position::all();
 
    return view('backend.advertisement.edit', compact('advertisement','positions'));
}
public function update(Request $request, string $id){
    $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
            'position_id' => 'required|exists:positions,id',
            'description' => 'required|string',
            'url' => 'required|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:now', // Ensure end date is in the future or now
            'status' => 'required|in:active,inactive',
    ]);
    $advertisement = Advertisement::findOrFail($id);
    if ($request->hasFile('image')) {
        // Delete old photo if exists
        if ($advertisement->image) {
            $oldImagePath = public_path('images/' . $advertisement->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $fileName = time() . '.' . $request->photo->extension();
        $request->image->move(public_path('images/'), $fileName);
        $advertisement->image = $fileName;
    }
    $advertisement->title = $request->input('title');
    $advertisement->position_id = $request->input('position_id');
    $advertisement->description = $request->input('description');
    $advertisement->url = $request->input('url');
    $advertisement->start_date = $request->input('start_date');
    $advertisement->end_date = $request->input('end_date');
    $advertisement->status = $request->input('status');
    $advertisement->save();
    return redirect()->route('advertisements.index')
    ->with('success', 'Advertisement Edited successfully.');
}

public function delete(string $id)
{
    $advertisement = Advertisement::findOrFail($id)->delete();
    return redirect()->route('advertisements.index')
    ->with('success', 'Advertisement deleted successfully.');
}
}
