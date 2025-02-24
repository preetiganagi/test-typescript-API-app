<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::query();

        // Search by ingredients
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('ingredients', 'LIKE', "%{$search}%");
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        $recipe = Recipe::create([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'image' => $imagePath ? asset("storage/$imagePath") : null,
        ]);

        return response()->json($recipe, 201);
    }

    public function show($id)
    {
        return response()->json(Recipe::findOrFail($id));
    }

     /**
     * Update a recipe.
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        
        $recipe->update([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ]);

        return response()->json($recipe);
    }

    /**
     * Delete a recipe.
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return response()->json(['message' => 'Recipe deleted successfully']);
    }

    public function rateRecipe(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->rating = $request->rating;
        $recipe->save();

        return response()->json($recipe);
    }

}
