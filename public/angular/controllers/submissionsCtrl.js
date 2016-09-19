var myApp;
try {
    myApp = angular.module("myApp");
} catch(err) {
    myApp = angular.module("myApp", ['ui.bootstrap']);
}

myApp.controller('submissionsCtrl',
    ["$rootScope","$scope","$http","$filter","$uibModal","$window", "$sanitize","growl",
        function ($rootScope,$scope, $http, $filter, $uibModal, $window, $sanitize, growl) {

            var _this = this;
            var orderBy = $filter('orderBy');

            $scope.submissionsCtrl = this;

            //member data
            angular.extend(this, {
                isLoaded        : false,
                isAdvanceSearch : false,
                isReverse       : true,
                pageSize        : 25,
                totalItems      : 0,
                currentPage     : 1,
                id             : '',
                url             : '',
                company             : '',
                job_title             : '',
                location             : '',
                field           : 'name',
                searchAdvText   : 'show advanced options',
                data           : [],
                objects           : [],
                advertisers       : [],
                advertiser       : '',
                searchQry		: [],
                columns 		: [
                    {'class':'col-sm-2','field':'email','title':'Email'},
                    {'class':'col-sm-2','field':'advertiserid','title':'Advertiser'},
                    {'class':'col-sm-2','field':'role','title':'Role'},
                    {'class':'col-sm-2','field':'status','title':'Status'}
                ],
                statuses : [
                    {'Id':0,'Title':'Inactive'},
                    {'Id':1,'Title':'Active'},
                ],
                roles : [
                    {'Id':1,'Title':'admin'},
                    {'Id':2,'Title':'advertiser'}
                ]
            });

            //methods
            angular.extend(this, {
                loadlists : function(){
                    _this.getResultsPage(1);
                },
                pageChanged : function(newPage) {
                    _this.getResultsPage(newPage);
                },
                getResultsPage : function(pageNumber){
                    _this.isLoaded = false;
                    $http.get('/api/all-submissions?page='+ pageNumber).success(function(res){
                        _this.objects = res.data;
                angular.forEach(_this.objects, function(object){
                                object.search_volume = parseFloat(object.search_volume);
                            });
                            _this.totalItems = res.total;
                            _this.pageSize = res.per_page;
                            _this.isReverse = !_this.isReverse;
                            _this.order(_this.field);
                            _this.loadAdvertisers();
                            _this.isLoaded = true;
                        });
                    },
                idx : function($index)
                {
                    return (_this.currentPage - 1) * _this.pageSize + $index + 1;
                },
                changeFilterTo : function(){
                    _this.searchQry = {};
                    _this.isAdvanceSearch = !_this.isAdvanceSearch;
                    _this.searchAdvText = _this.isAdvanceSearch ? 'hide ' : 'show ';
                    _this.searchAdvText += ' advanced options';
                },
                order : function(predicate) {
                    _this.isReverse = !_this.isReverse;
                    _this.field = predicate;
                    angular.forEach(_this.objects, function(object){
                        object.search_volume = parseFloat(object.search_volume);
                    });
                    _this.objects = orderBy(_this.objects, predicate, _this.isReverse);
                },
                loadAdvertisers : function(){
                    $http.get('/api/all-advertisers').success(function(res){
                        _this.advertisers = res;
                    });
                },
                updateData : function(data, object){
                    $http.put('/users/edit/'+object.id, data).success(function(res){
                        if(res.status == 'error')
                        {
                            $rootScope.$emit('submissionsCtrl.updateError', res.data);
                            growl.error('<span>'+res.message.join('</p></p>')+'. Reverting previous value.</span>', {});
                        }else{
                            growl.success('<span>'+res.message +'</span>', {});
                        }
                    }).error(function(res){
                        growl.error('<span>Error occurred: '+res+'</span>', {});
                    });
                },
                showAdvertiser: function(object){
                    var category = '';
                    angular.forEach(_this.advertisers, function(value, key) {
                        if(object.advertiserid == value.Id)
                        {
                            category = value.Title;
                            return;
                        }
                    },[]);
                    return category;
                },
                showRole: function(object){
                    var category = '';
                    angular.forEach(_this.roles, function(value, key) {
                        if(object.role == value.Title)
                        {
                            category = value.Title;
                            return;
                        }
                    },[]);
                    return category;
                },
                showStatus: function(object){
                    var category = '';
                    angular.forEach(_this.statuses, function(value, key) {
                        if(object.status == value.Id)
                        {
                            category = value.Title;
                            return;
                        }
                    },[]);
                    return category;
                },
                destroyData: function (id){
                    console.log('id: '+id);
                    ans = confirm('Are you sure to delete?');
                    if(ans)
                    {
                        $http.delete('/users/delete/'+id).success(function(data)
                        {
                            if(data.status == "success")
                            {
                                rowArr = eval(_this.objects);
                                for(i=0; i<rowArr.length;i++)
                                {
                                    if(rowArr[i].id == id)
                                    {
                                        index = i;
                                        break;
                                    }
                                }
                                _this.objects.splice(index, 1);
                            }
                        });
                    }


                }
            });

            _this.loadlists();

            // Events Listener
            var createListener = $rootScope.$on('submissionsCtrl.create', function (event, data) {
                _this.data.push(data.data);
            });
            var updateListener = $rootScope.$on('submissionsCtrl.update', function (event, data) {
                if(data.status == 'error')
                {
                    //$rootScope.$emit('submissionsCtrl.updateError', res.data);
                    growl.error('<span>'+data.message+'. Reverting previous value.</span>', {});
                }else{
                    growl.success('<span>'+data.message +'</span>', {});
                }
            });

            var updateErrorListener = $rootScope.$on('submissionsCtrl.updateError', function (event, data) {
                for(var i in _this.objects)
                {
                    if(_this.objects[i].id == data.id)
                    {
                        _this.objects[i] = data;
                        break;
                    }
                }
            });

            $scope.$on('$destroy', function(){
                createListener();
                updateListener();
                updateErrorListener();
            });

        }]);
