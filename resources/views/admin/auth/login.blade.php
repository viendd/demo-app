@extends('admin.auth.base')
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="form-block mx-auto">
                    <div class="text-center mb-5">
                        <h3 class="text-uppercase">Login</h3>
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> {{ __('auth.problem_msg') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('login')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group first">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" placeholder="your-email@gmail.com" id="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                        </div>

                        <div class="d-sm-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked"/>
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="{{route('password.request')}}" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
