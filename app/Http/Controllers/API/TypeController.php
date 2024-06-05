<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => 'true',
            'results' => Type::orderByDesc('id')->get()
        ]);
    }
    public function show($id)
    {
        $type = Type::with(['projects'])->where('id', $id)->first();
        if ($type) {
            return response()->json([
                'success' => 'true',
                'results' => $type
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'results' => 'Not found'
            ]);
        };
    }
};
