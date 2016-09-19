@extends('layouts.list')

@section('title')
    Users
@endsection

@section('ang-controller') ng-controller="usersCtrl"  ng-init="[usersCtrl.data_url ='{{ $page_info['data_url'] or '/api/all-users' }}' ,usersCtrl.data_title='{{ $page_info['title'] or 'Users'}}']"@stop

@section('create-link')
    (<span ng-hide="usersCtrl.isLoaded"><i class="fa fa-refresh fa-spin"></i></span><span ng-bind="usersCtrl.totalItems"></span>)
@endsection

@section('search')
    <input type="text" class="form-control" placeholder="Search" ng-model='usersCtrl.searchQry.$' />
@endsection

@section('buttons')
    <a href="{{ url('/users/add/') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>
@endsection

@section('advancesearch')
    @parent
    <a href="javascript:void(0);" ng-click="usersCtrl.changeFilterTo()"><span ng-bind="usersCtrl.searchAdvText"></span></a>
@stop

@section('data')
    <table class='table table-striped col-md-12' >
        <thead>
        <tr>
            <th>#</th>
            <th class="[[column.class]]" ng-repeat="column in usersCtrl.columns">
                <a href='javascript:void(0);' ng-click="usersCtrl.order(column.field)">
                    <span ng-bind="column.title"></span>
                </a>&nbsp;
					<span ng-show="usersCtrl.field == column.field" class="sortorder" ng-class="{reverse:usersCtrl.isReverse}">
						<i class="fa" ng-class="{'fa-sort-asc':usersCtrl.isReverse, 'fa-sort-desc':!usersCtrl.isReverse}"></i>
					</span>
            </th>
            <th colspan="3"></th>
        </tr>
        </thead>
        {{--<tr id='advanced_search' class="info hidden" ng-if="usersCtrl.isAdvanceSearch">
            <td>&nbsp;</td>
            <td><input type='text' ng-model='usersCtrl.searchQry.name' placeholder="Search Name"/></td>
            <td><input type='text' ng-model='usersCtrl.searchQry.email' placeholder="Search Email"/></td>
            <td><input type='text' ng-model='usersCtrl.searchQry.advertiserid' placeholder="Search Advertiser"/></td>
            <td><input type='text' ng-model='usersCtrl.searchQry.role' placeholder="Search Role"/></td>
            <td><input type='text' ng-model='usersCtrl.searchQry.status' placeholder="Search Status"/></td>
            <td colspan="3"></td>
        </tr>--}}
        <tbody>
        <tr ng-hide="usersCtrl.isLoaded"><td colspan="7"><i class="fa fa-refresh fa-spin"></i></td></tr>
        <tr dir-paginate="object in usersCtrl.objects  |filter:usersCtrl.searchQry | itemsPerPage: usersCtrl.pageSize" pagination-id="keywords" total-items="usersCtrl.totalItems" current-page="usersCtrl.currentPage">
            <td><span ng-bind="usersCtrl.idx($index)"></span></td>
            <td>
                <div editable-text="object.fullname" e-name="fullname" e-form="rowform">
                    <span ng-bind="object.fullname || 'empty'"></span>
                </div>
            </td>
            <td>
                <!--<div editable-text="object.email" e-name="name" e-form="rowform">-->
                <span ng-bind="object.email || 'empty'"></span>
                <!--</div>-->
            </td>
            <td>
                <div e-style="width: 80%;" e-class="form-control col-md-5" e-name="advertiserid" editable-select="object.advertiserid" e-ng-options="s.Id as s.Title for (index,s) in usersCtrl.advertisers"  e-form="rowform">
                    <span ng-bind="usersCtrl.showAdvertiser(object) || 'empty'"></span>
                </div>
            </td>
            <td>
                <div e-style="width: 80%;" e-class="form-control col-md-5" e-name="role" editable-select="object.role" e-ng-options="s.Title as s.Title for (index,s) in usersCtrl.roles"  e-form="rowform">
                    <span ng-bind="usersCtrl.showRole(object) || 'empty'"></span>
                </div>
            </td>
            <td>
                <!--<div e-style="width: 80%;" e-class="form-control col-md-5" e-name="status" editable-select="object.status" e-ng-options="s.Id as s.Title for (index,s) in usersCtrl.statuses"  e-form="rowform">-->
                <span ng-bind="usersCtrl.showStatus(object) || 'empty'"></span>
                <!--</div>-->
            </td>
            <td>
                <!-- form -->
                <form editable-form name="rowform" onbeforesave="usersCtrl.updateData($data, object)" ng-show="rowform.$visible" class="form-buttons form-inline">
                    <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-xs btn-primary">
                        save
                    </button>
                    <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-xs btn-default">
                        cancel
                    </button>
                </form>
                <div class="buttons" ng-show="!rowform.$visible">
                    <a ng-href="/users/edit/[[object.id]]" data-action="/users/edit/[[object.id]]" class="btn btn-xs btn-primary show_modal" data-item="object" data-expect="usersCtrl.update"><i class="glyphicon glyphicon-edit"></i></a>
                    @if(Auth::user()->role == 'admin')
                        <a ng-href="/users/changepasswd/[[object.id]]" data-action="/users/changepasswd/[[object.id]]" data-item="object" data-expect="usersCtrl.update" class="btn btn-xs btn-primary show_modal"><i class="fa fa-key"></i></a>
                        <a class="btn btn-xs btn-primary" ng-click="usersCtrl.destroyData(object.id)"><i class="glyphicon glyphicon-trash"></i></a>
                    @endif
                </div>
            </td>
            <!--<td class="text-right">
                <a class="btn btn-xs btn-primary" ng-href="/keywords/[[object.id]]" data-item="object" ><i class="glyphicon glyphicon-eye-open"></i></a>
            </td>-->
        </tr>
        </tbody>
    </table>
@endsection

@section('pagesize')
    <input type="number" min="1" max="100" size='10' class="form-control pageSize" ng-model="usersCtrl.pageSize">
@endsection

@section('paginate') on-page-change="usersCtrl.pageChanged(newPageNumber)" pagination-id="keywords" @endsection

@section('html_footer')
    @parent
    {!! Html::script('/angular/controllers/usersCtrl.js') !!}

@endsection
