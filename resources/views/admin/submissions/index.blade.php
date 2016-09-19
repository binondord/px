@extends('layouts.list')

@section('title')
    Submissions
@endsection

@section('ang-controller') ng-controller="submissionsCtrl"  ng-init="[submissionsCtrl.data_url ='{{ $page_info['data_url'] or '/api/all-submissions' }}' ,submissionsCtrl.data_title='{{ $page_info['title'] or 'Users'}}']"@stop

@section('create-link')
    (<span ng-hide="submissionsCtrl.isLoaded"><i class="fa fa-refresh fa-spin"></i></span><span ng-bind="submissionsCtrl.totalItems"></span>)
@endsection

@section('search')
    <input type="text" class="form-control" placeholder="Search" ng-model='submissionsCtrl.searchQry.$' />
@endsection

@section('buttons')

@endsection

@section('advancesearch')
    @parent
    <a href="javascript:void(0);" ng-click="submissionsCtrl.changeFilterTo()"><span ng-bind="submissionsCtrl.searchAdvText"></span></a>
@stop

@section('data')
    <table class='table table-striped col-md-12' >
        <thead>
        <tr>
            <th>#</th>
            <th class="[[column.class]]" ng-repeat="column in submissionsCtrl.columns">
                <a href='javascript:void(0);' ng-click="submissionsCtrl.order(column.field)">
                    <span ng-bind="column.title"></span>
                </a>&nbsp;
					<span ng-show="submissionsCtrl.field == column.field" class="sortorder" ng-class="{reverse:submissionsCtrl.isReverse}">
						<i class="fa" ng-class="{'fa-sort-asc':submissionsCtrl.isReverse, 'fa-sort-desc':!submissionsCtrl.isReverse}"></i>
					</span>
            </th>
            <th colspan="3"></th>
        </tr>
        </thead>
        {{--<tr id='advanced_search' class="info hidden" ng-if="submissionsCtrl.isAdvanceSearch">
            <td>&nbsp;</td>
            <td><input type='text' ng-model='submissionsCtrl.searchQry.name' placeholder="Search Name"/></td>
            <td><input type='text' ng-model='submissionsCtrl.searchQry.email' placeholder="Search Email"/></td>
            <td><input type='text' ng-model='submissionsCtrl.searchQry.advertiserid' placeholder="Search Advertiser"/></td>
            <td><input type='text' ng-model='submissionsCtrl.searchQry.role' placeholder="Search Role"/></td>
            <td><input type='text' ng-model='submissionsCtrl.searchQry.status' placeholder="Search Status"/></td>
            <td colspan="3"></td>
        </tr>--}}
        <tbody>
        <tr ng-hide="submissionsCtrl.isLoaded"><td colspan="7"><i class="fa fa-refresh fa-spin"></i></td></tr>
        <tr dir-paginate="object in submissionsCtrl.objects  |filter:submissionsCtrl.searchQry | itemsPerPage: submissionsCtrl.pageSize" pagination-id="keywords" total-items="submissionsCtrl.totalItems" current-page="submissionsCtrl.currentPage">
            <td><span ng-bind="submissionsCtrl.idx($index)"></span></td>
            {{--<td>
                <div editable-text="object.name" e-name="name" e-form="rowform">
                    <span ng-bind="object.name || 'empty'"></span>
                </div>
            </td>--}}
            <td>
                <!--<div editable-text="object.email" e-name="name" e-form="rowform">-->
                <span ng-bind="object.email || 'empty'"></span>
                <!--</div>-->
            </td>
            <td>
                <div e-style="width: 80%;" e-class="form-control col-md-5" e-name="advertiserid" editable-select="object.advertiserid" e-ng-options="s.Id as s.Title for (index,s) in submissionsCtrl.advertisers"  e-form="rowform">
                    <span ng-bind="submissionsCtrl.showAdvertiser(object) || 'empty'"></span>
                </div>
            </td>
            <td>
                <div e-style="width: 80%;" e-class="form-control col-md-5" e-name="role" editable-select="object.role" e-ng-options="s.Title as s.Title for (index,s) in submissionsCtrl.roles"  e-form="rowform">
                    <span ng-bind="submissionsCtrl.showRole(object) || 'empty'"></span>
                </div>
            </td>
            <td>
                <!--<div e-style="width: 80%;" e-class="form-control col-md-5" e-name="status" editable-select="object.status" e-ng-options="s.Id as s.Title for (index,s) in submissionsCtrl.statuses"  e-form="rowform">-->
                <span ng-bind="submissionsCtrl.showStatus(object) || 'empty'"></span>
                <!--</div>-->
            </td>
            <td>
                <!-- form -->
                <form editable-form name="rowform" onbeforesave="submissionsCtrl.updateData($data, object)" ng-show="rowform.$visible" class="form-buttons form-inline">
                    <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-xs btn-primary">
                        save
                    </button>
                    <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-xs btn-default">
                        cancel
                    </button>
                </form>
                <div class="buttons" ng-show="!rowform.$visible">
                    <a ng-href="/submissions/edit/[[object.id]]" data-action="/submissions/edit/[[object.id]]" class="btn btn-xs btn-primary show_modal" data-item="object" data-expect="submissionsCtrl.update"><i class="glyphicon glyphicon-edit"></i></a>
                    @if(Auth::user()->role == 'admin')
                        <a ng-href="/submissions/changepasswd/[[object.id]]" data-action="/submissions/changepasswd/[[object.id]]" data-item="object" data-expect="submissionsCtrl.update" class="btn btn-xs btn-primary show_modal"><i class="fa fa-key"></i></a>
                        <a class="btn btn-xs btn-primary" ng-click="submissionsCtrl.destroyData(object.id)"><i class="glyphicon glyphicon-trash"></i></a>
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
    <input type="number" min="1" max="100" size='10' class="form-control pageSize" ng-model="submissionsCtrl.pageSize">
@endsection

@section('paginate') on-page-change="submissionsCtrl.pageChanged(newPageNumber)" pagination-id="keywords" @endsection

@section('html_footer')
    @parent
    {!! Html::script('/angular/controllers/submissionsCtrl.js') !!}

@endsection
