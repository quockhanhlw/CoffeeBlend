@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-md-12 mb-4">
    <h2 style="color: #2c3e50; font-weight: 600;">Dashboard Overview</h2>
    <p style="color: #7f8c8d;">Welcome back! Here's what's happening with your coffee shop today.</p>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <div class="card shadow-sm border-0" style="border-left: 4px solid #3498db;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-2">Products</h6>
            <h3 class="mb-0" style="color: #3498db; font-weight: 700;">{{ $productsCount }}</h3>
          </div>
          <div style="font-size: 40px; color: #3498db; opacity: 0.3;">
            <i class="fas fa-coffee"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm border-0" style="border-left: 4px solid #2ecc71;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-2">Orders</h6>
            <h3 class="mb-0" style="color: #2ecc71; font-weight: 700;">{{ $ordersCount }}</h3>
          </div>
          <div style="font-size: 40px; color: #2ecc71; opacity: 0.3;">
            <i class="fas fa-shopping-cart"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm border-0" style="border-left: 4px solid #f39c12;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-2">Bookings</h6>
            <h3 class="mb-0" style="color: #f39c12; font-weight: 700;">{{ $bookingsCount }}</h3>
          </div>
          <div style="font-size: 40px; color: #f39c12; opacity: 0.3;">
            <i class="fas fa-calendar-check"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm border-0" style="border-left: 4px solid #e74c3c;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted mb-2">Staffs</h6>
            <h3 class="mb-0" style="color: #e74c3c; font-weight: 700;">{{ $StaffsCount }}</h3>
          </div>
          <div style="font-size: 40px; color: #e74c3c; opacity: 0.3;">
            <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-md-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0">
        <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">Statistics Overview</h5>
      </div>
      <div class="card-body">
        <canvas id="statisticsChart" height="100"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0">
        <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">Distribution</h5>
      </div>
      <div class="card-body">
        <canvas id="distributionChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0">
        <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
          <i class="fas fa-shopping-cart" style="color: #2ecc71;"></i> Orders by Month ({{ date('Y') }})
        </h5>
      </div>
      <div class="card-body">
        <canvas id="ordersChart" height="120"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0">
        <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">
          <i class="fas fa-calendar-check" style="color: #f39c12;"></i> Bookings by Month ({{ date('Y') }})
        </h5>
      </div>
      <div class="card-body">
        <canvas id="bookingsChart" height="120"></canvas>
      </div>
    </div>
  </div>
</div>

