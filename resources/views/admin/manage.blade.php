@extends('admin.dashboard')
@section('breadcrumb')
	<ol class="breadcrumb">
		<li>داشبورد</li>
		<li class="active">مدیریت کاربران</li>
	</ol>
@stop
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">مدیریت کاربران</div>
				<div class="panel-body">
					در این صفحه می‌توان فهرست کاربران را دید و به مدیریت آن‌ها پرداخت.
					<div class="half-seperate"></div>
					<form class="form-inline" method="GET">
					  	<div class="form-group">
					    	<label for="name">نام و نام خانوادگی:</label>
					   	 	<input type="text" class="form-control input-sm" id="name" name="name">
					  	</div>
					  	<div class="form-group">
					    	<label for="email">ایمیل: </label>
					    	<input type="email" class="form-control input-sm" id="email" name="email">
					  	</div>
					  	<button type="submit" class="btn btn-default input-sm">جستجو</button>
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr>
							<th class="text-right" width="40">شناسه</th>
							<th class="text-right">نام کاربری</th>
							<th class="text-right">نام و نام‌خانوادگی</th>
							<th class="text-right">ایمیل</th>
							<th class="text-right">تایید ایمیل</th>
							<th class="text-right">تلفن</th>
							<th class="text-right">تایید شماره تلفن</th>
							<th class="text-right">نقش‌ها</th>
							<th class="text-right" width="40">ویرایش</th>
							<th class="text-right" width="40">غیرفعال</th>
						</tr>
						@foreach($users as $user)
							<tr>
								<td class="text-center" width="40">{{ $user->id }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->first_name }}  {{ $user->last_name }}</td>
								<td class="text-left">{{ $user->email }}</td>
								<td class="text-center"><span class="glyphicon glyphicon-exclamation-sign"></span></td>
								<td>
									<div class="ltr">{{ \Nopaad\Persian::correct($user->phone) }}</div>
								</td>
								<td class="text-center"><span class="glyphicon glyphicon-exclamation-sign"></span></td>
								<td>
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#user-roles-modal" data-userid="{{ $user->id }}" data-username="{{ $user->first_name . ' ' . $user->last_name }}">
										+
									</button>
									@foreach($user->roles()->pluck('name') as $role)
										<span class="label label-default">{{ trans('roles.' . $role) }}</span>
									@endforeach
								</td>
								<td class="text-center">
									<a href="/admin/user/edit/{{ $user->id }}"><span class="glyphicon glyphicon-edit"></span></a>
								</td>
								<td class="text-center">
									<a href="/admin/user/edit/{{ $user->id }}"><span class="glyphicon glyphicon-lock"></span></a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="text-center">
				{{ $users->links() }}
			</div>
		</div>
	</div>
	<!-- user roles modal -->
	<div class="modal fade" id="user-roles-modal" tabindex="-1" role="dialog" aria-labelledby="user-roles-modal-label">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="user-roles-modal-label">
						افزودن نقش به
					</h4>
				</div>
				<form action="/admin/user/role" method="POST">
					<div class="modal-body">
						<div class="one-third-separator"><!-- sep --></div>
						<div class="row">
							<div class="col-xs-12">
								{{ csrf_field() }}
								<input id="user-roles-modal-user-id" type="hidden" class="form-control readonly" readonly="readonly" value="userid" name="user_id"/>
								<select class="form-control" name="role_id">
									@foreach(\App\Models\Role::get() as $role)
										<option value="{{ $role->id }}">{{ trans('roles.' . $role->name) }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
						<button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal -->
@endsection
@push('script')
<script>
	jQuery('#user-roles-modal').on('show.bs.modal', function (e) {
		jQuery('#user-roles-modal-user-id').val(jQuery(e.relatedTarget).data('userid'));
	})
</script>
@endpush


