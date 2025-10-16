<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $genres = Genre::all();
        if ($genres->isEmpty()) {
            return $this->errorResponse('No genres found',null, 404);
        }
        return $this->successResponse(GenreResource::collection($genres), 'Genres retrieved successfully');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $genre = Genre::create($validated);
        if (!$genre) {
            return $this->errorResponse('Genre could not be created',null, 500);
        }
        return $this->successResponse(new GenreResource($genre), 'Genre created successfully',201);
    }
}
