app.controller('newsController', function($scope, $http, API_URL) {
    $http.get(API_URL + "news")
            .success(function(response) {
                $scope.news = response;
            });
    $scope.categoryCall = function(category) {
        $("#news_title").html(category);
        $('.nav li').removeClass('active');
        if (!$("#" + category).hasClass('active')) {
            $("#" + category).addClass('active');
        }
        $http.get(API_URL + 'news/' + category)
                .success(function(response) {
                    console.log(response);
                    $scope.news = response;
                });
    };
    $scope.isEmpty = function (obj) {
    for (var i in obj) if (obj.hasOwnProperty(i)) return false;
    return true;
};
});
