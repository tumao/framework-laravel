@extends('main')
@section('content')
@include('_mainMenu')
 <!-- topbar starts -->

 <!-- script of artDialog plugin begin -->
<link rel="stylesheet" type="text/css" href="/packages/css/artDialog.default.css">
<script type="text/javascript" src='/packages/js/artDialog.source.js'></script>
<script type="text/javascript" src='/packages/js/iframeTools.source.js'></script>
<script type="text/javascript" src='/app/permissions.js'></script>
 <!-- artDialog plugin end -->
    
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        @include('_leftMenu')
   
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Tables</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2><i class="glyphicon glyphicon-user"></i> 用户</h2>
                                <h2> &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick='Permission.form()'><i class="glyphicon glyphicon-plus"></i>添加</a></h2>
                            </div>
                            <div class="box-content">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>权限代码</th>
                                            <th>权限名称</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($perm as $permission)
                                        <tr id='row_{{$permission->id}}'>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->code}}</td>                                        
                                            <td>{{$permission->name}}</td>
                                            <td class="center">
                                                <a class="btn btn-info" href="#" onclick="User.form({{$permission->id}})">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    编辑
                                                </a>
                                                <a class="btn btn-danger" href="#" onclick="User.del({{$permission->id}})">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    删除
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!--/span-->

                </div><!--/row-->
        <!-- content ends -->
        </div><!--/#content.col-md-0-->
      

    </div><!--/fluid-row-->

    <hr>



    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2014</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->
@stop