@extends('main')
@section('content')
@include('_mainMenu')
 <!-- topbar starts -->
    
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
                        <a href="#">Dashboard</a>
                    </li>
                </ul>
            </div>


        </div><!--/#content.col-md-0-->

        <div class="box col-md-10">
            <div class="box-inner homepage-box">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-user"></i> 用户配置</h2>

                   <!--  <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div> -->
                </div>
                <div class="box-content">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#user">用户列表</a></li>
                        <li><a href="#pending">待审列表</a></li>
                        <li><a href="#dellist">禁用列表</a></li>
                        <li><a href="#adduser">添加用户</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="user">
                            <div class="box-content">
                                <table class="table table-striped table-bordered responsive">
                                    <thead>
                                    <tr>
                                        <th>用户名</th>
                                        <th>注册日期</th>
                                        <th>分组</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td>Muhammad Usman</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                             <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                详情
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                编辑
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Abraham</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                             <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                详情
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                编辑
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brown Blue</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                             <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                详情
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                编辑
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Worth Name</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                详情
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                编辑
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/span-->

                        </div>
                        <div class="tab-pane" id="pending">
                            <div class="box-content">
                                <table class="table table-striped table-bordered responsive">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Date registered</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td>Muhammad Usman</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Abraham</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brown Blue</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Worth Name</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="tab-pane" id="dellist">
                            <div class="box-content">
                                <table class="table table-striped table-bordered responsive">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Date registered</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td>Muhammad Usman</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Abraham</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brown Blue</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Worth Name</td>
                                        <td class="center">2012/03/01</td>
                                        <td class="center">Member</td>
                                        <td class="center">
                                            <span class="label-warning label label-default">Pending</span>
                                        </td>
                                        <td class="center">
                                            <a class="btn btn-success" href="#">
                                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                View
                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="#">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="tab-pane" id="adduser">
                            <p>添加用户</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/fluid-row-->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2014</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->
@stop