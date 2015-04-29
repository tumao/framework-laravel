extends('main')

@section('content')

@include('_mainMenu')

<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
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
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-info-sign"></i> 緩存  </h2>
                    </div>
                    <div class="box-content row">
                        <div class="col-lg-7 col-md-12">
                            <h1>详情 <br>
                                <small>Redis缓存 Memcache缓存 文件缓存.</small>
                            </h1>
                            
                            <p class="center-block download-buttons">
                                <a href="#" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-chevron-left glyphicon-white"></i>
                                        缓存已经成功清除
                                </a>
                            </p>
                        </div>
                        <!-- Ads, you can remove these -->
                        <div class="col-lg-5 col-md-12 hidden-xs center-text">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Charisma Demo 4 -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:336px;height:280px"
                                 data-ad-client="ca-pub-5108790028230107"
                                 data-ad-slot="9467443105"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                        <div class="col-lg-5 col-md-12 visible-xs center-text">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Charisma Demo 5 -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:250px;height:250px"
                                 data-ad-client="ca-pub-5108790028230107"
                                 data-ad-slot="8957582309"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                        <!-- Ads end -->

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