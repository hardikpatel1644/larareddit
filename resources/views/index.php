<!DOCTYPE html>
<html lang="en-US" ng-app="newsRecords">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Reddit-Like</title>
        <!-- Bootstrap core CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= asset('css/upvote.css') ?>" rel="stylesheet">
    </head>
    <body>
        <div  ng-controller="newsController">
            <nav class="navbar navbar-default navbar-top">
                <div class="container" >
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Reddit-Like</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse" >
                        <ul class="nav navbar-nav" >
                            <li  id="hot"><a href="#hot" ng-click="categoryCall('hot');">Hot</a></li>
                            <li  id="new"><a href="#new" ng-click="categoryCall('new');">New</a></li>
                            <li  id="rising"><a href="#rising"  ng-click="categoryCall('rising');">Rising</a></li>
                            <li  id="controversial"><a href="#controversial"  ng-click="categoryCall('controversial');">Controversial</a></li>
                            <li  id="top"><a href="#top"  ng-click="categoryCall('top');">Top</a></li>
                            <li  id="gilded"><a href="#gilded"  ng-click="categoryCall('gilded');">Gilded</a></li>
                            <li  id="ads"><a href="#ads"  ng-click="categoryCall('ads');">Promoted</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>

            <!-- Begin page content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1><span id="news_title" style="text-transform: uppercase"> HOT </span>  News Listing</h1>
                        <div class="scroll">
                            <div class="row">
                                <div class="span8">
                                    <div ng-show="isEmpty(news)"><h4>No Records found</h4></div>
                                    <div class="row" dir-paginate="newsData in news |filter:search|itemsPerPage:10">
                                        <div class="col-md-1">
                                            <div class="upvote topic upvote-disabled" data-post="21">
                                                <a id="up" class="upvote vote upvote-enabled" data-value="1" data-post-id="21"></a>
                                                <!-- Notice how we set the sum of the votes for this post here -->
                                                <span class="count">{{ newsData.score}}</span>
                                                <a id="down" class="downvote vote upvote-enabled" data-value="-1" data-post-id="21"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#" class="thumbnail">
                                                <img src="{{ newsData.thumbnail}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <p>
                                                <a href="{{ newsData.url}}" target="_blank">{{ newsData.title}}</a>
                                            </p>
                                            <p >
                                                submitted by <b>{{ newsData.author}}</b> |
                                                <b>{{ newsData.created }}</b> ago |
                                                <b>{{ newsData.num_comments}}</b> Comments
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>                
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="well" style="margin-top: 30px;">
                            <h4>Search</h4>
                            <form class="form-inline">
                                <div class="form-group">
                                    <label >Search</label>
                                    <input type="text" ng-model="search" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="well">
                            <dir-pagination-controls
                                max-size="10"
                                direction-links="true"
                                boundary-links="true" >
                            </dir-pagination-controls>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="text-muted">by Hardik Patel.</p>
            </div>
        </footer>
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('app/lib/dirPagination.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/news.js') ?>"></script>
    </body>
</html>