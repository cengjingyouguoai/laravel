<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>文章列表页面</title>
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
                        <select class="input-sm form-control input-s-sm inline" style="width: 100px;height: 50px;">
                            <option value="0">请选择</option>
                            @foreach($type_data as $key => $val)
                                <option value="{{ $val['type_id'] }}">{{ $val['type_name'] }}</option>
                            @endforeach
                        </select>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>文章ID</th>
                                        <th>文章标题</th>
                                        <th>文章分类</th>
                                        <th>文章排序</th>
                                        <th>文章图片</th>
                                        <th>文章点击量</th>
                                        <th>是否发布</th>
                                        <th>是否删除</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $val)
                                        <td>{{ $val->article_id }}</td>
                                        <td><a href="{{ url('admin/article/article_details') }}?article_id={{ $val->article_id }}">{{ $val->article_title }}</a></td>
                                        <td>{{ $val->type_name }}</td>
                                            <td>{{ $val->article_sort }}</td>
                                            <td><img src="/{{ $val->article_img }}" alt="" style="width: 200px; height: 200px"></td>
                                            <td>{{ $val->article_click }}</td>
                                            @if ($val->is_publish == 1)
                                            <td><a class="btn btn-primary btn-rounded shows" href="javascript:void (0)" id="{{ $val->article_id }}" status="{{ $val->is_publish }}">已发布</a></td>
                                            @else
                                            <td><a class="btn btn-success btn-rounded unshows" href="javascript:void (0)" id="{{ $val->article_id }}" status="{{ $val->is_publish }}">未发布</a></td>
                                            @endif
                                        @if ($val->is_delete == 1)
                                            <td><a class="btn btn-primary btn-rounded" href="javascript:void (0)" >已删除</a></td>
                                        @else
                                            <td><a class="btn btn-success btn-rounded" href="javascript:void (0)">未删除</a></td>
                                        @endif
                                        <td>{{ date('Y-m-d H:i:s',$val->create_at) }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$val->update_at) }}</td>
                                        <td>
                                            <button data-toggle="button" class="btn btn-primary btn-outline" type="button">修改</button>
                                            @if ($val->is_delete == 1)
                                               <button type="button" data-toggle="button" class="btn btn-primary btn-outline regain " id="{{ $val->article_id }}">恢复</button>
                                                @else
                                                <button data-toggle="button" class="btn btn-primary btn-outline del" type="button" id="{{ $val->article_id }}">删除</button>
                                            @endif
                                        </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ $data->links() }}
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
//发表
    $(document).ready(function () {
        //发布
        $('.shows').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            var status = _this.attr('status');
            window.location.href = "{{ url('admin/article/article_publish') }}?id="+id+'&status='+status;
        });
        //发布
        $('.unshows').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            var status = _this.attr('status');
            window.location.href = "{{ url('admin/article/article_publish') }}?id="+id+'&status='+status;
        });
        //删除
        $('.del').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            window.location.href = "{{ url('admin/article/article_delete') }}?id="+id;
        });
        //恢复
        $('.regain').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            window.location.href = "{{ url('admin/article/article_regain') }}?id="+id;
        });
    })
</script>

