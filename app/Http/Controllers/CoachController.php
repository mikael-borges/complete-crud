<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        Gate::authorize('create', Coach::class);
        
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $coach = new Coach();
        $coach->name = $request->name;
        $coach->image = 'images/'.$imageName;
        $coach->save();

        return redirect('coaches')->with('success', 'Coach created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', Coach::class);

        $coach = Coach::findOrFail($id);
        return view('coaches.edit', compact('coach'));
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $coach->name = $request->name;

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $coach->image = 'images/'.$imageName;
        }
        $coach->save();

        return redirect('coaches')->with('success', 'Coach updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Coach::class);
        $coach = Coach::findOrFail($id);
        $coach->delete();
        return redirect('coaches')->with('success', 'Coach deleted successfully.');
    }
}
