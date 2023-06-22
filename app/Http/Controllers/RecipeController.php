<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function index()
    {
        $loggedInUserId = session('user_id');

        $recipes = Recipe::with('category')->get();
        $recipes = $recipes->map(function ($recipe) use ($loggedInUserId) {
            $recipe->isMine = $recipe->user_id == $loggedInUserId;
            return $recipe;
        });

        return view('recipes.index', ['recipes' => $recipes]);
    }



    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('recipes.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_id' => 'required',
                'title' => 'required|max:255',
                'description' => 'required',
                'cooking_time' => 'required',
                'instruction' => 'required',
                'ingredients' => 'required',
            ]);

            $validatedData['user_id'] = session('user_id');
            $query = "INSERT INTO recipes (user_id, category_id, title, description, cooking_time, instruction, ingredients) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $values = [
                $validatedData['user_id'],
                $validatedData['category_id'],
                $validatedData['title'],
                $validatedData['description'],
                $validatedData['cooking_time'],
                $validatedData['instruction'],
                $validatedData['ingredients']
            ];

            DB::insert($query, $values);

            return redirect()->route('recipes.index')->with('success', 'Recipe added successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors([
                'message' => 'An error occurred while adding the recipe. Please check your input data.',
            ]);
        }
    }



    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        if (session('user_id') == $recipe->user_id) {
            $categories = Category::all();
            return view('recipes.edit', compact('recipe', 'categories'));
        } else {
            abort(403);
        }
    }




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'cooking_time' => 'required',
            'instruction' => 'required',
            'ingredients' => 'required',
        ]);

        DB::table('recipes')
            ->where('id', $id)
            ->update([
                'category_id' => $validatedData['category_id'],
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'cooking_time' => $validatedData['cooking_time'],
                'instruction' => $validatedData['instruction'],
                'ingredients' => $validatedData['ingredients'],
            ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }






    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }
}
