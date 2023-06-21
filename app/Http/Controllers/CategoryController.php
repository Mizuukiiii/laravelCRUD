<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('categories')->insert([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }


    public function edit($id)
    {
        $category = DB::table('categories')
            ->select('id', 'name')
            ->where('id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $validatedData['name']]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = "Cannot delete the category because it has associated recipes.";
            return redirect()->back()->withErrors([$errorMessage]);
        }
    }

}
