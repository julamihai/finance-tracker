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
        $labelsExpense = [];
        $amountsExpense = [];
        $labelsIncome = [];
        $amountsIncome = [];

        $totalIncome=Income::sum('amount');
        $totalExpense=Expense::sum('amount');


        $incomes=Income::all()->load('category')->where('user_id', Auth::id());
        $expenses=Expense::all()->load('category')->where('user_id', Auth::id());
        $totalIncome=Income::sum('amount');
        $totalExpense=Expense::sum('amount');

        foreach($incomes as $income) {
            array_push($labelsIncome, $income->title);
            array_push($amountsIncome, $income->amount);
        }
        foreach($expenses as $expense) {
            $labelsExpense[] = $expense->title;
            $amountsExpense[] = $expense->amount;
        }

        return view('dashboard', compact('amountsIncome', 'labelsIncome', 'amountsExpense', 'labelsExpense','totalIncome','totalExpense'));
    }
}
