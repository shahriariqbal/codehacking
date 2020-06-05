 @extends('layouts.admin')

@section('content')
    <h1>Admin</h1>

    <canvas id="myChart" ></canvas>    
    <hr>
@stop

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Posts', 'Categories', 'Comments', 'User', 'Reply', 'Media'],
        datasets: [{
            label: 'Data of CMS',
            data: [{{ $postsCount }}, {{ $categoriesCount}}, {{ $commentsCount }}, 12, 17, 25  ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0, 162, 50, 0.2)',
                'rgba(54, 0, 235, 0.2)',
                'rgba(54, 62, 20, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0, 162, 50, 1)',
                'rgba(54, 0, 235, 1)',
                'rgba(54, 62, 20, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
    
@stop





