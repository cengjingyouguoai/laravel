<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>首页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    {{--公共css开始--}}
    @include('admin.common.common_css')
    {{--公共css结束--}}

</head>

<body class="fixed-navigation">
<div id="wrapper">
    @include('admin.common.left_menu')

    <div id="page-wrapper" class="gray-bg sidebar-content">
        {{--右侧头开始--}}
        @include('admin.common.nav')
        {{--右侧头结束--}}
        <div class="wrapper wrapper-content">


            <div class="row">

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>订单总数</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>订单总金额</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"></h1>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::asset('admin/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.4.0') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Flot -->
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/flot/curvedLines.js') }}"></script>

<!-- Peity -->
<script src="{{ URL::asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/demo/peity-demo.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('admin/js/hplus.js?v=2.2.0') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/pace/pace.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ URL::asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Jvectormap -->
<script src="{{ URL::asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- EayPIE -->
<script src="{{ URL::asset('admin/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

<!-- Sparkline -->
<script src="{{ URL::asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Sparkline demo data  -->
<script src="{{ URL::asset('admin/js/demo/sparkline-demo.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.chart').easyPieChart({
            barColor: '#f8ac59',
            //                scaleColor: false,
            scaleLength: 5,
            lineWidth: 4,
            size: 80
        });

        $('.chart2').easyPieChart({
            barColor: '#1c84c6',
            //                scaleColor: false,
            scaleLength: 5,
            lineWidth: 4,
            size: 80
        });

        var d1 = [
            [1262304000000, 1],
            [1264982400000, 100],
            [1267401600000, 1],
            [1270080000000, 200],
            [1272672000000, 1],
            [1275350400000, 100],
            [1277942400000, 1],
            [1280620800000, 300]
        ];
        var d2 = [
            [1262304000000, 100],
            [1264982400000, 1],
            [1267401600000, 150],
            [1270080000000, 1],
            [1272672000000, 230],
            [1275350400000, 1],
            [1277942400000, 150],
            [1280620800000, 10]
        ];

        var data3 = [
            {
                label: "Data 1",
                data: d1,
                color: '#23c6c8'
            },
            {
                label: "Data 2",
                data: d2,
                color: '#1ab394'
            }
        ];
        $.plot($("#flot-chart3"), data3, {
            xaxis: {
                tickDecimals: 0
            },
            series: {
                lines: {
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    },
                },
                curvedLines: {
                    active: true,
                    fit: true,
                    apply: true
                },
                points: {
                    width: 0.1,
                    show: false
                },
            },
            grid: {
                show: false,
                borderWidth: 0
            },
            legend: {
                show: false,
            }
        });


        var mapData = {
            "US": 298,
            "SA": 200,
            "DE": 220,
            "FR": 540,
            "CN": 120,
            "AU": 760,
            "BR": 550,
            "IN": 200,
            "GB": 120,
        };

        $('#world-map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: '#e4e4e4',
                    "fill-opacity": 0.9,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 0
                }
            },

            series: {
                regions: [{
                    values: mapData,
                    scale: ["#1ab394", "#22d6b1"],
                    normalizeFunction: 'polynomial'
                }]
            },
        });
    });
</script>


</body>

</html>
