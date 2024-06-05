<?php

use App\Http\Controllers\API\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\TechnologyController;

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

Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{project}', [ProjectController::class, 'show']);

Route::get('types', [TypeController::class, 'index']);
Route::get('types/{type}', [TypeController::class, 'show']);

Route::get('technologies', [TechnologyController::class, 'index']);
Route::get('technologies/{technology}', [TechnologyController::class, 'show']);

//With closure
/* Route::get('types', function () {
    return response()->json([
        'success' => 'true',
        'results' => Type::orderByDesc('id')->get()
    ]);
}); */

/* Route::get('types/{type}', function ($id) {
    //  $type = Type::where('id', $id)->first();
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
}); */

/* Route::get('technologies', function () {
    return response()->json([
        'success' => 'true',
        'results' => Technology::with(['projects'])->orderByDesc('id')->get()
    ]);
}); */

/* Route::get('technologies/{technology}', function ($id) {
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
}); */
