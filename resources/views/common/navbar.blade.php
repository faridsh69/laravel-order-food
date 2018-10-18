<div class="background-header">
    <div class="container">
        <div class="half-seperate"></div>
        <div class="row">
            <div class="col-xs-2 col-sm-1">
                <img src="/public/img/logo.png" alt="logo" class="logo-icon">
            </div>
            <div class="col-xs-4">
                <!-- <div class="half-seperate"></div>
                <span class="glyphicon glyphicon-globe"></span>
                <a class="{{ Lang::locale() == 'en' ? 'selected':'' }}" href="/language/en">English</a>
                <span> / </span> 
                <a class="{{ Lang::locale() == 'fa' ? 'selected':'' }}" href="/language/fa">فارسی</a> -->
            </div>
            <div class="col-xs-6 col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-4 col-lg-2 col-lg-offset-5">
            @if(empty(Auth::id()))
                <a href="/user/register" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> ثبت نام</a>
                <a href="/user/login" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> ورود</a> 
            @else
                <a href="/admin/user/profile" class="btn">
                <span class="glyphicon glyphicon-th-list"></span>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </a>
            @endif
            </div>
        </div>
        <div class="half-seperate"></div>
    </div>
</div>
<nav class="navbar background-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-menu-hamburger"></span>                           
            </button>
            <a class="navbar-brand" href="/"> <span class="glyphicon glyphicon-home"></span> شیک فوود</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/register-restaurant" class="{{Request::segment(1) == 'register'? 'selected':''}}">ثبت رستوران </a></li>
                <!-- <li><a href="/shop/1" class="{{ Request::segment(1) == 'shop' ? 'selected':'' }}">فروشگاه سه بعدی</a></li>
                <li><a href="/location" class="{{ Request::segment(1) == 'location' ? 'selected':'' }}">موقعیت شما</a></li>
                <li><a href="/chat" class="{{ Request::segment(1) == 'chat' ? 'selected':'' }}">چت</a></li> -->
                <!-- <li><a href="/">حکم</a></li> -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">منو <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li> -->
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#order-modal">مراحل سفارش / راهنما</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#about-us-modal">درباره ما</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#contact-us-modal">تماس با ما</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="about-us-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">درباره ما</h4>
            </div>
            <div class="modal-body">
                <p>
                    درباره ما
                </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contact-us-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">تماس با ما</h4>
            </div>
            <div class="modal-body">
                <h5>
                    تلفن:
                </h5>
                <p>
                    09106801685
                    
                </p>
                <!-- <h5>
                    فکس:
                </h5>
                <p>

                    -
                    ۰۲۱
                </p> -->
                <h5>
                    پست الکترونیک:
                </h5>
                <p>
                farid.sh69@gmail.com
                </p>
                <h5>
                    آدرس:
                </h5>
                <p>
                    تهران،
                </p>
            </div>
        </div>
    </div>
</div>