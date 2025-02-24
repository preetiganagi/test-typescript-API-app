<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($recipeId)
    {
        $comments = Comment::where('recipe_id', $recipeId)->orderBy('created_at', 'desc')->get();
        return response()->json($comments);
    }

    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

        $comment = new Comment([
            'recipe_id' => $recipeId,
            'comment' => $request->comment,
        ]);
        $comment->save();

        return response()->json($comment, 201);
    }
}
