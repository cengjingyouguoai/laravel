<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>座右铭列表页面</title>
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
                                        <th>座右铭标题</th>
                                        <th>内容</th>
                                        <th>排序</th>
                                        <th>是否删除</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $val)
                                        <tr>
                                            <td>{{ $val['id'] }}</td>
                                            <td><input type="text" class="form-control" value="{{ $val['title'] }}"></td>
                                            <td><textarea name="" id="" cols="30" rows="10">{{ $val['content'] }}</textarea></td>
                                            <td><input type="text" class="form-control" value="{{ $val['sort'] }}" size="1"></td>
                                            @if ($val['is_delete'] == 0)
                                                <td><font color="blue">未删除</font></td>
                                            @else
                                                <td><font color="red">已删除</font></td>
                                            @endif
                                            <td>{{ date('Y-m-d H:i:s',$val['create_at']) }}</td>
                                            <td>{{ date('Y-m-d H:i:s',$val['update_at']) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm update" id="{{ $val['id'] }}">修改</button>
                                                @if ($val['is_delete'] == 0)
                                                <button type="button" class="btn btn-primary btn-sm del" id="{{ $val['id'] }}" state="{{ $val['is_delete'] }}">删除</button>
                                                @else
                                                <button type="button" class="btn btn-primary btn-sm regain" id="{{ $val['id'] }}" state="{{ $val['is_delete'] }}">恢复</button>
                                                @endif
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
        //删除
        $('.del').click(function () {
            var id = $(this).attr('id');
            var state = $(this).attr('state');
            if (window.confirm('您确定要删除吗?')) {
                window.location.href = "{{ url('admin/title/title_edit_delete') }}?id="+id+'&state='+state;
            }
        });
        //恢复
        $('.regain').click(function () {
            var id = $(this).attr('id');
            var state = $(this).attr('state');
            if (window.confirm('您确定要恢复吗?')) {
                window.location.href = "{{ url('admin/title/title_edit_delete') }}?id="+id+'&state='+state;
            }
        });
        //修改
        $('.update').click(function () {
            if (window.confirm('您确定要修改吗?')) {
                var _this = $(this);
                var id = _this.attr('id');
                var title = _this.parent().prev().prev().prev().prev().prev().prev().children().val();//标题
                var content = _this.parent().prev().prev().prev().prev().prev().children().val();//内容
                var sort = _this.parent().prev().prev().prev().prev().children().val();//排序
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    type:'POST',
                    data:'id='+id+'&title='+title+'&content='+content+'&sort='+sort+'&_token='+_token,
                    url:'{{ url("admin/title/title_edit_update") }}',
                    dataType:'JSON',
                    success:function (msg) {
                        if (msg.code == 500) {
                            alert(msg.msg);
                            window.location.reload();
                        } else {
                            alert(msg.msg);
                            window.location.reload();
                        }
                    }
                })
            }
        })
    })
</script>

