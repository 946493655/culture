@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <div class="am-g">
            @include('admin.common.menu')
        </div>
        <hr/>

        <div class="am-g">
            @include('admin.common.info')
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form" data-am-validator method="POST" action="{{DOMAIN}}admin/comppt/{{ $data->id }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                    <fieldset>
                        <div class="am-form-group">
                            <label>图片 / Picture：
                                <a href="/admin/pic">图片列表</a>
                            </label>
                            <select name="pic_id">
                                <option value="0">选择图片</option>
                                @if(count($pics))
                                    @foreach($pics as $pic)
                                <option value="{{ $pic->id }}" {{ $data->pic_id==$pic->id ? 'selected' : '' }}>{{ $pic->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="am-form-group">
                            <label>鼠标移动显示 / Title：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" name="title" value="{{ $data->title }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>链接 / Url：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" name="url" value="{{ $data->url }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>排序 / Sort：</label>
                            <input type="text" pattern="^\d+$" required name="sort" value="{{ $data->sort }}">
                        </div>

                        <div class="am-form-group">
                            <label>前台是否显示 / Is Show：</label>
                            <label><input type="radio" name="isshow" value="0" {{ $data->isshow==0 ? 'checked' : '' }}> 不显示&nbsp;&nbsp;</label>
                            <label><input type="radio" name="isshow" value="1" {{ $data->isshow==1 ? 'checked' : '' }}> 显示&nbsp;&nbsp;</label>
                        </div>

                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop

