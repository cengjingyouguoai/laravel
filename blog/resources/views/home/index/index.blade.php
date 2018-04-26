<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>个人博客</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <!-- 返回顶部调用 begin -->
    @include('home.common.common_css')
    @include('home.common.common_js')
    <![endif]-->
</head>
<body>
@include('home.common.common_nav')
<!--header end-->
<div id="mainbody">
    <div class="info">
        <figure> <img src="{{ URL::asset('home/images/art.jpg') }}"  alt="Panama Hat">
            <figcaption><strong>{{ $title_data['title'] }}</strong>{{ $title_data['content'] }}</figcaption>
        </figure>
        <div class="card">
            <h1>我的名片</h1>
            <p>网名：DanceSmile | 即步非烟</p>
            <p>职业：Web前端设计师、网页设计</p>
            <p>电话：13662012345</p>
            <p>Email：dancesmiling@qq.com</p>
            <ul class="linkmore">
                <li><a href="/" class="talk" title="给我留言"></a></li>
                <li><a href="/" class="address" title="联系地址"></a></li>
                <li><a href="/" class="email" title="给我写信"></a></li>
                <li><a href="/" class="photos" title="生活照片"></a></li>
                <li><a href="/" class="heart" title="关注我"></a></li>
            </ul>
        </div>
    </div>
    <!--info end-->
    <div class="blank"></div>
    <div class="blogs">
        <ul class="bloglist">
            @foreach($article_data as $key => $val)
                <li>
                    <div class="arrow_box">
                        <div class="ti"></div>
                        <!--三角形-->
                        <div class="ci"></div>
                        <!--圆形-->
                        <h2 class="title"><a href="{{ url('article/article_list') }}?article_id={{ $val->article_id }}" target="_blank">{{ $val->article_title }}</a></h2>
                        <ul class="textinfo">
                            <a href="javascript:void(0)"><img src="/{{ $val->article_img }}" width="240px" height="160"></a>
                            <p>{{ $val->small_content }} </p>
                        </ul>
                        <ul class="details">
                            <li class="likes"><a href="javascript:void(0)">{{ $val->article_click }}</a></li>
                            <li class="comments"><a href="javascript:void(0)">{{ $val->article_yea }}</a></li>
                            <li class="icon-time"><a href="javascript:void(0)">{{ date('Y-m-d H:i:s',$val->create_at) }}</a></li>
                        </ul>
                    </div>
                    <!--arrow_box end-->
                </li>
            @endforeach
        </ul>
        <!--bloglist end-->
        <aside>
            <div class="tuijian">
                <h2>推荐文章</h2>
                <ol>
                    <li><span><strong>1</strong></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                    <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
                    <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀――浪漫的求婚词</a></li>
                    <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                    <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
                    <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                    <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
                    <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
                    <li><span><strong>9</strong></span><a href="/">花气袭人是酒香―个人网站模板</a></li>
                </ol>
            </div>
            <div class="toppic">
                <h2>图文并茂</h2>
                <ul>
                    <li><a href="/"><img src="{{ URL::asset('home/images/k01.jpg') }}">腐女不可怕，就怕腐女会画画！
                            <p>伤不起</p>
                        </a></li>
                    <li><a href="/"><img src="{{ URL::asset('home/images/k02.jpg') }}">问前任，你还爱我吗？无限戳中泪点~
                            <p>感兴趣</p>
                        </a></li>
                    <li><a href="/"><img src="{{ URL::asset('home/images/k03.jpg') }}">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
                            <p>喜欢</p>
                        </a></li>
                </ul>
            </div>
            <div class="clicks">
                <h2>热门点击</h2>
                <ol>
                    <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
                    <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
                    <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀――浪漫的求婚词</a></li>
                    <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
                    <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
                    <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
                    <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
                    <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
                    <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香―个人网站模板</a></li>
                </ol>
            </div>
            <div class="search">
                <form class="searchform" method="get" action="#">
                    <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
                </form>
            </div>
            <div class="viny">
                <dl>
                    <dt class="art"><img src="{{ URL::asset('home/images/artwork.png') }}" alt="专辑"></dt>
                    <dd class="icon-song"><span></span>南方姑娘</dd>
                    <dd class="icon-artist"><span></span>歌手：赵雷</dd>
                    <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
                    <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
                    <dd class="music">
                        <audio src="{{ URL::asset('home/images/nf.mp3') }}" controls></audio>
                    </dd>
                    <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
                </dl>
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