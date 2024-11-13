@extends('layouts.admin')
@section('title', 'Báo cáo')
@section('content')
<div class="container mt-4">

    <h1 class="text-center mb-4">Báo cáo doanh thu</h1>
    
    <div class="row mb-4">
        <div class="col-md-6 text-center">
            <div class="alert alert-info">
                <h4>Tổng số đơn hàng: <strong>{{ number_format($totalOrders) }}</strong></h4>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="alert alert-success">
                <h4>Tổng số khách hàng: <strong>{{ number_format($totalCustomers) }}</strong></h4>
            </div>
        </div>
    </div>

    <!-- Hiển thị 4 biểu đồ trên cùng một hàng -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu theo danh mục</h5>
                    <canvas id="categoryRevenueChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu theo ngày</h5>
                    <canvas id="revenueByDateChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu theo tháng</h5>
                    <canvas id="revenueByMonthChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu theo năm</h5>
                    <canvas id="revenueByYearChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ phương thức thanh toán -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Doanh thu theo phương thức thanh toán</h5>
                    <canvas id="revenueByPaymentMethodChart" style="max-width: 600px; max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Nút Quay lại -->
    <div class="row mb-4">
        <div class="col-md-12 text-left">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Biểu đồ doanh thu theo từng danh mục (Bar chart)
    var categoryLabels = {!! json_encode($categoryRevenue->pluck('category_id')) !!};
    var categoryData = {!! json_encode($categoryRevenue->pluck('total_revenue')) !!};
    var ctx1 = document.getElementById('categoryRevenueChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Doanh thu',
                data: categoryData,
                backgroundColor: 'rgba(255, 159, 64, 0.7)', // màu cam
                borderColor: 'rgba(255, 99, 132, 1)', // màu đỏ
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { autoSkip: false } } // Hiển thị tất cả nhãn
            },
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // 2. Biểu đồ doanh thu theo ngày (Line chart)
    var dateLabels = {!! json_encode($revenueByDate->pluck('date')) !!};
    var dateData = {!! json_encode($revenueByDate->pluck('total_revenue')) !!};
    var ctx2 = document.getElementById('revenueByDateChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: dateLabels,
            datasets: [{
                label: 'Doanh thu theo ngày',
                data: dateData,
                backgroundColor: 'rgba(255, 206, 86, 0.5)', // màu vàng
                borderColor: 'rgba(75, 192, 192, 1)', // màu xanh ngọc
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { autoSkip: false } } // Hiển thị tất cả nhãn
            },
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // 3. Biểu đồ doanh thu theo tháng (Bar chart)
    var monthLabels = {!! json_encode($revenueByMonth->pluck('month')) !!};
    var monthData = {!! json_encode($revenueByMonth->pluck('total_revenue')) !!};
    var ctx3 = document.getElementById('revenueByMonthChart').getContext('2d');
    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                label: 'Doanh thu theo tháng',
                data: monthData,
                backgroundColor: 'rgba(153, 102, 255, 0.7)', // màu tím
                borderColor: 'rgba(54, 162, 235, 1)', // màu xanh dương
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { autoSkip: false } } // Hiển thị tất cả nhãn
            },
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // 4. Biểu đồ doanh thu theo năm (Bar chart)
    var yearLabels = {!! json_encode($revenueByYear->pluck('year')) !!};
    var yearData = {!! json_encode($revenueByYear->pluck('total_revenue')) !!};
    var ctx4 = document.getElementById('revenueByYearChart').getContext('2d');
    new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: yearLabels,
            datasets: [{
                label: 'Doanh thu theo năm',
                data: yearData,
                backgroundColor: 'rgba(75, 192, 192, 0.7)', // màu xanh ngọc
                borderColor: 'rgba(255, 99, 132, 1)', // màu đỏ
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { autoSkip: false } } // Hiển thị tất cả nhãn
            },
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // 5. Biểu đồ doanh thu theo phương thức thanh toán (Pie chart)
    var paymentMethodLabels = {!! json_encode($revenueByPaymentMethod->pluck('payment_method')) !!};
    var paymentMethodData = {!! json_encode($revenueByPaymentMethod->pluck('total_revenue')) !!};
    if (paymentMethodLabels.length > 0 && paymentMethodData.length > 0) {
        var ctx5 = document.getElementById('revenueByPaymentMethodChart').getContext('2d');
        new Chart(ctx5, {
            type: 'pie',
            data: {
                labels: paymentMethodLabels,
                datasets: [{
                    label: 'Doanh thu theo phương thức thanh toán',
                    data: paymentMethodData,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // xanh dương
                        'rgba(255, 99, 132, 0.7)', // đỏ
                        'rgba(255, 206, 86, 0.7)', // vàng
                        'rgba(75, 192, 192, 0.7)', // xanh ngọc
                        'rgba(153, 102, 255, 0.7)'  // tím
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + new Intl.NumberFormat().format(context.raw) + ' VND';
                            }
                        }
                    }
                }
            }
        });
    } else {
        console.log('Không có dữ liệu để vẽ biểu đồ phương thức thanh toán');
    }
});
</script>
@endsection
