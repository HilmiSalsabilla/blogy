@extends('layouts.admin')

@section('content')
    <div class="row g-4">
        <div class="col-md-4 col-sm-8">
            <div class="card text-bg-danger shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1">Admins</h6>
                        <h3 class="fw-bold">{{ $adminCount }}</h3>
                    </div>
                    <i class="bi bi-people fs-1 opacity-75"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-8">
            <div class="card text-bg-primary shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1">Posts</h6>
                        <h3 class="fw-bold">{{ $postCount }}</h3>
                    </div>
                    <i class="bi bi-egg-fried fs-1 opacity-75"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-8">
            <div class="card text-bg-success shadow-sm h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1">Category</h6>
                        <h3 class="fw-bold">{{ $categoryCount }}</h3>
                    </div>
                    <i class="bi bi-basket fs-1 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Posts per Month ({{ $year }})</h5>
            <canvas id="postsChart" height="100"></canvas>
        </div>
    </div>

    {{-- ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('postsChart').getContext('2d');
        const postsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Number of Posts',
                    data: @json($data),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
