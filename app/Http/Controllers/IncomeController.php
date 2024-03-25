<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes=Income::where('user_id', Auth::id())->get();
        $categories=Categories::where('type', Categories::TYPE_INCOME)->get();
        return view('income.index', compact('incomes', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title',
            'amount',
            'category_id'
        ]);
        $incomes=new Income();
        $incomes->user_id=Auth::id();
        $incomes->title=$request->input('title');
        $incomes->amount=$request->input('amount');
        $incomes->category_id=$request->input('category_id');
        $incomes->save();

        return redirect()->route('income.index')->with('success', 'Income added successfully!');
    }
    public function edit($id)
    {
        $income = Income::find($id);
        $categories = Categories::where('type', Categories::TYPE_INCOME)->get();

        return view('income.edit', compact('income', 'categories'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title'=>'required',
            'amount'=>'required',
            'category_id'=>'required'
        ]);

        $income = Income::find($id);
        $income->update([
            'title'=>$request->input('title'),
            'amount'=>$request->input('amount'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect()->route('income.index')->with('success', 'Income updated successfully!');
    }
    public function destroy(int $id)
    {
        $income=Income::find($id);
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Income deleted successfully!');
    }
}