<style>
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 20px;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
  }
  .shadow-sm {
    box-shadow: 0 2px 4px rgba(0,0,0,0.08) !important;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
  const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  
  // Bar Chart - Statistics Overview
  const statsCtx = document.getElementById('statisticsChart').getContext('2d');
  new Chart(statsCtx, {
    type: 'bar',
    data: {
      labels: ['Products', 'Orders', 'Bookings', 'Staffs'],
      datasets: [{
        label: 'Count',
        data: [{{ $productsCount }}, {{ $ordersCount }}, {{ $bookingsCount }}, {{ $StaffsCount }}],
        backgroundColor: [
          'rgba(52, 152, 219, 0.8)',
          'rgba(46, 204, 113, 0.8)',
          'rgba(243, 156, 18, 0.8)',
          'rgba(231, 76, 60, 0.8)'
        ],
        borderColor: [
          'rgba(52, 152, 219, 1)',
          'rgba(46, 204, 113, 1)',
          'rgba(243, 156, 18, 1)',
          'rgba(231, 76, 60, 1)'
        ],
        borderWidth: 2,
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          padding: 12,
          borderRadius: 8,
          titleFont: {
            size: 14,
            weight: 'bold'
          },
          bodyFont: {
            size: 13
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: 'rgba(0,0,0,0.05)',
            drawBorder: false
          },
          ticks: {
            font: {
              size: 12
            },
            color: '#7f8c8d'
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              size: 13,
              weight: '600'
            },
            color: '#2c3e50'
          }
        }
      }
    }
  });

  // Doughnut Chart - Distribution
  const distCtx = document.getElementById('distributionChart').getContext('2d');
  new Chart(distCtx, {
    type: 'doughnut',
    data: {
      labels: ['Products', 'Orders', 'Bookings', 'Staffs'],
      datasets: [{
        data: [{{ $productsCount }}, {{ $ordersCount }}, {{ $bookingsCount }}, {{ $StaffsCount }}],
        backgroundColor: [
          'rgba(52, 152, 219, 0.8)',
          'rgba(46, 204, 113, 0.8)',
          'rgba(243, 156, 18, 0.8)',
          'rgba(231, 76, 60, 0.8)'
        ],
        borderColor: '#fff',
        borderWidth: 3
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            padding: 15,
            font: {
              size: 12,
              weight: '600'
            },
            color: '#2c3e50',
            usePointStyle: true,
            pointStyle: 'circle'
          }
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          padding: 12,
          borderRadius: 8,
          callbacks: {
            label: function(context) {
              const label = context.label || '';
              const value = context.parsed || 0;
              const total = context.dataset.data.reduce((a, b) => a + b, 0);
              const percentage = ((value / total) * 100).toFixed(1);
              return label + ': ' + value + ' (' + percentage + '%)';
            }
          }
        }
      }
    }
  });

  // Line Chart - Orders by Month
  const ordersCtx = document.getElementById('ordersChart').getContext('2d');
  new Chart(ordersCtx, {
    type: 'line',
    data: {
      labels: monthLabels,
      datasets: [{
        label: 'Orders',
        data: {!! json_encode($ordersData) !!},
        backgroundColor: 'rgba(46, 204, 113, 0.1)',
        borderColor: 'rgba(46, 204, 113, 1)',
        borderWidth: 3,
        fill: true,
        tension: 0.4,
        pointRadius: 5,
        pointHoverRadius: 7,
        pointBackgroundColor: 'rgba(46, 204, 113, 1)',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgba(46, 204, 113, 1)',
        pointHoverBorderWidth: 3
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          padding: 12,
          borderRadius: 8,
          titleFont: {
            size: 14,
            weight: 'bold'
          },
          bodyFont: {
            size: 13
          },
          callbacks: {
            title: function(context) {
              return monthLabels[context[0].dataIndex] + ' {{ date("Y") }}';
            },
            label: function(context) {
              return 'Orders: ' + context.parsed.y;
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: 'rgba(0,0,0,0.05)',
            drawBorder: false
          },
          ticks: {
            stepSize: 1,
            font: {
              size: 11
            },
            color: '#7f8c8d'
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              size: 11,
              weight: '600'
            },
            color: '#2c3e50'
          }
        }
      }
    }
  });

  // Line Chart - Bookings by Month
  const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
  new Chart(bookingsCtx, {
    type: 'line',
    data: {
      labels: monthLabels,
      datasets: [{
        label: 'Bookings',
        data: {!! json_encode($bookingsData) !!},
        backgroundColor: 'rgba(243, 156, 18, 0.1)',
        borderColor: 'rgba(243, 156, 18, 1)',
        borderWidth: 3,
        fill: true,
        tension: 0.4,
        pointRadius: 5,
        pointHoverRadius: 7,
        pointBackgroundColor: 'rgba(243, 156, 18, 1)',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgba(243, 156, 18, 1)',
        pointHoverBorderWidth: 3
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          padding: 12,
          borderRadius: 8,
          titleFont: {
            size: 14,
            weight: 'bold'
          },
          bodyFont: {
            size: 13
          },
          callbacks: {
            title: function(context) {
              return monthLabels[context[0].dataIndex] + ' {{ date("Y") }}';
            },
            label: function(context) {
              return 'Bookings: ' + context.parsed.y;
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: 'rgba(0,0,0,0.05)',
            drawBorder: false
          },
          ticks: {
            stepSize: 1,
            font: {
              size: 11
            },
            color: '#7f8c8d'
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              size: 11,
              weight: '600'
            },
            color: '#2c3e50'
          }
        }
      }
    }
  });
});
</script>

@endsection