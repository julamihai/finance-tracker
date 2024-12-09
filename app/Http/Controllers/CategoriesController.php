<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Categories::where('user_id', Auth::id())->get();
        $types=Categories::TYPES;
        return view('./categories/index',compact('categories','types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        $categories = new Categories();
        $categories->user_id = Auth::id();
        $categories->title = $request->input('title');
        $categories->type = $request->input('type');

        if ($categories->title !== null && $categories->type !== null) {
            $categories->save();
            return redirect()->route('categories.index')->with('success', 'Category added successfully!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not selected, Please select the category first!');
        }
    }

    public function edit(int $id)
    {
        $category = Categories::find($id);
        $types = Categories::TYPES;
        return view('./categories/edit',compact('category', 'types'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title'=>'required',
            'type'=>'required'
        ]);

        $category = Categories::find($id);

        $category->update([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy(int $id)
    {
        $category = Categories::find($id);
        if ($category) {
            session()->flash('success', 'Category deleted successfully!');
            $category->delete();
            return redirect()->route('categories.index')->with('message', 'Success, category deleted successfully!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found!');
        }
    }
}
