var app = angular.module('myApp', ['ngTagsInput','ui.bootstrap','xeditable','ngSanitize','angularUtils.directives.dirPagination','angular-growl'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.run(function(editableOptions) {
    editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});

app.config(
    [
        '$interpolateProvider', '$controllerProvider', '$compileProvider', '$provide', '$filterProvider', '$httpProvider','growlProvider',
        function($interpolateProvider, $controllerProvider, $compileProvider, $provide, $filterProvider, $httpProvider, growlProvider) {
            growlProvider.globalTimeToLive({success: 5000, error: 15000, warning: 3000, info: 4000});

            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');

            $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';

            $httpProvider.defaults.xsrfHeaderName = 'X-XSRF-TOKEN';
            var csrf = $('meta[name="csrf-token"]').attr('content');
            $httpProvider.defaults.headers.common["X-XSRF-TOKEN"] = csrf;
            /*$httpProvider.interceptors.push('csrfResponseInterceptor');*/

            app.register = {
                controller: $controllerProvider.register,
                directive: $compileProvider.directive,
                filter: $filterProvider.register,
                factory: $provide.factory,
                service: $provide.service
            };

            app.providers = {
                $controllerProvider: $controllerProvider,
                $compileProvider: $compileProvider,
                $provide: $provide
            }

        }]);

app.factory('csrfResponseInterceptor', [function () {
    var token = null;

    return{
        request: function(config){
            console.log('csrfResponseInterceptor (request) called....');
            if(token){

                config.headers['X-XSRF-TOKEN'] = token;
                console.log('token: '+ token);
            }
            return config;
        },
        response: function(response){
            console.log('csrfResponseInterceptor (response) called....');
            console.log('response');
            console.log(response.headers());
            token = response.headers('X-XSRF-TOKEN');
            console.log('token (response): '+ token);
            return response;
        }
    }
}]);

app.factory('Scopes', function ($rootScope) {
    var mem = {};

    return {
        store: function (key, value) {
            mem[key] = value;
        },
        get: function (key) {
            return mem[key];
        }
    };
});

app.filter('dateToISO', function() {
    return function(input) {
        input = new Date(input).toISOString();
        return input;
    };
});

app.controller('ModalInstanceController',
    ['$rootScope','$scope', '$http', '$filter' ,'$uibModal', '$uibModalInstance', 'items',
        function($rootScope,$scope, $http, $filter, $uibModal, $uibModalInstance, items){
            $scope.hasError = false;
            $scope.payload = items.payload;

            var expectEvent = items.expect;
            console.log('items');
            console.log(items);

            $scope.bind = (items.bind != undefined) ? items.bind : {};
            var url = items.url;
            var str = url.substr(url.lastIndexOf('/'));
            var newUrl = url.replace(new RegExp(str), '');

            var actionUrl = (items.action != undefined) ? items.action : newUrl;

            var originalObj = angular.extend({}, items.bind);
            var hasQueryStr = actionUrl.search('\\?');
            if(hasQueryStr != -1)
            {
                actionUrl = actionUrl.substr(0,hasQueryStr);
            }
            var hasCreate = actionUrl.search('/create');
            if(hasCreate != -1){
                actionUrl = actionUrl.substr(0, hasCreate);
            }

            console.log('actionUrl');

            console.log(actionUrl);
            

            $scope.ok = function () {
                if($scope.bind.id != undefined || $scope.bind.Id != undefined){
                    if(items.action == 'delete')
                    {
                        actionUrl = newUrl;
                        $http.delete(actionUrl)
                            .success(function (d) {
                                if (expectEvent != undefined && expectEvent != '') {
                                    $rootScope.$emit(expectEvent, d);
                                }
                                $modalInstance.close(d);
                            })
                            .error(function (d) {
                                console.log(d);
                                console.log('error occurred');
                                $scope.errors = d;
                                $scope.hasError = true;
                            });
                    }else{
                        $('#editmodal-error').html('');
                        $('#editmodal-error').hide();
                        $http.put(actionUrl, $scope.bind)
                            .success(function(d){
                                if(d.status == 'success')
                                {
                                    if(expectEvent != undefined && expectEvent != '')
                                    {
                                        console.log(d);
                                        $rootScope.$emit(expectEvent, d);
                                    }
                                    $uibModalInstance.close($scope.bind);
                                }else{
                                    $scope.errors = d;
                                    $scope.hasError = true;
                                    $('#editmodal-error').html(d.message);
                                    $('#editmodal-error').show();
                                }
                            })
                            .error(function(d){
                                $scope.errors = d;
                                $scope.hasError = true;
                            });
                    }
                }else{
                    $http.post(actionUrl, $scope.bind)
                        .success(function(d){
                            if(d.success)
                            {
                                if(expectEvent != undefined && expectEvent != '')
                                {
                                    $rootScope.$emit(expectEvent, d);
                                }
                                $uibModalInstance.close($scope.bind);
                            }else{
                                $scope.errors = d;
                                $scope.hasError = true;
                            }
                        })
                        .error(function(d){
                            $scope.errors = d;
                            $scope.hasError = true;
                        });
                }
            };

            $scope.cancel = function () {
                angular.extend($scope.bind, originalObj);
                $uibModalInstance.dismiss('cancel');
            };
        }]);

app.directive('datepicker', function () {
    return {
        restrict: 'C',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
            $(element).datepicker({
                dateFormat: 'yyyy-mm-dd',
                onSelect: function (date) {
                    scope.date = date;
                    scope.$apply();
                }
            });
        }
    };
});

app.directive('toggleone', ['$rootScope', function ($rootScope) {
    return {
        restrict: 'C',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
            $(element).bootstrapToggle({
                on: 'Activated',
                off: 'Deactivated'
            });

            var ctrl = $(element).data('ctrl');
            
            element.on('change', function(){
                var elementval = element.prop('checked') ? '1' : '0';
                console.log(elementval);
                var activate = scope.object.isactive != undefined ? scope.object.isactive : (scope.object.IsActive ? "1" : "0");
                if(activate != elementval)
                {
                    if(elementval == "1")
                    {
                        $rootScope.$emit(ctrl+'.unpauseStatus', scope.object);
                    }
                    else
                    {
                        $rootScope.$emit(ctrl+'.pauseStatus', scope.object);
                    }
                }
            });

            if((scope.object.isactive != undefined && scope.object.isactive == "1") || (scope.object.IsActive != undefined && scope.object.IsActive)){
                $(element).bootstrapToggle('on');
            }
            else
            {
                $(element).bootstrapToggle('off');
            }
        }
    };
}]);

app.directive('showModal', ['$uibModal', '$http' , '$log', '$q', function($uibModal, $http, $log, $q){
    return {
        restrict : 'C',
        scope: {
            myItem : '=item',
            myResultEvent : '@expect',
            myAction : '@action',
            myPayload : '=payload'
        },
        link: function (scope, element, attrs) {
            element.removeClass('show_modal');
            element.bind('click', function (e) {
                e.preventDefault();
                scope.openModal(this.href);
                scope.$apply();

            });

            scope.$on('$destroy', function(){
                element.unbind('click');
            });

            scope.openModal = function (url) {
                var originalObj = angular.extend({}, scope.myItem);
                //var deferred = $q.defer();
                var uibModalInstance = $uibModal.open({
                    animation: true,
                    templateUrl: url,
                    controller: 'ModalInstanceController',
                    resolve: {
                        items: function () {
                            console.log(scope);
                            return {
                                bind    :   scope.myItem,
                                url     :   url,
                                expect	: 	scope.myResultEvent,
                                action	:	scope.myAction,
                                payload	:	scope.myPayload
                            };
                        }
                    }
                });

                uibModalInstance.result.then(function (data) {
                    //console.log('data');
                    //console.log(data);

                }, function () {
                    angular.extend(scope.myItem, originalObj);
                    //console.log('cancelled');
                });
            };
        }
    };
}]);

app.directive('convertToNumber', function() {
    return {
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
            ngModel.$parsers.push(function(val) {
                return parseInt(val, 10);
            });
            ngModel.$formatters.push(function(val) {
                return '' + val;
            });
        }
    };
});

app.directive('location', ['$uibModal', '$http' , '$log', '$q', function($uibModal, $http, $log, $q, $timeout){

    return {
        restrict : 'C',
        scope: {
            ngModel : '=ngModel'
        },
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
            var lookup = 'http://lookups.adbrilliant.com/loc/';

            element.autocomplete({
                serviceUrl: lookup,
                onSelect : function(data){

                    if(ngModelCtrl)
                    {
                        ngModelCtrl.$setViewValue(data.value);
                    }
                }
            });
        }
    };
}]);

app.directive('category', ['$uibModal', '$http' , '$log', '$q', function($uibModal, $http, $log, $q, $timeout){

    return {
        restrict : 'C',
        scope: {
            ngModel : '=ngModel'
        },
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
            var lookup = '/api/all-categories';

            element.autocomplete({
                serviceUrl: lookup,
                onSelect : function(data){

                    if(ngModelCtrl)
                    {
                        ngModelCtrl.$setViewValue(data.value);
                    }
                }
            });
        }
    };
}]);