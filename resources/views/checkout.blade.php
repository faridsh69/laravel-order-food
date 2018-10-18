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
	<div class="col-xs-4" style="color: green">
		<h3>
			<p>
			مرحله دوم
			</p>
			<small style="color: green">
			۳ غذا - ۴۳۰۰۰
			</small>
		</h3>
	</div>
	<div class="col-xs-4" style="color: blue">
		<h3>
			<p>
			مرحله سوم
			</p>
			<small style="color: blue">
			آدرس دهی
			</small>
		</h3>
	</div>
</div>
<div class="seperate"></div>
<div class="seperate"></div>
<div class="row">
	<div class="col-xs-12">
		آدرس 
		<input type="text" class="form-control" name="address">
		<form Method='post' Action='https://pep.shaparak.ir/gateway.aspx'>
			invoiceNumber<input type='text' name='invoiceNumber' value="{{ $bank['invoiceNumber'] }}" /><br />
			invoiceDate<input type='text' name='invoiceDate' value='{{ $bank["invoiceDate"] }}' /><br />
			amount<input type='text' name='amount' value='{{ $bank["amount"] }}' /><br />
			terminalCode<input type='text' name='terminalCode' value='{{ $bank["terminalCode"] }}' /><br />
			merchantCode<input type='text' name='merchantCode' value='{{ $bank["merchantCode"] }}' /><br />
			redirectAddress<input type='text' name='redirectAddress' value='{{ $bank["redirectAddress"] }}' /><br />
			timeStamp<input type='text' name='timeStamp' value='{{ $bank["timeStamp"] }}' /><br />
			action<input type='text' name='action' value='{{ $bank["action"] }}' /><br />
			sign<input type='text' name='sign' value='{{ $bank["result"] }}' /><br />
			<input type='submit' name='submit' value='پرداخت' class="btn btn-block btn-success" />
		</form>
	</div>
</div>	
@endsection