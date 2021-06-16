@extends('admin.auth.base')
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
                <div class="form-block mx-auto">
                    <div class="text-center mb-5">
                        <h3 class="text-uppercase">{{__('auth.forgot_password')}}</h3>
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

                    <form action="{{route('password.email')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group first">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" placeholder="your-email@gmail.com" id="email" name="email" value="{{old('email')}}">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-block py-2 btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
