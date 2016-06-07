{{--菜单模板--}}


<style>
    .menu { margin-left:-20px;position:fixed;left:auto;right:auto;top:400px;z-index:10; }
    .menu .pos { margin-top:-15px; }
    .menu a { text-decoration:none; }
    .menu a .bg { width:100px;height:30px;border:1px solid rgb(50,50,50);border-radius:5px;background:black;box-shadow:0 0 5px rgba(100, 100, 100, 1);
        filter:alpha(opacity=40);-moz-opacity:0.4;opacity:0.4; }
    .menu .pos a .text { padding:0 5px;color:white;font-size:18px;position:relative;left:10px;top:-27px; }
    .menu a:hover .bg { filter:alpha(opacity=100);-moz-opacity:1;opacity:1; }
    .menu a:hover .text { color:red; }
    .menu a.close,.menu a.open  { padding:2px 10px;width:15px;color:red;background:lightgrey;position:relative;left:110px;top:-50px;cursor:pointer; }
    .menu a.open { position:relative;left:-10px;top:20px; }
    .menu a:hover.close,.menu a:hover.open  { color:white;background:red; }
</style>
<div class="menu">
    <div class="pos"><a href="/about"><div class="bg"></div><div class="text">平台功能</div></a></div>
    <div class="pos"><a href="/about/join"><div class="bg"></div><div class="text">招募同伙</div></a></div>
    <div><a class="close">X</a> <a class="open" style="display:none;"> >> </a></div>
</div>
<script>
    $(document).ready(function(){
        $(".close").click(function(){ $(".pos").hide(200); $(".open").show(200); $(this).hide(200); });
        $(".open").click(function(){ $(".pos").show(200); $(this).hide(200); $(".close").show(200); });
    });
</script>