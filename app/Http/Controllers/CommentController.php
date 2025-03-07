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
            'comment' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'rating' => 'nullable|integer|min:1|max:5', 
            'recipe_id' => 'required|exists:recipes,id',
        ]);
        $comment = Comment::where('user_id',$request->user_id)->where('recipe_id',$recipeId)->first();
        if ($comment) {
            $request->rating ? $comment->rating = $request->rating : "" ;
            $request->comment ? $comment->comment =  $request->comment: "";
            $comment->save();

        }else{
            $comment = new Comment([
                'recipe_id' => $recipeId,
                'comment' => $request->comment ? $request->comment: "",
                'user_id' => $request->user_id,
                'rating' => $request->rating,
            ]);
            $comment->save();
        }
        
        

        return response()->json($comment, 201);
    }
}
