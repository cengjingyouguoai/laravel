<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>管理员列表页面</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    {{--公共css开始--}}
    @include('admin.common.common_css')
    {{--公共css结束--}}
</head>

<body>
<div id="wrapper">
    {{--左侧菜单栏开始--}}
    @include('admin.common.left_menu')
    {{--左侧菜单栏结束--}}

    <div id="page-wrapper" class="gray-bg dashbard-1">
        {{--右侧头开始--}}
        @include('admin.common.nav')
        {{--右侧头结束--}}
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>序号</th>
                                        <th>管理员账号</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>登录时间</th>
                                        <th>退出时间</th>
                                        <th>登录IP</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $val)
                                    <td>{{ $val['admin_id'] }}</td>
                                    <td>{{ $val['admin_name'] }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$val['create_at']) }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$val['update_at']) }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$val['login_time']) }}</td>
                                    <td>{{ date('Y-m-d H:i:s',$val['leave_time']) }}</td>
                                    <td>{{ $val['login_ip'] }}</td>
                                    <td><button type="button" data-toggle="button" class="btn btn-primary btn-outline update" id="{{ $val['admin_id'] }}" >修改</button></td>
                                    @endforeach
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

<!-- Peity -->
<script src="{{ URL::asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('admin/js/hplus.js?v=2.2.0') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/pace/pace.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Peity -->
<script src="{{ URL::asset('admin/js/demo/peity-demo.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>


</body>

</html>
<script>
    $(document).ready(function () {
        $('.update').click(function () {
            var id = $(this).attr('id');
            window.location.href = "{{ url('admin/admin/admin_update') }}?id="+id;
        })
    })
</script>

