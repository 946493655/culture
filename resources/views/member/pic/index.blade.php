@extends('member.main')
@section('content')
    @include('member.common.crumb')
    <div class="mem_tab">@include('member.common.lists')</div>
    <div class="hr_tab"></div>
    <!-- 空白 -->
    <div class="list_kongbai">&nbsp;</div>
    <div class="list">
        <table class="list_tab">
            <tr>
                <td>编号</td>
                <td>图片名称</td>
                <td>缩略图</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
        @if($datas->total())
            @foreach($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td><a href="{{DOMAIN}}member/pic/{{ $data->id }}">{{ $data->name }}</a></td>
                <td><img src="{{ $data->url }}" style="width:100px;"></td>
                <td>{{ $data->createTime() }}</td>
                <td>
                    @if($curr['url']=='')
                        <a href="{{DOMAIN}}member/pic/{{ $data->id }}" class="list_btn">查看</a>
                        <a href="{{DOMAIN}}member/pic/{{ $data->id }}/edit" class="list_btn">编辑</a>
                        <a href="{{DOMAIN}}member/pic/{{ $data->id }}/destroy" class="list_btn">删除</a>
                    @else
                        <a href="{{DOMAIN}}member/pic/{{ $data->id }}/restore" class="list_btn">还原</a>
                        <a href="{{DOMAIN}}member/pic/{{ $data->id }}/forceDelete" class="list_btn">销毁记录</a>
                    @endif
                </td>
            </tr>
            @endforeach
        @else @include('member.common.norecord')
        @endif
        </table>
        @include('member.common.page')
    </div>
@stop