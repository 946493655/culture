@extends('home.main')
@section('content')
    {{--@include('home.common.crumb')--}}
    <div class="s_crumb">
        <div class="crumb">
            <div class="right">
                <a href="/">首页</a> / 关于本站
            </div>
        </div>
    </div>

    <div class="about_con">
        <h3>平台功能</h3>
        <p>
            此网站向往着为文化产业搭建一个发布、查看、管理文化资源，进行样片的艺术创作的多功能平台。
        </p>
        <p>
            对于制作公司或平台企业：在这里可以涵盖宣传片、广告片、微电影、汇报片等等相关企业发布样片和作品，用户也可以按自己需求特点发布自己想要的样片需求来寻找制作公司。而且企业或制作公司均可以在本站拥有自己的企业管理后台。
        </p>
        <p>
            对于个人用户和设计师：类似企业和制作公司，可以拥有个人或设计师自己管理中心，但功能有所区别。
        </p>
        <p>
            另外设计师和制作公司可以在创意页面发表自己的创意设想，如果有用户同意其创意，便有合作机会了。
            其外，所有用户都可以在话题页面书写话题，对他人或者公司评论、点赞、举报等等。
        </p>
        <p>
            本站特色：以上几点，其他网站可能拥有类似功能。
            但是特色功能可能没有：就是本站还设有创作窗口，用户可以按照自己想法进行视频特效的艺术创作，创作之后还可以保存，再次打开可以继续创作，或者还能分享。
            关于创作页面操作：创作是由样式属性、动画帧、动画内容组成的一个产品，之间互相配合形成动画结果。属性是显示的效果，动画帧是调动画的，动画内容有图片和文字可以选填。
        </p>
        <p>
            本站追求：急用户之所急，成用户之所想！
        </p>
        @include('home.about.menu')
    </div>
    <div style="height:300px;">{{--空白--}}</div>
@stop