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
    @include('admin.common.left_menu')

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{ url('admin/admin/admin_update_deal') }}" >
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">管理员密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" value="{{ $data['admin_password'] }}"  >
                                    </div>
                                </div>{{ csrf_field() }}
                                <div class="hr-line-dashed"></div>
                                <input type="hidden" value="{{ $data['admin_id'] }}" name="id">
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">保存内容</button>
                                        <button class="btn btn-white" type="submit">取消</button>
                                    </div>
                                </div>
                            </form>
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


