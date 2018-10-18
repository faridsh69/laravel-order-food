@extends('layout.master')
@section('container')
<div class="row text-center">
	<div class="col-xs-4" style="color: green">
		<h3>
			<p>
			مرحله اول
			</p>
			<small style="color: green">
			شهر آمل - رستوران سیب
			</small>
		</h3>
	</div>
	<div class="col-xs-4" style="color: blue">
		<h3>
			<p>
			مرحله دوم
			</p>
			<small style="color: blue">
			انتخاب غذا
			</small>
		</h3>
	</div>
	<div class="col-xs-4">
		<h3>
			<p>
			مرحله سوم
			</p>
			<small>
			آدرس دهی
			</small>
		</h3>
	</div>
</div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="row	">
	<!-- <div class="col-md-2"> -->
		<!-- <ul>
			<li>
				کباب ها
				<ul>
					<li>
						کباب برگ
					</li>
					<li>
						کباب کوبیده
					</li>
					<li>
						کباب چنجه
					</li>
				</ul>
			</li>
			<li>
				مرغ ها 
				<ul>
					<li>
						جوجه با استخوان
					</li>
					<li>
						جوجه بی استخوان
					</li>
				</ul>
			</li>
		</ul>
		نام غذا 
		<input type="" name="">
		<br>
			بین المللی بشه همه چیز + محلی
		<br>
		
		<br>
		سالاد
		<br>
		نوشدنی
		<br>
		سوخاری
		<br> -->
	<!-- </div> -->
	<div class="col-md-10">
		<table class="table">
		<thead>
		<tr>
			<th>
				افزودن به سبد خرید
			</th>
			<th>
				نام غذا	
			</th>
			<th>
				محتویات	
			</th>
			<th>
				تصویر	
			</th>
			<th>
				قیمت
			</th>
			<th>
				قیمت پس از تخفیف
			</th>
		</tr>
		</thead>
		<tbody>
		@for($i = 0; $i < 16; $i++)
		<tr>
			<td>
				<button class="btn btn-success"> + </button>
			</td>
			<td>
				چلوکباب کوبیده
			</td>
			<td>۱۰۰ گرم گوشت چرخ کرده - پیاز</td>
			<td>
				<img src="/public/img/kabab.jpg" class="img-responsive" width="100px">
			</td>
			<td>۱۰ هزار تومان</td>
			<td>۹ هزارتومان</td>
		</tr>
		@endfor
		</tbody>
		</table>
	</div>
</div>
<div class="shopping-card">
	<div class="row">
	<div class="col-xs-12">
	<table class="table">
	<thead>
	<tr>
		<th>
			تعداد	
		</th>
		<th>
			نام غذا
		</th>
		<th>
			قیمت
		</th>
		<th>
			حذف
		</th>
	</tr>
	</thead>
	<tbody>
	@for($i = 0; $i < 2; $i++)
	<tr>
		<td>
			۲
		</td>
		<td>
			چلوکباب کوبیده
		</td>
		<td>۱۰ هزار تومان</td>
		<td>
			<button class="btn btn-warning"> - </button>
		</td>
	</tr>
	@endfor
	</tbody>
	</table>
	<!-- <ul class="list-unstyled">
		<li>
			جمع کل هزینه ها : ۲۰۰۰۰ تومان
		</li>
		<li>
			جمع هزینه ها پس از تخفیف : ۱۸۰۰۰ تومان
		</li>
		<li>
			هزینه ارسال: ۳۰۰۰ تومان
		</li>
		<li>
			هزینه قابل پرداخت : ۲۱۰۰۰ تومان
		</li>
	</ul> -->
	<dl class="dl-horizontal">
	  	<dt>جمع کل هزینه ها</dt>
	  	<dd>۲۰۰۰۰ تومان</dd>
	  	<dt>جمع هزینه ها پس از تخفیف</dt>
	  	<dd>۱۸۰۰۰ تومان</dd>
	  	<dt>هزینه ارسال</dt>
	  	<dd>۳۰۰۰ تومان</dd>
	  	<dt>هزینه قابل پرداخت</dt>
	  	<dd>۲۱۰۰۰ تومان</dd>
	</dl>
	</div>
	</div>	
	<div class="row">
	<div class="col-xs-12">
	<a href="/checkout" class="btn btn-primary pull-left">رفتن به مرحله بعد
	</a>
	</div>
	</div>
</div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="seperate"></div>

@endsection