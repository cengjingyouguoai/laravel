<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章详情</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="{{ URL::asset('home/css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('home/css/view.css') }}" rel="stylesheet">
    <!-- 返回顶部调用 begin -->
    <link href="{{ URL::asset('home/css/lrtk.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ URL::asset('home/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('home/js/js.js') }}"></script>
    @include('home.common.common_js')
    <![endif]-->
</head>
<body>
@include('home.common.common_nav')
<!--header end-->
<div id="mainbody">
    <div class="blogs">
        <div id="index_view">
            <ol class="breadcrumb">
                {{--<li><a href="#">Home</a></li>
                <li><a href="#">2013</a></li>
                <li class="active">十一月</li>--}}
            </ol>
            <h1 class="c_titile">{{ $article_data['article_title'] }}</h1>
            <p class="box">发布时间：{{ date('Y-m-d H:i:s',$article_data['create_at']) }}{{--<span>编辑：DanceSmile</span>--}}阅读（{{ $article_data['article_click'] }}）</p>
            <ul>
                {!! $article_data['article_content'] !!}
            </ul>

            <div id="social">
                <div class="social-main">
          <span class="like">
          <a href="javascript:void(0)" data-action="ding" id="{{ $article_data['article_id'] }}"  title="我赞" class="favorite done yea"><i class="fa fa-thumbs-up"></i>赞 <i class="count">{{  $article_data['article_yea']}}</i>
          </a>
          </span>
                    <span class="shang-p">
            <span class="tipso_style" id="tip-p">
              <span class="shang-s"><a title="打赏">赏</a></span>
            </span>
          </span>
                    <span class="share-sd">
            <span class="share-s"><a href="javascript:void(0)" id="share-s" title="分享"><i class="fa fa-share-alt"></i>分享</a></span>
          </span>
                    <div class="clear"></div>
                </div>
            </div>

            <!-- 发表评论 -->
           {{-- <div id="comment">
                <h3><strong>发表评论:</strong></h3>
                <p>
                    <span>标题：</span>
                    <input type="text" name="" id="" class="text">
                </p>
                <p><span>内容：</span><textarea rows="10" cols="30" class="text-textarea"></textarea></p>
                <p style="text-align:right;"><button class="btn">发表</button></p>
            </div>--}}

        </div>
        <!--bloglist end-->
        <aside>
            <div class="search">
                <form class="searchform" method="get" action="#">
                    <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
                </form>
            </div>
            <div class="sunnav">
                <ul>
                    <li><a href="/web/" target="_blank" title="网站建设">网站建设</a></li>
                    <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">HTML5 / CSS3</a></li>
                    <li><a href="/jstt/" target="_blank" title="技术探讨">技术探讨</a></li>
                    <li><a href="/news/s/" target="_blank" title="慢生活">慢生活</a></li>
                </ul>
            </div>
            <div class="tuijian">
                <h2>栏目更新</h2>
                <ol>
                    @foreach($new_data as $key => $val)
                        <li><span><a href="{{ url('article/article_list') }}?article_id={{ $val['article_id'] }}">{{ $val['article_title'] }}</a></span>{{--<a href="/"></a>--}}</li>
                    @endforeach
                </ol>
            </div>
            <div class="toppic">
                <h2>图文并茂</h2>
                <ul>
                    <li><a href="/"><img src="images/k01.jpg">腐女不可怕，就怕腐女会画画！
                            <p>伤不起</p>
                        </a></li>
                    <li><a href="/"><img src="images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
                            <p>感兴趣</p>
                        </a></li>
                    <li><a href="/"><img src="images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
                            <p>喜欢</p>
                        </a></li>
                </ul>
            </div>
            <div class="clicks">
                <h2>热门点击</h2>
                <ol>
                    @foreach($hot_data as $key => $val)
                        <li><span><a href="{{ url('article/article_list') }}?article_id={{ $val['article_id'] }}">{{ $val['article_title'] }}</a></span>{{--<a href="/"></a>--}}</li>
                    @endforeach
                </ol>
            </div>
        </aside>
    </div>
    <!--blogs end-->
</div>
<!--mainbody end-->
@include('home.common.common_footer')
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>
<script>
    $(document).ready(function () {
        //点赞
        $('.yea').click(function () {
            var _this = $(this);
            var id = _this.attr('id');
            $.ajax({
                type:'GET',
                data:'article_id='+id,
                url:"{{ url('article/article_add_yea') }}",
                dataType:'json',
                success:function (msg) {
                    if (msg.code == 200) {
                        alert(msg.message);
                    } else {
                        alert(msg.message);
                    }
                }
            })
        })
    })
</script>