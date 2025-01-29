<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Expense;
use App\Models\Income;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalIncome = Income::where('user_id', Auth::id())->sum('amount');
        $totalExpense = Expense::where('user_id', Auth::id())->sum('amount');

        $incomes = Income::where('user_id', Auth::id())->with('category')->get();
        $expenses = Expense::where('user_id', Auth::id())->with('category')->get();

        $labelsIncome = $incomes->pluck('title')->toArray();
        $amountsIncome = $incomes->pluck('amount')->toArray();

        $labelsExpense = $expenses->pluck('title')->toArray();
        $amountsExpense = $expenses->pluck('amount')->toArray();

        $monthlyIncome = Income::where('user_id', $userId)
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();
        $monthlyExpense = Expense::where('user_id', $userId)
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $months = range(1,12);
        $incomeByMonth = array_map(fn($month) => $monthlyIncome[$month] ?? 0, $months);

        $months = range(1,12);
        $expenseByMonth = array_map(fn($month) => $monthlyExpense[$month] ?? 0, $months);

        $labelsMonthlyIncome = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $labelsMonthlyExpense = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


        return view('dashboard', compact(
            'amountsIncome',
            'labelsIncome',
            'amountsExpense',
            'labelsExpense',
            'totalIncome',
            'totalExpense',
            'labelsMonthlyIncome',
            'incomeByMonth',
            'labelsMonthlyExpense',
            'expenseByMonth'
        ));
    }

}
