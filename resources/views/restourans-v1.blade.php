@extends('layout.master')
@section('container')
<div class="row">
	<div class="col-xs-12">
		<h3 class="text-center">
			لیست رستوران ها
		</h3>
	</div>
</div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="row">
	<div class="col-md-2">
		نام رستوران 
		<input type="" name="">
		<br>
		fast food
		<input type="checkbox" name="fastfood" value="fastfood">
		<br>
		resturant
		<input type="checkbox" name="resturant" value="resturant">
	</div>
	<div class="col-md-10">
		<div class="row text-center">
			@for($i = 1 ; $i < 6 ; $i ++)
			<div class="col-md-4 col-sm-6">
				<a href="/menu">
				<div class="card">
					<img src="/public/img/restoran-logo.png" class="img-thumbnail img-circle">
					<h4>
						رستوران سب
					</h4>
					<div>
						همبرگر | پیتزا | کباب 
					</div>
					<p>
					<span class="glyphicon glyphicon-home"></span>
						آمل - خیابان 1 - کوچه 2 میدان 3
					</p>
					<p>
					<span class="glyphicon glyphicon-heart"></span>
					4.6</p>
					
					<div class="row">
						<div class="col-xs-5">
							<label class="label label-info">
								40% off
							</label>
						</div>
						<div class="col-xs-7">
							<label class="label label-success">
								سفارش می پذیرد
							</label>
						</div>
					</div>
					<div>
						<span class="glyphicon glyphicon-usd"></span>
						میانگین قیمت : 13 تومان
					</div>
				</div>
				</a>
				<div class="seperate"></div>
			</div>
			@endfor
		</div>
	</div>
</div>

@endsection