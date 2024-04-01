<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalIncome = Income::where('user_id', Auth::id())->sum('amount');
        $totalExpense = Expense::where('user_id', Auth::id())->sum('amount');

        $incomes = Income::where('user_id', Auth::id())->with('category')->get();
        $expenses = Expense::where('user_id', Auth::id())->with('category')->get();

        $labelsIncome = $incomes->pluck('title')->toArray();
        $amountsIncome = $incomes->pluck('amount')->toArray();

        $labelsExpense = $expenses->pluck('title')->toArray();
        $amountsExpense = $expenses->pluck('amount')->toArray();

        return view('dashboard', compact('amountsIncome', 'labelsIncome', 'amountsExpense', 'labelsExpense', 'totalIncome', 'totalExpense'));
    }
}
