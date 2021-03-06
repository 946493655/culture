@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            {{--@include('admin.common.menu')--}}
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{DOMAIN}}admin/product/create">
                            <button type="button" class="am-btn am-btn-default">
                                <img src="{{PUB}}assets/images/add.png" class="icon"> 添加
                            </button>
                        </a>
                    </div>
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{DOMAIN}}admin/temp">
                            <button type="button" class="am-btn am-btn-default">
                                <img src="{{PUB}}assets/images/files.png" class="icon"> 在线模板
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox"/></th>
                        <th class="table-id">ID</th>
                        <th class="table-title">产品名称</th>
                        <th class="table-type">模板名</th>
                        <th class="table-type">缩略图</th>
                        <th class="table-type">视频链接</th>
                        <th class="table-type">用户名称</th>
                        <th class="table-date am-hide-sm-only" width="150">添加时间</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(count($datas))
                    @foreach($datas as $data)
                    <tr>
                        <td class="am-hide-sm-only"><input type="checkbox" /></td>
                        <td class="am-hide-sm-only">{{$data['id']}}</td>
                        <td class="am-hide-sm-only"><a href="{{DOMAIN}}admin/product/{{$data['id']}}">
                                {{$data['name']}}</a></td>
                        <td class="am-hide-sm-only">{{$data['tempName']}}</td>
                        <td class="am-hide-sm-only">
                            @if($data['thumb'])<img src="{{$data['thumb']}}" width="30">@else/@endif
                        </td>
                        <td class="am-hide-sm-only">{{$data['link']?'有':'无'}}</td>
                        <td class="am-hide-sm-only">{{$data['uname']}}</td>
                        <td class="am-hide-sm-only">{{$data['createTime']}}</td>
                        <td class="am-hide-sm-only">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{DOMAIN}}admin/product/{{$data['id']}}"><button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><img src="{{PUB}}assets/images/show.png" class="icon"> 查看</button></a>
                                    <a href="{{DOMAIN}}admin/product/{{$data['id']}}/edit"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 编辑</button></a>
                                    @if($data['isshow']==2)
                                    <a href="{{DOMAIN}}admin/product/setshow/{{$data['id']}}/1"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 去隐藏</button></a>
                                    @else
                                    <a href="{{DOMAIN}}admin/product/setshow/{{$data['id']}}/2"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 去显示</button></a>
                                    @endif
                                    <a href="{{env('ONLINE_DOMAIN')}}admin/pro/{{$data['id']}}/layer" target="_blank"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><img src="{{PUB}}assets/images/edit.png" class="icon"> 创作界面</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else <tr><td colspan="10" style="text-align:center;">没有记录</td></tr>
                @endif
                    </tbody>
                </table>
                @include('admin.common.page2')
                <p>默认高宽：720*405</p>
            </div>
        </div>
    </div>
@stop