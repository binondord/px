@extends('layouts.list')

@section('title')
    Messages
@endsection

@section('ang-controller') ng-controller="messagesCtrl"  ng-init="[messagesCtrl.data_url ='{{ $page_info['data_url'] or '/api/all-messages' }}' ,messagesCtrl.data_title='{{ $page_info['title'] or 'Users'}}']"@stop

@section('create-link')
    (<span ng-hide="messagesCtrl.isLoaded"><i class="fa fa-refresh fa-spin"></i></span><span ng-bind="messagesCtrl.totalItems"></span>)
@endsection

@section('search')
    <input type="text" class="form-control" placeholder="Search" ng-model='messagesCtrl.searchQry.$' />
@endsection

@section('buttons')

@endsection

@section('advancesearch')
    @parent
    <a href="javascript:void(0);" ng-click="messagesCtrl.changeFilterTo()"><span ng-bind="messagesCtrl.searchAdvText"></span></a>
@stop

@section('data')
    <table class='table table-striped col-md-12' >
        <thead>
        <tr>
            <th>#</th>
            <th class="[[column.class]]" ng-repeat="column in messagesCtrl.columns">
                <a href='javascript:void(0);' ng-click="messagesCtrl.order(column.field)">
                    <span ng-bind="column.title"></span>
                </a>&nbsp;
					<span ng-show="messagesCtrl.field == column.field" class="sortorder" ng-class="{reverse:messagesCtrl.isReverse}">
						<i class="fa" ng-class="{'fa-sort-asc':messagesCtrl.isReverse, 'fa-sort-desc':!messagesCtrl.isReverse}"></i>
					</span>
            </th>
            <th colspan="3"></th>
        </tr>
        </thead>
        {{--<tr id='advanced_search' class="info hidden" ng-if="messagesCtrl.isAdvanceSearch">
            <td>&nbsp;</td>
            <td><input type='text' ng-model='messagesCtrl.searchQry.name' placeholder="Search Name"/></td>
            <td><input type='text' ng-model='messagesCtrl.searchQry.email' placeholder="Search Email"/></td>
            <td><input type='text' ng-model='messagesCtrl.searchQry.advertiserid' placeholder="Search Advertiser"/></td>
            <td><input type='text' ng-model='messagesCtrl.searchQry.role' placeholder="Search Role"/></td>
            <td><input type='text' ng-model='messagesCtrl.searchQry.status' placeholder="Search Status"/></td>
            <td colspan="3"></td>
        </tr>--}}
        <tbody>
        <tr ng-hide="messagesCtrl.isLoaded"><td colspan="7"><i class="fa fa-refresh fa-spin"></i></td></tr>
        <tr dir-paginate="object in messagesCtrl.objects  |filter:messagesCtrl.searchQry | itemsPerPage: messagesCtrl.pageSize" pagination-id="keywords" total-items="messagesCtrl.totalItems" current-page="messagesCtrl.currentPage">
            <td><span ng-bind="messagesCtrl.idx($index)"></span></td>
            <td>
                <span ng-bind="object.email || 'empty'"></span>
            </td>
            <td>
                <span ng-bind="object.phone || 'empty'"></span>
            </td>
            <td>
                <span ng-bind="object.subject || 'empty'"></span>
            </td>
            <td>
                <span ng-bind="object.concern || 'empty'"></span>
            </td>
            <td>
                <!--<div e-style="width: 80%;" e-class="form-control col-md-5" e-name="status" editable-select="object.status" e-ng-options="s.Id as s.Title for (index,s) in messagesCtrl.statuses"  e-form="rowform">-->
                <span ng-bind="messagesCtrl.showStatus(object) || 'empty'"></span>
                <!--</div>-->
            </td>
            <td>
                <!-- form -->
                <form editable-form name="rowform" onbeforesave="messagesCtrl.updateData($data, object)" ng-show="rowform.$visible" class="form-buttons form-inline">
                    <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-xs btn-primary">
                        save
                    </button>
                    <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-xs btn-default">
                        cancel
                    </button>
                </form>
                <div class="buttons" ng-show="!rowform.$visible">
                    <a ng-href="/messages/edit/[[object.id]]" data-action="/messages/edit/[[object.id]]" class="btn btn-xs btn-primary show_modal" data-item="object" data-expect="messagesCtrl.update"><i class="glyphicon glyphicon-edit"></i></a>
                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-xs btn-primary" ng-click="messagesCtrl.destroyData(object.id)"><i class="glyphicon glyphicon-trash"></i></a>
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
    <input type="number" min="1" max="100" size='10' class="form-control pageSize" ng-model="messagesCtrl.pageSize">
@endsection

@section('paginate') on-page-change="messagesCtrl.pageChanged(newPageNumber)" pagination-id="keywords" @endsection

@section('html_footer')
    @parent
    {!! Html::script('/angular/controllers/messagesCtrl.js') !!}

@endsection
