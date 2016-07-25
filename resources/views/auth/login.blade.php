{{--<form method="POST" action="/auth/login"  class="form-inline">--}}
    {{--{!! csrf_field() !!}--}}
    {{--<div class="form-group">--}}
        {{--<label class="sr-only" for="exampleInputEmail3">Email address</label>--}}
        {{--<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" value="{{ old('email') }}">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<label class="sr-only" for="exampleInputPassword3">Password</label>--}}
        {{--<input type="password" class="form-control" name="password" id="password" placeholder="Password">--}}
    {{--</div>--}}
    {{--<div class="checkbox">--}}
        {{--<label>--}}
            {{--<input type="checkbox"> Remember me--}}
        {{--</label>--}}
    {{--</div>--}}
    {{--<button type="submit" class="btn btn-default">Sign in</button>--}}
{{--</form>--}}

<ul class="nav navbar-nav navbar-right">
    <li><p class="navbar-text">Already have an account?</p></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
            <li>
                <div class="row">
                    <div class="col-md-12">
                        Login via
                        <div class="social-buttons">
                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                        </div>
                        or
                        <form class="form" role="form"  method="POST" action="/auth/login" accept-charset="UTF-8" id="login-nav">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required name="password">
                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> keep me logged-in
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="bottom text-center">
                        New here ? <a href="#"><b>Join Us</b></a>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</ul>