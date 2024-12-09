<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses=Expense::where('user_id', Auth::id())->get();
        $categories=Categories::where('type', Categories::TYPE_EXPENSE)->where('user_id', Auth::id())->get();
        return view('expense.index', compact('expenses', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title',
            'amount',
            'category_id'
        ]);
        $expense=new Expense();
        $expense->user_id=Auth::id();
        $expense->title=$request->input('title');
        $expense->amount=$request->input('amount');
        if ($expense->category_id=$request->input('category_id') !== null){
            $expense->save();
            return redirect()->route('expense.index')->with('success', 'Expense created successfully!');
        }else{
            return redirect()->route('expense.index')->with('notFound', 'Category not found, Please input a category first!');
        }
    }
    public function edit($id)
    {
        $expense = Expense::find($id);
        $categories = Categories::where('type', Categories::TYPE_EXPENSE)->get();
        return view('expense.edit', compact('expense', 'categories'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title'=>'required',
            'amount'=>'required',
            'category_id'=>'required'
        ]);

        $expense=Expense::find($id);
        $expense->update([
            'title'=>$request->input('title'),
            'amount'=>$request->input('amount'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect()->route('expense.index')->with('success', 'Expense updated successfully!');
    }
    public function destroy(int $id)
    {
        $expense=Expense::find($id);
        $expense->delete();
        return redirect()->route('expense.index')->with('success', 'Expense deleted successfully!');
    }
}
