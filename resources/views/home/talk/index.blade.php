@extends('home.main')
@section('content')
    <div class="talk_con">
        <div class="talk_left">
            <div class="head">最新关注话题</div>
            {{--<table>--}}
                {{--<tr>--}}
                    {{--<td rowspan="3" class="img">--}}
                        {{--<div><img src="/uploads/images/2016/online1.png"></div>--}}
                        {{--<p>数量</p>--}}
                    {{--</td>--}}
                    {{--<td class="small">话题来自--}}
                        {{--<span class="right"><a href="" title="删除此话题">×</a></span>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr><td class="title">话题名称：</td></tr>--}}
                {{--<tr><td><b>发布人：</b></td></tr>--}}
                {{--<tr><td>&nbsp;</td><td>--}}
                        {{--内容：如果方便热播后共同日本如果方便热播后共同日本如果方便热播后共同日本如果方便热播后共同日本如果方便热播后共同日本如果方便热播后共同日本如果方便热播后共同日本--}}
                    {{--</td></tr>--}}
                {{--<tr><td>&nbsp;</td><td class="small">--}}
                        {{--关注话题：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--评论：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--感谢：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--分享：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--收藏：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        {{--举报：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                    {{--</td></tr>--}}
            {{--</table>--}}
            @if(count($datas))
                @foreach($datas as $data)
            <table>
                <tr>
                    <td rowspan="3" class="img">
                        <div><img src="/uploads/images/2016/online1.png"></div>
                        <p>{{--数量--}}{{ $data->read }}</p>
                    </td>
                    <td class="small">话题来自 {{ $data->areatoname()  }}
                        <span class="right"><a href="/talk/{{$data->id}}/destroy" title="删除此话题">×</a></span>
                    </td>
                </tr>
                <tr><td class="title"><a href="">话题名称：{{ $data->name }}</a></td></tr>
                <tr><td><b>发布人：{{ $data->uid }}</b></td></tr>
                <tr><td>&nbsp;</td><td>
                        {{--{{ strip_tags($data->content) }}--}}
                        @if(mb_strlen(strip_tags($data->content))>90)
                            {{ mb_substr(strip_tags($data->content),0,90,'utf-8').'...' }}
                        @else {{ strip_tags($data->content) }}
                        @endif
                    </td></tr>
                <tr><td>&nbsp;</td><td class="small">
                    @if($curr=='')
                        <a title="点击关注" onclick="window.location.href='';">关注</a>：
                        {{ count($data->follow()) }} &nbsp;&nbsp;&nbsp;&nbsp;
                        {{--评论：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        <a title="点击感谢" onclick="window.location.href='';">感谢</a>：
                        {{ count($data->thank()) }} &nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="点击点赞" onclick="window.location.href='';">点赞</a>：
                        {{ count($data->click()) }} &nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="点击分享" onclick="window.location.href='';">分享</a>：
                        {{ count($data->share()) }} &nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="点击收藏" onclick="window.location.href='';">收藏</a>：
                        {{ count($data->collect()) }} &nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="点击举报" onclick="window.location.href='';">举报</a>：
                        {{ count($data->report()) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @else
                        关注：{{ $data->followStr() }} &nbsp;&nbsp;&nbsp;&nbsp;
                        {{--评论：&nbsp;&nbsp;&nbsp;&nbsp;--}}
                        感谢：{{ $data->thank }} &nbsp;&nbsp;&nbsp;&nbsp;
                        点赞：{{ $data->click }} &nbsp;&nbsp;&nbsp;&nbsp;
                        分享：{{ $data->shareStr() }} &nbsp;&nbsp;&nbsp;&nbsp;
                        收藏：{{ $data->collectStr() }} &nbsp;&nbsp;&nbsp;&nbsp;
                        举报：{{ $data->reportStr() }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif
                        发布时间：{{ $data->created_at }}
                    </td></tr>
            </table>
                @endforeach
            @endif
        </div>
        <div class="talk_right">
            <div class="theme">
                {{--<p>我的关注</p>--}}
                <a href="/talk"><div>我的话题</div></a>
                <a href="/talk/follow"><div>我的关注</div></a>
                <a href="/talk/collect"><div>我的收藏</div></a>
            </div>
            <div class="theme">
                <p class="title"><b>话题专栏</b></p>
                <a href=""><div>专栏·发现</div></a>
                <a href="/talk/create"><div>写话题</div></a>
            </div>
        </div>
    </div>
@stop