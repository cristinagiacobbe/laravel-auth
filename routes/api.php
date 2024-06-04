<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); */

Route::get('projects', function () {
    return response()->json([
        'success' => true,
        'results' => Project::with(['type', 'technologies'])->orderByDesc('id')->paginate(),
    ]);
});

Route::get('projects/{project}', function ($id) {
    return response()->json([
        'success' => true,
        'results' => Project::with(['type', 'technologies'])->where('id', $id)->first()
    ]);
});
