@extends('admin.dashboard')
@section('breadcrumb')
	<ol class="breadcrumb">
		<li>داشبورد</li>
		<li class="active">رستوران من</li>
	</ol>
@stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<form enctype="multipart/form-data" method="POST">
		{{ csrf_field() }}
		<div class="panel panel-default">
		<div class="panel-heading">
			ثبت و ویرایش اطلاعات رستوران من 
			(
			جناب
			{{ Auth::user()->first_name }}
			{{ Auth::user()->last_name }}
			)
		</div>
		<div class="panel-body">
			<button type="submit" class="btn btn-success btn-block"> ذخیره اطلاعات رستوران من </button>
			<div class="seperate"></div>
			<div class="row">
				<div class="col-xs-12">
				@if ($errors->all())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            	@endif
				</div>
			</div>
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="list-unstyled">
                    <li>{{ Session::get('alert-' . $msg) }}</li>
                </ul>
            </div>
            @endif
            @endforeach
            <div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<td width="150">نام رستوران</td>
					<td><input type="text" name="name" class="form-control"
					value="{{ old('name' , $restaurant->name) }}" required></td>
				</tr>
				<tr>
					<td>شهر</td>
					<td>
					<select class="form-control" name="city_id" required>
						@foreach($cities as $city)
						<option value="{{$city->id}}"  
						{{ old('city_id' , $restaurant->city_id) == $city->id ? "selected" : ""}} > 
							{{ $city->name }}
						</option>
						@endforeach
					</select></td>
				</tr>
				<tr>
					<td>آدرس</td>
					<td><input type="text" name="address" class="form-control" 
					value="{{ old('address' , $restaurant->address) }}" required></td>
				</tr>
				<tr>
					<td>میزان تخفیف</td>
					<td><input type="text" name="off" class="form-control"
					value="{{ old('off' , $restaurant->off) }}" required>
					<div class="help-block">اگر می‌خواهید تخفیف نداشته باشید ۰ وارد نمایید.</div>
					</td>
				</tr>
				<tr>
					<td>ساعت کاری</td>
					<td><input type="text" name="time" class="form-control"
					value="{{ old('time' , $restaurant->time) }}" required>
					<div class="help-block">این فیلد بیانگر زمان‌هایی است که مشتری می تواند سفارش دهد.</div>
					</td>
				</tr>
				<tr>
					<td>نوع غذاها</td>
					<td><input type="text" name="type" class="form-control"
					value="{{ old('type' , $restaurant->type) }}"></td>
				</tr>
				<tr>
					<td>شماره همراه</td>
					<td><input type="text" name="phone" class="form-control ltr"
					value="{{ old('phone' , $restaurant->phone) }}" required>
					<div class="help-block">در تمام ارتباطات با رستوران شما از این شماره استفاده می‌شود.</div></td>
				</tr>
				<tr>
					<td>مبلغ پیک موتوری داخل شهر</td>
					<td><input type="text" name="peyk_in" class="form-control ltr"
					value="{{ old('peyk_in' , $restaurant->peyk_in) }}" required>
					<div class="help-block">با قرار دادن هزینه بالای پیک میزان سفارشات به رستوران شما کم خواهد شد.</div></td>
				</tr>
				<tr>
					<td>مبلغ پیک موتوری خارج شهر</td>
					<td><input type="text" name="peyk_out" class="form-control ltr"
					value="{{ old('peyk_out' , $restaurant->peyk_out) }}" required>
					<div class="help-block">تا فاصله ۱۰ کیلومتری از شهر.</div></td>
				</tr>
				<tr>
					<td>حداقل هزینه سفارش از رستوپران</td>
					<td><input type="text" name="minimum_price" class="form-control ltr"
					value="{{ old('minimum_price' , $restaurant->minimum_price) }}" required>
					<div class="help-block">قراردادن رقم حدود ۵-۷ معقول است.</div></td>
				</tr>
				<tr>
					<td>آپلود عکس</td>
					<td>
						<input type='file' accept='image/*' name="user_image" onchange='uploadImage(event)'>
						<div class="text-center">
						<img id='preview' class="img-responsive img-thumbnail">
						<p id='no-preview'>
							<span class="glyphicon glyphicon-camera"></span>
							<br/>
							پیش‌نمایش تصویر
						</p>
						</div>
					</td>
				</tr>
			</table>
			</div>
			<button type="submit" class="btn btn-success btn-block"> ذخیره اطلاعات رستوران من </button>
        </div>
		</div>

		</form>
	</div>
</div>
@endsection
@push('script')
<script>
 	$('#preview').hide();
  	var uploadImage = function(event) {
	    var input = event.target;
	    var reader = new FileReader();
	    reader.onload = function(){
		    $('#preview')[0].src = reader.result;
    	};
	    reader.readAsDataURL(input.files[0]);
	    $('#no-preview').hide();
	    $('#preview').show();
  	};
</script>
@endpush