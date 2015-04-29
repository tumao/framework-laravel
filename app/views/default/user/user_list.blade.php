@extends('main')
@section('content')
@include('_mainMenu')
 <!-- topbar starts -->

 <!-- script of artDialog plugin begin -->
<link rel="stylesheet" type="text/css" href="/packages/css/artDialog.default.css">
<script type="text/javascript" src='/packages/js/artDialog.source.js'></script>
<script type="text/javascript" src='/packages/js/iframeTools.source.js'></script>
<script type="text/javascript" src='/app/user.js'></script>
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
                                @if(\Sentry::hasAccess('user.create'))
                                <h2> &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick='User.form()'><i class="glyphicon glyphicon-plus"></i>添加</a></h2>
                                @endif
                            </div>
                            <div class="box-content">
                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>用户名</th>
                                            <th>邮箱</th>
                                            <th>真实姓名</th>
                                            <th>分组</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr id='row_{{$user->id}}'>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>                                        
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->real_name}}</td>
                                            <td>{{$user->group}}</td>
                                            <td><span class="label-warning label label-default">激活</span></td>
                                            <td class="center">
                                                @if(\Sentry::hasAccess('user.update'))
                                                <a class="btn btn-warning" href="#" onclick="User.update_passwd({{$user->id}})">
                                                    <i class="glyphicon glyphicon-qrcode icon-white"></i>
                                                    重置密码
                                                </a>
                                                
                                                <a class="btn btn-info" href="#" onclick="User.form({{$user->id}})">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    编辑
                                                </a>
                                                @endif
                                                @if(\Sentry::hasAccess('user.delete'))
                                                <a class="btn btn-danger" href="#" onclick="User.del({{$user->id}})">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    删除
                                                </a>
                                                @endif
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