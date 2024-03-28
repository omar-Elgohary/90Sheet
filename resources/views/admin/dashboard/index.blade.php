@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/') }}dashboard/assets/vendor/libs/apex-charts/apex-charts.css">
@endsection
@section('content')
    <div class="row">
        @foreach($menus as $key => $menu)
            @php $color = $colores[array_rand($colores)] @endphp

                <div class="col-lg-3 col-sm-6 mb-4 text-center">
                    <a href="{{$menu['url']}}">
                        <div class="card card-border-shadow-{!! $color !!} h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-{!! $color !!}"><i class="{!! $menu['icon'] !!}"></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{$menu['count']}}</h4>
                                </div>
                                <p class="mb-1">{{$menu['name']}}</p>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="card-title">{{__('admin.country_and_cities')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="card-title">{{__('admin.Project_cases')}}</h4>
                </div>
                <div class="card-content">
                        <div id="columns-chart"></div>
                </div>
        </div>
    </div>
    </div>
@endsection
@section('js')

    <script src="{{ asset('/') }}dashboard/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{asset('admin/charts_functions.js')}}"></script>
    <script>



        var revenueChartoptions = {
            chart: {
            height: 270,
            toolbar: { show: false },
            type: 'line',
            },
            stroke: {
            curve: 'smooth',
            dashArray: [0, 8],
            width: [4, 2],
            },
            grid: {
            borderColor: '#e7e7e7',
            },
            legend: {
            show: false,
            },
            colors: ['#f29292', '#b9c3cd'],

            fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                inverseColors: false,
                gradientToColors: ['#7367F0', '#b9c3cd'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
            },
            markers: {
            size: 0,
            hover: {
                size: 5
            }
            },
            xaxis: {
            labels: {
                style: {
                colors: '#b9c3cd',
                }
            },
            axisTicks: {
                show: false,
            },
            categories: ['1', '2', '3', '4', '5', '6', '7', '8' ,'9','10','11','12'],
            axisBorder: {
                show: false,
            },
            tickPlacement: 'on',
            },
            yaxis: {
            tickAmount: 5,
            labels: {
                style: {
                color: '#b9c3cd',
                },
                formatter: function (val) {
                return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                }
            }
            },
            tooltip: {
            x: { show: false }
            },
            series: [{
            name: "{{__('admin.cities')}}",
            data: @json($countryArray)
            }
            ,
            {
            name: "{{__('admin.countries')}}",
            data: @json($cityArray)
            }
            ],

        }

        var revenueChart = new ApexCharts(document.querySelector("#revenue-chart"),revenueChartoptions).render();
            var options = {
            series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
            name: 'Free Cash Flow',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
            type: 'bar',
            height: 350
            },
            plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
            },
            dataLabels: {
            enabled: false
            },
            stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
            },
            xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
            title: {
                text: '$ (thousands)'
            }
            },
            fill: {
            opacity: 1
            },
            tooltip: {
            y: {
                formatter: function (val) {
                return "$ " + val + " thousands"
                }
            }
            }
        };

        var chart = new ApexCharts(document.querySelector("#columns-chart"), options);
        chart.render();
    </script>
    
@endsection