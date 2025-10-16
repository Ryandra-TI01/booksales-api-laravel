<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $authors = Author::all();
        if ($authors->isEmpty()) {
            return $this->errorResponse('No authors found',null, 404);
        }
        return $this->successResponse(AuthorResource::collection($authors), 'Authors retrieved successfully');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);
        $author = Author::create($validated);
        if (!$author) {
            return $this->errorResponse('Author could not be created',null, 500);
        }
        return $this->successResponse(new AuthorResource($author), 'Author created successfully',201);
    }

}
