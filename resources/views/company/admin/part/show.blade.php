@extends('company.admin.main')
@section('content')
    @include('company.admin.common.crumb')

    <div class="com_admin_list">
        <h3 class="center pos">{{$lists['func']['name']}}详情页</h3>
        <table class="table_create" cellspacing="0" cellpadding="0">
            <tr>
                <td class="field_name">{{$lists['func']['name']}}名称：</td>
                <td>{{$data['name']}}</td>
            </tr>
            <tr>
                <td class="field_name">介绍：</td>
                <td>
                    <textarea cols="30" rows="10" class="textarea_show" readonly>{{$data['intro']}}</textarea>
                </td>
            </tr>
            <tr><td class="center" colspan="2" style="border:0;">
                    <a href="javascript:;">
                        <button class="companybtn" onclick="history.go(-1)">返&nbsp;&nbsp;回</button>
                    </a>
                </td></tr>
        </table>
    </div>
@stop

