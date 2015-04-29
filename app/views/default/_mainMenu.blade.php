<!-- menu starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="/packages/img/logo20.png" class="hidden-xs"/>
            <span>后台管理</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">用户详情</a></li>
                <li class="divider"></li>
                <li><a href="/admin/logout">退出</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
            @foreach($menu['main_menu'] as $menu_item)
            <li @if($menu_item['active']) class='active' @endif>
                <a href="{{$menu_item['path']}}">{{$menu_item['name']}}</a>
            </li>
            @endforeach
            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="#"><i class="glyphicon glyphicon-globe"></i>返回站点</a></li>
        </ul>

    </div>
</div>
<!-- menu ends -->