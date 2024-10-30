@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <div class="container" >
        <h1 align="center" >Chart Product</h1>
        <div class="card-body" >
            <div id="chartProduct" class="mb-0 mt-0" style="display: block" ></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" ></script>
    <script>
        var labelProduct = {!! json_encode($dataLabel) !!};
        var stockProduct = {!! json_encode($dataStock) !!};
        console.log("hello");
        

        var options = {
            series: [{
                name: 'Product Total',
                data: stockProduct
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            legend: {
                show: false
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    distributed: true
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
                title:{
                    text: 'Buku'
                },
                categories: labelProduct
            },
            yaxis: {
                title: {
                    text: '(pcs)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + "pcs"
                    }
                }
            }

        };
        var chart = new ApexCharts(document.querySelector("#chartProduct"), options);
        chart.render();
    </script>


@endsection