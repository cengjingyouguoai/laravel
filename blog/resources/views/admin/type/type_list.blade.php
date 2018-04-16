<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>分类列表页面</title>
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
                                        <th>分类名</th>
                                        <th>排序</th>
                                        <th>是否显示</th>
                                        <th>是否删除</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $val)
                                        <tr>
                                            <td>{{ $val['type_id'] }}</td>
                                            <td><input type="text" class="form-control names" value="{{ $val['type_name'] }}" id="{{ $val['type_id'] }}"></td>
                                            <td><input type="text" class="form-control sorts"  id="{{ $val['type_id'] }}" value="{{ $val['type_sort'] }}"  size="1"></td>
                                            @if ($val['is_show'] == 1)
                                            <td><a class="btn btn-primary btn-rounded shows" href="javascript:void (0)" id="{{ $val['type_id'] }}" status="{{ $val['is_show'] }}">显示</a></td>
                                            @else
                                            <td><a class="btn btn-success btn-rounded unshows" href="javascript:void (0)" id="{{ $val['type_id'] }}" status="{{ $val['is_show'] }}">不显示</a></td>
                                            @endif
                                            @if ($val['is_delete'] == 0)
                                            <td>未删除</td>
                                            @else
                                            <td>删除</td>
                                            @endif
                                            <td>{{ date('Y-m-d H:i:s',$val['create_at']) }}</td>
                                            <td>{{ date('Y-m-d H:i:s',$val['update_at']) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm del" id="{{ $val['type_id'] }}">删除</button>
                                            </td>
                                        </tr>
                                    @endforeach
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
        //改为不显示
        $('.shows').click(function () {
            var _this = $(this);
            var status = _this.attr('status');
            var id = _this.attr('id');
            $.ajax({
                type:'GET',
                data:'status='+status+'&id='+id,
                url:'{{ url("admin/type/update_status") }}',
                success:function (msg) {
                    if (msg.code == 200) {
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else {
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    }
                }
            })
        })
        //改为显示
        $('.unshows').click(function () {
            var _this = $(this);
            var status = _this.attr('status');
            var id = _this.attr('id');
            $.ajax({
                type:'GET',
                data:'status='+status+'&id='+id,
                url:'{{ url("admin/type/update_status") }}',
                success:function (msg) {
                    if (msg.code == 200) {
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else {
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    }
                }
            })
        })
        //排序
        $('.sorts').blur(function () {
            var _this = $(this);
            var id = _this.attr('id');
            var val = _this.val();
            $.ajax({
                type:'GET',
                data:'id='+id+'&val='+val,
                url:'{{ url("admin/type/update_sort") }}',
                dataType:'JSON',
                success:function (msg) {
                    if (msg.code == 200) {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else if(msg.code == 300) {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    }
                }
            })
        })
        //名称
        $('.names').blur(function () {
            var _this = $(this);
            var id = _this.attr('id');
            var val = _this.val();
            $.ajax({
                type:'GET',
                data:'id='+id+'&val='+val,
                url:"{{ url('admin/type/update_name') }}",
                dataType:'JSON',
                success:function (msg) {
                    if (msg.code == 200) {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else if(msg.code == 300) {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    } else {
                        alert(msg.msg);
                        window.location.href = "{{ url('admin/type/type_list') }}";
                    }
                }
            })
        })
        //修改
        $('.del').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            if (window.confirm('您确定要删除吗?')) {
                $.ajax({
                    type:'GET',
                    data:'id='+id,
                    url:'{{ url("admin/type/del_type") }}',
                    dataType:'JSON',
                    success:function (msg) {
                        if (msg.code == 200) {
                            alert('删除成功');
                            window.location.href = "{{ url('admin/type/type_list') }}";
                        } else {
                            alert('删除失败');
                            window.location.href = "{{ url('admin/type/type_list') }}";
                        }
                    }
                })
            }
        })
    })
</script>

