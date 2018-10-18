@extends('layout.error')
@section('container')
<div class="row">
	<div class="col-xs-12">
		<p>
			<strong>
				درحال حاضر امکان خدمت‌رسانی به شما وجود ندارد!
			</strong>
		</p>
		<p>به منظور تجربه خدمات با کیفیت‌ مطلوب‌تر، لطفا لحظاتی بعد دوباره اقدام نمایید.</p>
	</div>
</div>
<div class="ltr">
@if(\Config::get('app.debug'))
	<div class="row">
		<div class="col-xs-12">
			{{ $exception->getMessage() }}
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			File: <strong>{{ $exception->getFile() }} - line: {{ $exception->getLine() }}</strong>
		</div>
	</div>
	<!-- @foreach($exception->getTrace() as $item)
		<div class="row">
			<div class="col-xs-12">
				{{ @$item['file'] }}:{{ @$item['line'] }}
			</div>
		</div>
		@break
	@endforeach -->
@endif
</div>
@endsection