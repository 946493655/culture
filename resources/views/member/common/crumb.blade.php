{{-- 面包屑导航 --}}


<div class="mem_crumb">
    <a href="/member">会员后台</a>
    @if(isset($menus['func'])) / @endif
    {{--功能模块--}}
    <a href="/member/{{$menus['func']['url']}}">
    @if(isset($menus['func'])) {{ $menus['func']['name'] }} @endif
    </a>
    {{--@if(!isset($prefix_url) && isset($menus['create']['name']) && !is_numeric(explode('/',$_SERVER['REQUEST_URI'])[3])) {{ ' / '.$menus['create']['name'] }} @endif
    @if(isset(explode('/',$_SERVER['REQUEST_URI'])[3]) && is_numeric(explode('/',$_SERVER['REQUEST_URI'])[3])) {{ '/'.$menus['show']['name'] }} @endif--}}
    {{--具体操作页--}}
    @if(in_array($curr,['create','edit','show','pre'])) {{ '/'.$menus[$curr]['name'] }} @endif
    @if($curr=='trash') {{ '/'.$menus['trash'] }} @endif
</div>