var app;
try {
    app = angular.module("myApp");
} catch(err) {
    app = angular.module("myApp", ['ui.bootstrap']);
}

app.controller('HeaderCtrl',
	["$rootScope","$scope","$http","$filter",
	function ($rootScope,$scope, $http, $filter) {

		var _this = this;
		var orderBy = $filter('orderBy');

		$scope.headerCtrl = this;

		//member data
		angular.extend(this, {
			isLoaded 		: false,
			isAdvanceSearch	: false,
			isReverse		: true,
			pageSize		: 25,
			data_url		: '',
			field 			: 'name',
			searchAdvText	: 'show advanced options',
			navigations		: [],
            nextKeywords	: [],
			searchQry		: {},
			columns 		: [
				{'class':'col-sm-2','field':'name','title':'Name'},
				{'class':'col-sm-2','field':'filename','title':'Filename'},
				{'class':'col-sm-2','field':'description','title':'Description'}
			]
		});

		//methods
		angular.extend(this, {
			loadNavigations : function(){
				/*$http.get('/api/menu').success(function(data){
					_this.navigations = data.menu;	
					_this.isLoaded = true;
				});*/

			}
		});

		var createListener = $rootScope.$on('linksCtrl.create', function (event, data) {
			if(data.object.menu_item > 0 ){
				_this.navigations = _this.navigations.push(data.object);
			}
		});
		var updateListener = $rootScope.$on('linksCtrl.update', function (event, data) 
		{
			if(!data.object.menu_item){
				for(var i=0;i < _this.navigations.length; i++)
				{
					if(data.object.id == _this.navigations[i].id){
						if(!data.object.menu_item){
							_this.navigations.splice(i,1); }
					}
				}
			}else{
				_this.navigations.splice(_this.navigations.length,0,data.object);
			}
		});
		var destroyListener = $rootScope.$on('linksCtrl.destroy', function (event, data) 
		{
				for(var i=0;i < _this.navigations.length; i++)
				{
					if(data.object.id == _this.navigations[i].id){
						if(!data.object.menu_item){
							_this.navigations.splice(i,1); }
					}
				}
		});
		var deleteListener = $rootScope.$on('linksCtrl.delete', function (event, data) 
		{
				for(var i=0;i < _this.navigations.length; i++)
				{
					if(data.object.id == _this.navigations[i].id){
						if(!data.object.menu_item){
							_this.navigations.splice(i,1); }
					}
				}
		});
}]);
