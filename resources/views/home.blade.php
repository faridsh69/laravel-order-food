@extends('layout.master')
@section('container')
<div id="restaurant" style="padding-bottom: 20px">
<div class="row text-center">
	<div class="col-xs-12">
		<h3>
			سفارش آنلاین غذا از بهترین رستوران های شمال کشور با 20% تخفیف
			<p><small class="text-center">بهترین رستورانها با 20% تخفیف</small></p>
		</h3>
	</div>
	<div class="col-xs-4" style="color: blue">
		<h3>
			<p>
			مرحله اول
			</p>
			<small style="color: blue">
			انتخاب شهر و رستوران
			</small>
		</h3>
	</div>
	<div class="col-xs-4">
		<h3>
			<p>
			مرحله دوم
			</p>
			<small>
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
<div class="row">
	<div class="col-xs-4">
		<h4>
		شهر خور را از لیست روبرو انتخاب نمایید:
		</h4>
	</div>
	<div class="col-xs-8">
		<select class="form-control" v-model="city" onchange="scrollDown()">
			<option disabled value="">شهر خود را انتخاب نمایید</option>
			<option v-for="city in cities" v-bind:value="city">
				@{{ city.name }}
			</option>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<p class="help-block">
			نزدیکترین شهر به ویلای خود را از روی نقشه بیابید.
		</p>
			<hr>
		<div class="help-block">
			جستجو بر اساس نوع رستوران
		</div>
		<input type="checkbox" checked="true">
		فست فود
		<br>
		<input type="checkbox" checked="true">
		رستوران
		<br>
		<input type="checkbox" checked="true">
		آشپزخانه
		<br>
		<br>
		<div class="input-group">
	      	<input type="text" class="form-control" placeholder="نام رستوران">
	      	<span class="input-group-btn">
	        	<button class="btn btn-default" type="button">
	        	<span class="glyphicon glyphicon-search" style="font-size:90%"></span></button>
	      	</span>
	    </div>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<!-- <img src="/public/img/map3.png" alt="map" style="width: 100%;min-width: 600px"> -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d410218.8036115369!2d52.575289889976425!3d36.55810557866198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sir!4v1489919978958" width="100%" height="275px" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<span id="restaurant-list"></span>
<div class="row text-center" v-if="city">
	<div class="col-xs-12">
		<h3 class="page-header">
			رستوران های شهر @{{city.name}}
		</h3>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6" v-for="restourant in restourants" v-if="restourant.city_id == city.id">
		<a v-bind:href="'/restaurant/' + restourant.id + '/' + restourant.name">
		<div class="card item">
			<img src="/public/img/restoran-logo.png" class="img-thumbnail img-rounded">
			<h4>
				@{{ restourant.name }}
			</h4>
			<p>
			<span class="glyphicon glyphicon-home"></span>
				@{{ restourant.address }}
			</p>
			<div>
				همبرگر | پیتزا | کباب 
				@{{ restourant.type }}
			</div>
			<p>
				<span class="glyphicon glyphicon-heart"></span>
				@{{ restourant.rate }}	
			</p>
			<div class="row">
				<div class="col-xs-5">
					<label class="label label-info">
						@{{ restourant.off }}% off
					</label>
				</div>
				<div class="col-xs-7">
					<label class="label label-success">
						@{{ restourant.order ? "سفارش می پذیرد": "سفارش نمی پذیرد " }}
					</label>
				</div>
			</div>
			<div>
				<span class="glyphicon glyphicon-usd"></span>
				<!-- میانگین قیمت : 13 تومان -->
			</div>
		</div>
		</a>
		<div class="seperate"></div>
	</div>
</div>
</div>
@endsection
@push('script')
<script>
	scrollDown = function()
	{
		$('html,body').animate({
        	scrollTop: $("#restaurant-list").offset().top
        },'slow');
		// document.getElementById('restaurant-list').scrollIntoView();
	}
	new Vue({
	el: '#restaurant',
	data: {
		city: "",
		cities: [],
		restourants: []	
	},
	methods: {
		fetchData: function () {
			this.$http.get('/api/restourans-city/').then(function (response) {
				this.cities = response.data;
			});
			this.$http.get('/api/restourans-info/').then(function (response) {
				this.restourants = response.data;
			});
		}
	},
	mounted: function () {
		this.fetchData();
	},
});
</script>
@endpush