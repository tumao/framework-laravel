<!-- left menu starts -->
<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header"><!--首页-->&nbsp;&nbsp;</li>
                @foreach($menu['sub_menu'] as $item)
                <li @if($item['active']) class='active' @endif>
                    <a class="ajax-link" href="{{$item['path']}}">
                        <i class="glyphicon {{$item['icon']}}"></i><span>&nbsp;&nbsp;{{$item['name']}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--/span-->

<!-- left menu ends -->