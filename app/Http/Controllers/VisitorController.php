<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function updateLocation(Request $request)
    {
        $visitor = Visitor::where('ip', $request->ip())->latest()->first();

        if ($visitor) {
            $visitor->update([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}