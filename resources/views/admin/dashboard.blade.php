@extends('layout.master')
@section('fluid-container')
<div class="row">
	<div class="col-sm-3">
		<div class="list-group">
			<a href="/admin/user/profile" class="list-group-item {{ Request::segment(3) == 'profile' ? 'active':'' }}">
			پروفایل کاربری</a>
			@can('restaurant_manager')
			<a href="/admin/restaurant/manage" class="list-group-item {{ Request::segment(2) == 'restaurant' ? 'active':'' }}">
			رستوران من</a>
			@endcan
			<a href="/admin/user/manage" class="list-group-item {{ Request::segment(2) == 'user' && Request::segment(3) == 'manage' ? 'active':'' }}">
			مدیریت کاربران</a>
			<a href="/admin/log" class="list-group-item {{ Request::segment(2) == 'log' ? 'active':'' }}">
			مشاهده لاگ</a>
			<a href="/admin/user/logout" class="list-group-item {{ Request::segment(2) == 'logout' ? 'active':'' }}">
			خروج</a>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="row">
			<div class="col-xs-12">
				@yield('breadcrumb')
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				@yield('content')
			</div>
		</div>
	</div>
</div>
@endsection