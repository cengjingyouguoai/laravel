<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>文章增加</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    {{--公共css开始--}}
    @include('admin.common.common_css')
    {{--公共css结束--}}
    {{--百度编辑器--}}
    <script type="text/javascript" charset="utf-8" src=" {{ URL::asset('ueditor/utf8-php/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('ueditor/utf8-php/ueditor.all.min.js') }} "> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src=" {{ URL::asset('ueditor/utf8-php/lang/zh-cn/zh-cn.js') }}"></script>
    {{--百度编辑器--}}
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
                            <form method="post" class="form-horizontal" action="{{ url('admin/article/add_article_deal') }}" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章标题</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title"  @if(!empty($datas)) value=" {{ $datas['article_title'] }}"@endif >
                                    </div>
                                </div>{{ csrf_field() }}
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章分类</label>

                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="type">
                                            <option>请选择</option>
                                            @foreach($data as $key => $val)
                                                @if(!empty($datas))
                                                @if($datas['type_id'] == $val['type_id'])
                                                    @endif
                                            <option value="{{ $val['type_id'] }}" selected>{{ $val['type_name'] }}</option>
                                             @else
                                             <option value="{{ $val['type_id'] }}">{{ $val['type_name'] }}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章图片</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="photo" >
                                        @if(!empty($datas))
                                            <input type="hidden" name="photos" value="{{ $datas['article_img'] }}">
                                        @endif
                                        <img @if(!empty($datas))src="/{{ $datas['article_img'] }}" @else src="" @endif alt="" style="width: 200px; height: 200px">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章排序</label>
                                            @if ($article_id != 0)
                                        <input type="hidden" value="{{ $article_id }}" name="article_id">
                                            @endif
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="sort" @if(!empty($datas)) value=" {{ $datas['article_sort'] }} "@endif>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">文章内容</label>

                                    <div class="col-sm-10">
                                        <textarea name="article" id="editor" style="width:1024px;height:500px;" >@if(!empty($datas)) {{ $datas['article_content'] }} @endif</textarea>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
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
<script src=" {{ URL::asset('admin/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.4.0') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('admin/js/hplus.js?v=2.2.0') }}"></script>
<script src="{{ URL::asset('admin/js/plugins/pace/pace.min.js') }}"></script>

<!-- iCheck -->
<script src=" {{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
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
    var ue = UE.getEditor('editor');
</script>
