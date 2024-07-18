<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'details' => 'nullable|string|max:1000',
        ]);

        $location = Location::create([
            'country' => $request->country,
            'city' => $request->city,
            'details' => $request->details,
        ]);

        return response()->json([
            'success' => true,
            'data' => $location
        ]);
    }

    public function show($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $location,
        ]);
    }
}
