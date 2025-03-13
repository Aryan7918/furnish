@extends('layouts.master')
@section('intro-excerpt')
    <div class="col-lg-5">
        <div class="intro-excerpt">
            <h1>Register</h1>
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
                    <h2>Welcome to Furnish – Your Ultimate Furniture Destination!</h2>
                    <p>At <strong>Furnish</strong>, we bring elegance and comfort to your home with our premium furniture
                        collections. Whether you're looking for modern, classic, or customized furniture, we have everything
                        to transform your living space.</p>

                    <h4>Why Choose Furnish?</h4>
                    <ul>
                        <li><strong>Premium Quality:</strong> Crafted with high-quality materials for durability and
                            comfort.</li>
                        <li><strong>Stylish Designs:</strong> Explore a variety of styles, from contemporary to traditional.
                        </li>
                        <li><strong>Affordable Prices:</strong> Luxury furniture at unbeatable prices.</li>
                        <li><strong>Easy Shopping Experience:</strong> Seamless online browsing and secure checkout.</li>
                    </ul>

                    <p>Join <strong>Furnish</strong> today and enjoy exclusive member benefits, special discounts, and
                        personalized recommendations!</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Register</h2>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="first_name" name="first_name" id="first_name" class="form-control"
                                    placeholder="Enter your first name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="last_name" name="last_name" id="last_name" class="form-control"
                                    placeholder="Enter your last name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter your email address" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Enter confirm password">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <p>Already have account ? <a href="{{ route('login') }}">Login</a></p>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
