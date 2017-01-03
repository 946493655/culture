{{-- 话题菜单模板 --}}


<div class="am-u-sm-12 am-u-md-6">
    <div class="am-btn-toolbar">
        <div class="am-btn-group am-btn-group-xs">
            @if($crumb['category']['url']=='theme')
            <a href="{{DOMAIN}}admin/theme/create">
                <button type="button" class="am-btn am-btn-default">
                    <img src="{{PUB}}assets/images/add.png" class="icon"> 添加专栏
                </button>
            </a>
            @elseif($crumb['category']['url']=='talk')
            <a href="{{DOMAIN}}admin/talk/create">
                <button type="button" class="am-btn am-btn-default">
                    <img src="{{PUB}}assets/images/add.png" class="icon"> 添加话题
                </button>
            </a>
            @endif
            <a href="{{DOMAIN}}admin/talk">
                <button type="button" class="am-btn am-btn-default">
                    <img src="{{PUB}}assets/images/files.png" class="icon"> 话题列表
                </button>
            </a>
            <a href="{{DOMAIN}}admin/theme">
                <button type="button" class="am-btn am-btn-default">
                    <img src="{{PUB}}assets/images/files.png" class="icon"> 专题列表
                </button>
            </a>
        </div>
    </div>
</div>
<div class="am-u-sm-12 am-u-md-3">
    <div class="am-input-group am-input-group-sm">
        <input type="text" class="am-form-field" placeholder="输入用户名称，可不填" name="uname" value="{{ $uname }}">
        <span class="am-input-group-btn">
            <button type="button" class="am-btn am-btn-default" onclick="search($('input[name=uname]').val())">搜索</button>
        </span>
    </div>
    <script>
        //s代表用户简写
        function search(uname){
            if (uname=='') {
                window.location.href = '{{DOMAIN}}admin/theme';
            } else {
                window.location.href = '{{DOMAIN}}admin/theme/s/'+uname;
            }
        }
    </script>
</div>