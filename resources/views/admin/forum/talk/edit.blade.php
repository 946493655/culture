@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            {{--@include('admin.common.menu')--}}
        </div>
        <hr/>

        <div class="am-g">
            @include('admin.common.info')
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form" data-am-validator method="POST" action="{{DOMAIN}}admin/talk/{{$data['id']}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                    <fieldset>
                        <div class="am-form-group">
                            <label>话题名称 / Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" required name="name" value="{{ $data['name'] }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>用户 / User：</label>
                            <input type="text" placeholder="不填代表本站" name="uname" value="{{ $data['uname'] }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>专栏 / Theme：</label>
                            <select name="theme" required>
                                @foreach($themes as $theme)
                                    <option value="{{$theme['id']}}" {{$theme['id']==$data['themeid']?'selected':''}}
                                    >{{$theme['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="am-form-group">
                            <label>内容 / Introduce：</label>
                            <textarea cols="50" rows="5" placeholder="内容必填" required name="intro">{{ $data['intro'] }}</textarea>
                        </div>

                        <button type="button" class="am-btn am-btn-primary">返回</button>
                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop

