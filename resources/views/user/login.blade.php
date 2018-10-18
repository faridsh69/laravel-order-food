@extends('layout.master')
@section('container')
<div class="row">
    <div class="col-xs-12">
        <h3 class="text-center">
            ورود کاربران
        </h3>
    </div>
</div>
<div class="seperate"></div>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action='/user/login'>
                    {{ csrf_field() }}
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
                    <div class="form-group">
                        <label for="phone">شماره همراه:</label>
                        <input type="text" class="form-control ltr" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">رمز عبور:</label>
                        <input type="password" class="form-control ltr" id="pwd" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ورود</button>
                </form>
                <hr>
                <div class="half-seperate">  </div>
                <a href='/user/register' class="text-center">ثبت نام</a>
                <div class="half-seperate">  </div>
                <a href='' class="text-center">رمز عبور خود را فراموش کرده اید؟</a>
            </div>
        </div>
    </div>
</div>
<div class="double-seperate"></div>
<div class="double-seperate"></div>
<div class="double-seperate"></div>
<div class="double-seperate"></div>
@endsection