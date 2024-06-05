<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => 'true',
            'results' => Technology::with(['projects'])->orderByDesc('id')->get()
        ]);
    }
    public function show($id)
    {
        $technology = Technology::with(['projects'])->where('id', $id)->first();
        if ($technology) {
            return response()->json([
                'success' => 'true',
                'results' => $technology
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'results' => 'Not found'
            ]);
        }
    }
}
