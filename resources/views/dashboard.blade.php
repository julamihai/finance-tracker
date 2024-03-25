@extends('layout')
@section('title','Dashboard')
@section('content')

    <div class="flex flex-col items-center justify-center">
        <div class="flex flex-wrap justify-around rounded bg-slate-400">
            <div class="w-full md:w-1/2 lg:w-auto">
                <canvas id="incomeChart" width="400" height="400"></canvas>
                <h2 class="text-center">Income</h2>
            </div>
            <div class="w-full md:w-1/2 lg:w-auto mt-4 md:mt-0">
                <canvas id="expenseChart" width="400" height="400"></canvas>
                <h2 class="text-center">Expenses</h2>
            </div>
        </div>
        <div class="mt-8">
            <canvas id="totalChart" class="w-96 h-96"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        labelsIncome = @json($labelsIncome);
        amountsIncome = @json($amountsIncome);
        labelsExpense = @json($labelsExpense);
        amountsExpense = @json($amountsExpense);

        // Creăm un grafic pie pentru venituri
        var incomeChartCanvas = document.getElementById('incomeChart').getContext('2d');
        var incomeChart = new Chart(incomeChartCanvas, {
            type: 'pie',
            data: {
                labels: labelsIncome,
                datasets: [{
                    data: amountsIncome,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Income Chart'
                    }
                }
            }
        });

        // Creăm un grafic pie pentru cheltuieli
        var expenseChartCanvas = document.getElementById('expenseChart').getContext('2d');
        var expenseChart = new Chart(expenseChartCanvas, {
            type: 'pie',
            data: {
                labels: labelsExpense,
                datasets: [{
                    data: amountsExpense,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Expense Chart'
                    }
                }
            }
        });
        //graf pt total
        const totalIncome = @json($totalIncome);
        const totalExpense = @json($totalExpense);

        const ctx = document.getElementById('totalChart').getContext('2d');
        const totalChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Total Income', 'Total Expense'],
                datasets: [{
                    label: 'Total',
                    data: [totalIncome, totalExpense],
                    backgroundColor: ['#36A2EB', '#ef0e3c']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });



    </script>



@endsection
