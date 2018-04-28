<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>个人名片列表页面</title>
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
                                        <th>网名</th>
                                        <th>职业</th>
                                        <th>手机号</th>
                                        <th>邮箱</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $data['id'] }}</td>
                                        <td><input type="text" value="{{ $data['blog_name'] }}"></td>
                                        <td><input type="text" value="{{ $data['blog_job'] }}"></td>
                                        <td><input type="text" value="{{ $data['blog_mobile'] }}"></td>
                                        <td><input type="text" value="{{ $data['blog_email'] }}"></td>
                                        <td>{{ date('Y-m-d H:i:s',$data['create_at']) }}</td>
                                        <td>{{ date('Y-m-d H:i:s',$data['update_at']) }}</td>
                                        <td><button type="button" data-toggle="button" class="btn btn-primary btn-outline update" id="{{ $data['id'] }}">修改</button></td>
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
            var name = $(this).parent().prev().prev().prev().prev().prev().prev().children().val();//网名
            var job = $(this).parent().prev().prev().prev().prev().prev().children().val();//职业
            var mobile = $(this).parent().prev().prev().prev().prev().children().val();//手机号
            var email = $(this).parent().prev().prev().prev().children().val();
            if (name.length <= 0 || name.length > 50) {
                alert('网名字数在1-50之间');
                return false;
            }
            if (job.length <= 0 || job.length > 50) {
                alert('职业字数在1-50之间');
                return false;
            }
            if (!checkMobile(mobile)) {
                alert("不是完整的11位手机号或者正确的手机号前七位");
                return false;
            }
            if (!checkEmail(email)) {
                alert('邮箱错误');
                return false;
            }
            $.ajax({
                type:'GET',
                data:'id='+id+'&name='+name+'&job='+job+'&mobile='+mobile+'&email='+email,
                url:"{{ url('admin/card/card_edit_deal') }}",
                dataType:'json',
                success:function (msg) {
                    if (msg.code == 200) {
                        alert(msg.msg);
                        window.location.reload();
                    } else {
                        alert(msg.msg);
                        window.location.reload();
                    }
                }
            })
        })
    });

    //验证手机号
    function checkMobile(sMobile){
        if(!(/^1[3|5][0-9]\d{4,8}$/.test(sMobile))){
            return false;
        } else {
            return true;
        }
    }
    //验证邮箱
    function checkEmail(email){
        var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //正则表达式
        if(email=== ""){ //输入不能为空
            return false;
        }else if(!reg.test(email)){ //正则验证不通过，格式不对
            return false;
        }else{
            return true;
        }
    }
</script>

