<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']); // Apply authentication to all except 'index' and 'show'
    }

    public function index()
    {
        $slides = Slide::latest()->paginate(10);

        return response()->json(['slides' => $slides]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'des' => 'required|string|max:255|min:3',
            'url' => 'required|string|max:255|min:3',
        ]);

        $validatedData['img'] = $request->file('img')->store('slides');

        $slide = Slide::create($validatedData);

        return response()->json(['message' => 'Slide created successfully', 'slide' => $slide], 201);
    }

    public function show(Slide $slide)
    {
        return response()->json(['slide' => $slide]);
    }

    public function update(Request $request, Slide $slide)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'img' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'des' => 'required|string|max:255|min:3',
            'url' => 'required|string|max:255|min:3',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('slides');
        }

        $slide->update($validatedData);

        return response()->json(['message' => 'Slide updated successfully', 'slide' => $slide]);
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();

        return response()->json(['message' => 'Slide deleted successfully']);
    }
}
