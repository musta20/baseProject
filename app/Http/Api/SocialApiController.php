<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialRequest;
use App\Models\Social;

class SocialApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index']);
    }

    public function index()
    {
        $socialLinks = Social::latest()->paginate(10);

        return response()->json(['social_links' => $socialLinks]);
    }

    public function store(StoreSocialRequest $request)
    {
        $socialLink = Social::create($request->validated());

        return response()->json(['message' => 'Social link created successfully.', 'social_link' => $socialLink], 201);
    }

    public function show(Social $social)
    {
        return response()->json(['social_link' => $social]);
    }

    public function update(StoreSocialRequest $request, Social $social)
    {
        $social->update($request->validated());

        return response()->json(['message' => 'Social link updated successfully.', 'social_link' => $social]);
    }

    public function destroy(Social $social)
    {
        $social->delete();

        return response()->json(['message' => 'Social link deleted successfully.']);
    }
}
