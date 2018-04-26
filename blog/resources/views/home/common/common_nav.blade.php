<header>
    <nav id="nav">
        <ul>
            @foreach($type_data as $key => $val)
                <li><a href="{{ url('type/type_list') }}?id={{ $val['type_id'] }}" >{{ $val['type_name'] }}</a></li>
            @endforeach
        </ul>
        <script src="{{ URL::asset('home/js/silder.js') }}"></script><!--获取当前页导航 高亮显示标题-->
    </nav>
</header>