,,@extends('admin.main')
@section('content')
    <div class="admin-content">
        @include('admin.common.crumb')
        <hr/>

        <div class="am-g">
            @include('admin.common.info')
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form" data-am-validator method="POST" action="/admin/action/{{ $data->id }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="pid" value="{{ $parent['id'] }}">
                    <label>本级是{{$parent['id']==0?'0级操作':$parent['name'].'的子操作'}}</label>
                    <fieldset>
                        <div class="am-form-group">
                            <label>操作名称 / Name：</label>
                            <input type="text" placeholder="至少2个字符" minlength="2" required name="name" value="{{ $data->name }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>命名空间 / Namespace：</label>
                            <input type="text" placeholder="例：App\Http\Controllers\Admin" pattern="^[A-Z][a-zA-Z_\\]+$" required name="namespace" value="{{ $data->namespace }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>控制器名称 / Controller Name：</label>
                            <input type="text" placeholder="例：TestController" pattern="^[A-Z][a-zA-Z_]+$" required name="controller_prefix" value="{{ $data->controller_prefix }}Controller"/>
                        </div>

                        <div class="am-form-group">
                            <label>访问路径部分url / Url：</label>
                            <input type="text" placeholder="小写，例：action" pattern="^[a-z_]+$" required name="url" value="{{ $data->url }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>方法名 / Function Name：</label>
                            <input type="text" placeholder="例：index" pattern="^[a-zA-Z_]+$" required name="action" value="{{ $data->action }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>Class样式 / Style Name：</label>
                            <input type="text" pattern="^[a-zA-Z_-]+$" name="style_class" value="{{ $data->style_class }}"/>
                        </div>

                        <div class="am-form-group">
                            <label>描述 / Introduce：</label>
                            <textarea name="intro" cols="50" rows="5">{{ $data->intro }}</textarea>
                        </div>

                        <div class="am-form-group">
                            <label>父操作 / Parent Action：</label>
                            <select name="pid" required>
                                <option value="0">0级操作</option>
                                @foreach($pactions as $paction)
                                    <option value="{{ $paction->id }}" {{ $data->pid==$paction->id ? 'selected' : '' }}>{{ $paction->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@stop

