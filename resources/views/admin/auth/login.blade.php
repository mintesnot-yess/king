@extends('admin.layouts.login')
@section('title', 'Login')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Kings</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login.attempt') }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        {{--  <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value
                  id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">
                  Remember Me </label>
              </div>
            </div>  --}}
                        <!-- /.col -->
                        <div class=" ">
                            <div class="d-grid gap-2 ">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                <!-- /.social-auth-links -->
                {{--  <p class="mb-1"><a href="forgot-password.html">I forgot my
            password</a></p>
        <p class="mb-0">
          <a href="register.html" class="text-center"> Register a new
            membership </a>
        </p>  --}}
            </div>
        </div>
    </div>

@endsection
