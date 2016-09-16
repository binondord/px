<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    {{--<div class="user-panel">
      <div class="pull-left image">
        <img src="/img/user.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->first}} {{Auth::user()->last}}</p>
        <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
      </div>
    </div>--}}
    <!-- search form -->
    {{--<form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>--}}
    <!-- /.search form -->
    <ul class="sidebar-menu" ng-controller="HeaderCtrl">
        <li class="header">Navigation</li>
<!--        <li class="@if($controller == 'DashboardController')active @endif">
            <a href="/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>-->
        <li class="@if($controller == 'SubmissionController')active @endif treeview">
            <a href="/submissions">
                <i class="fa fa-star"></i> <span>Submissions</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
        </li>
        <li class="@if($controller == 'MessageController')active @endif treeview">
            <a href="/messages">
                <i class="fa fa-file-text-o"></i> <span>Messages</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
        </li>
    </ul>
</section>