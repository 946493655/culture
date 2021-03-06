@extends('home.main')
@section('content')
    @include('home.common.crumb')

    <div id="cateTopByIe" style="height:15px;display:none;"></div>
    <div class="opinion_con">
        <div class="opinion_list">
            <p class="cate">分类：
                <a href="{{DOMAIN}}idea" class="{{$cate==0?'curr':''}}">所有</a>
                @foreach($model['cates'] as $k=>$vcate)
                    <a href="{{DOMAIN}}idea/s/{{$k}}" class="{{$cate==$k?'curr':''}}">{{$vcate}}</a>
                @endforeach
            </p>
            @if(count($datas))
                @foreach($datas as $data)
            <table class="idea">
                <tr>
                    <td rowspan="3" width="230">
                        <div class="img"></div>
                    </td>
                    <td>
                        <a href="{{DOMAIN}}idea/{{$data['id']}}"><b>{{$data['name']}}</b></a>
                        <span class="right">阅读：</span>
                        <span class="right"><a href="{{DOMAIN}}idea/{{$data['id']}}">查看</a></span>
                    </td>
                </tr>
                <tr><td class="con">{{$data['intro']}}</td></tr>
                <tr>
                    <td class="small">
                        <input type="hidden" name="userid" value="{{$userid}}">
                        <input type="hidden" name="uid" value="{{$data['uid']}}">
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <a id="click">关注：</a>
                        <a id="noclick">取消关注：</a>
                        <a id="collect">收藏：</a>
                        {{--<a id="nocollect">取消收藏：</a>--}}
                        <span class="right">时间：{{$data['createTime']}}&nbsp;&nbsp;
                            发布人：{{UserNameById($data['uid'])}}</span>
                    </td>
                </tr>
            </table>
                @endforeach
            @else <p style="text-align:center;color:#808080;">没有记录</p>
            @endif
            @include('home.common.page2')
        </div>
    </div>

    <script>
        //留白兼容IE
        (function isIE() {
            var userAgent = window.navigator.userAgent; //取得浏览器的userAgent字符串
            if (userAgent.indexOf("MSIE")>0) {
                $("#cateTopByIe").show();
            } else if (userAgent.indexOf("Firefox")>0 || userAgent.indexOf("Chrome")>0 || userAgent.indexOf("Safari")>0 || userAgent.indexOf("Opera")>0) {
                $("#cateTopByIe").hide();
            } else {
                $("#cateTopByIe").show();
            }
        })();
        $(document).ready(function(){
            var userid = $("input[name='userid']").val();
            var uid = $("input[name='uid']").val();
            var id = $("input[name='id']").val();
            $("#click").click(function(){
                if(userid==uid){ alert("不能关注自己的创意 !"); return; }
                window.location.href = '{{DOMAIN}}idea/click/'+id+'/1';
            });
            $("#noclick").click(function(){
//                if(userid==uid){ alert("不能关注自己的创意 !"); return; }
                window.location.href = '{{DOMAIN}}idea/click/'+id+'/0';
            });
            $("#collect").click(function(){
                if(userid==uid){ alert("不能收藏自己的创意 !"); return; }
                window.location.href = '{{DOMAIN}}idea/collect/'+id+'/1';
            });
            $("#nocollect").click(function(){
//                if(userid==uid){ alert("不能关注自己的创意 !"); return; }
                window.location.href = '{{DOMAIN}}idea/collect/'+id+'/0';
            });
        });
    </script>
@stop