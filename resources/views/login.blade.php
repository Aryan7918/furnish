@extends('layouts.master')
@section('intro-excerpt')
    <div class="col-lg-5">
        <div class="intro-excerpt">
            <h1>Login</h1>
        </div>
    </div>
    <div class="col-lg-7">

    </div>
@endsection
@section('content')
    <div class="container" style="margin: 50px auto 100px;">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <div>
                    <h2>Welcome Back to Furnish!</h2>
                    <p>At <strong>Furnish</strong>, we believe that a beautiful home starts with the right furniture. As a
                        valued member, you get access to <strong>exclusive deals, personalized recommendations, and a
                            seamless shopping experience</strong>.</p>

                    <h4>Why Log In?</h4>
                    <ul>
                        <li><strong>Exclusive Discounts:</strong> Get special offers and member-only deals.</li>
                        <li><strong>Track Your Orders:</strong> Easily check your order history and shipping details.</li>
                        <li><strong>Personalized Experience:</strong> Save your favorite items and get tailored
                            recommendations.</li>
                        <li><strong>Faster Checkout:</strong> Securely save your details for a quicker shopping experience.
                        </li>
                    </ul>

                    <p>🔒 <strong>Your account, your security – Log in now and continue creating the home of your
                            dreams!</strong></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Login</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your email address">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember me"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember me">Remember me</label>
                                </div>
                            </div>
                            <p>Create account if you don't have yet. <a href="{{ route('register') }}">Register</a></p>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
