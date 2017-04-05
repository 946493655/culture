@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <div class="search_type" style="height:20px;border:0;">
            <span class="create_right">
                <a href="{{DOMAIN_C_BACK}}job/create" class="list_btn">添加招聘</a>
            </span>
        </div>
        <table cellspacing="0">
            <tr>
                <td>工作名称</td>
                <td>人数</td>
                <td width="150">创建时间</td>
                <td>操作</td>
            </tr>
            <tr><td colspan="10"></td></tr>
            @if(count($datas))
                @foreach($datas as $data)
            <tr>
                <td>{{$data['name']}}</td>
                <td>{{$data['small']}}</td>
                <td>{{$data['createTime']}}</td>
                <td>
                    <a href="{{DOMAIN_C_BACK}}job/{{$data['id']}}" class="list_btn">查看</a>
                    <a href="{{DOMAIN_C_BACK}}job/{{$data['id']}}/edit" class="list_btn">编辑</a>
                </td>
            </tr>
                @endforeach
            @else <tr><td colspan="10" style="text-align:center;">没有记录</td></tr>
            @endif
        </table>
        @include('company.admin.common.page2')
    </div>
@stop