@extends('layout')
@section('title', 'Dashboard')
@section('content')

        <!-- Monthly Income Chart -->
        <div class="bg-gradient-to-r from-green-700 via-green-800 to-black p-8 rounded-xl shadow-lg w-full max-w-8xl hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-white text-2xl font-bold text-center mb-6">Monthly Incomes</h2>
            <canvas id="monthlyIncomeChart" class="mx-full text-white" style="max-height: 400px;"></canvas>
        </div>
        <!-- Monthly Expense Chart -->
        <div class="bg-gradient-to-r from-green-700 via-green-800 to-black mt-4 p-8 rounded-xl shadow-lg w-full max-w-8xl hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-white text-2xl font-bold text-center mb-6">Monthly Expenses</h2>
            <canvas id="monthlyExpenseChart" class="mx-full text-white" style="max-height: 400px;"></canvas>
        </div>

        <div class="flex flex-col items-center justify-center px-6 py-8 space-y-12">
            <!-- Income and Expense Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 rounded-lg bg-gradient-to-br from-green-700 via-green-800 to-black p-10 shadow-2xl">
                <!-- Income Chart -->
                <div class="flex flex-col items-center bg-gradient-to-br from-white via-gray-100 to-gray-300 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                    <canvas id="incomeChart" width="400" height="400"></canvas>
                    <h2 class="text-center text-2xl font-bold mt-6 uppercase tracking-wide text-gray-800">
                        Income
                    </h2>
                    <p class="text-center text-lg text-gray-600 mt-2">
                        Monthly breakdown of your income sources
                    </p>
                </div>

                <!-- Expense Chart -->
                <div class="flex flex-col items-center bg-gradient-to-br from-white via-gray-100 to-gray-300 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                    <canvas id="expenseChart" width="400" height="400"></canvas>
                    <h2 class="text-center text-2xl font-bold mt-6 uppercase tracking-wide text-gray-800">
                        Expenses
                    </h2>
                    <p class="text-center text-lg text-gray-600 mt-2">
                        Monthly breakdown of your expenses
                    </p>
                </div>
            </div>

        <!-- Total Income vs Expense Chart -->
        <div class="bg-gradient-to-r from-green-700 via-green-800 to-black p-8 rounded-xl shadow-lg w-full max-w-md hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-white text-2xl font-bold text-center mb-6">Total Income vs Expense</h2>
            <canvas id="totalChart" class="mx-auto" style="max-height: 400px;"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        labelsIncome = @json($labelsIncome);
        amountsIncome = @json($amountsIncome);
        labelsExpense = @json($labelsExpense);
        amountsExpense = @json($amountsExpense);
        const labelsMonthlyIncome = @json($labelsMonthlyIncome);
        const incomeByMonth = @json($incomeByMonth);
        const labelsMonthlyExpense = @json($labelsMonthlyExpense);
        const expenseByMonth = @json($expenseByMonth);
        const totalIncome = @json($totalIncome);
        const totalExpense = @json($totalExpense);

        // Income Chart
        new Chart(document.getElementById('incomeChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: labelsIncome,
                datasets: [{
                    data: amountsIncome,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                    borderColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                    borderWidth: 1,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'black'
                        }
                    },
                }
            }
        });

        // Expense Chart
        new Chart(document.getElementById('expenseChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: labelsExpense,
                datasets: [{
                    data: amountsExpense,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                    borderColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                    borderWidth: 1,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'black'
                        }
                    },
                }
            }
        });

        // Monthly Income Chart
        const monthlyIncomeChartCanvas = document.getElementById('monthlyIncomeChart').getContext('2d');
        const monthlyIncomeChart = new Chart(monthlyIncomeChartCanvas, {
            type: 'bar',
            data: {
                labels: labelsMonthlyIncome,
                datasets: [{
                    label: 'Monthly Incomes',
                    data: incomeByMonth,
                    backgroundColor: 'rgba(75, 0, 192, 0.2)', // Fundal albarelor
                    borderColor: 'rgba(75, 192, 192, 1)', // Contur bară
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Monthly Incomes',
                        color: 'white'
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)'
                        }
                    }
                }
            }
        });// Monthly Expense Chart
        const monthlyExpenseChartCanvas = document.getElementById('monthlyExpenseChart').getContext('2d');
        const monthlyExpenseChart = new Chart(monthlyExpenseChartCanvas, {
            type: 'bar',
            data: {
                labels: labelsMonthlyExpense,
                datasets: [{
                    label: 'Monthly Expenses',
                    data: expenseByMonth,
                    backgroundColor: 'rgba(75, 0, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Monthly Expenses',
                        color: 'white'
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)'
                        }
                    },
                    y: {
                        ticks: {
                            color: 'white'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)'
                        }
                    }
                }
            }
        });

        // Total Income vs Expense Chart
        new Chart(document.getElementById('totalChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Total Income', 'Total Expense'],
                datasets: [{
                    label: 'Total',
                    data: [totalIncome, totalExpense],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: 'white'
                        }
                    },
                }
            }
        });
    </script>
@endsection

