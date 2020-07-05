@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-6 col-sm-12">
            <div class="product-grid5">
                <div class="product-image5">
                    <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo11/images/img-1.jpg">
                    <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo11/images/img-2.jpg">
                    <ul class="social">
                        <li><a href="" data-tip="View"><i class="mdi mdi-eye"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="mdi mdi-cards-heart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="product-grid5">
                <div class="product-content">
                    <h1 class="title">{{ $product->title }}</h1>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->user->name }}</p>
                    <p>{{ $product->user->email }}</p>
                </div>
            </div>
        </div>
    </div>
    <div id="inquire" class="row mb-5">
        <div class="col-md-12">
            <div class="shadow-sm px-3 py-4 bg-white rounded">
                <h3 class="text-uppercase border-bottom pb-2 mb-3">Inquiry</h3>
                @guest
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
                @else
                <form>
                    <input type="hidden" class="form-control" name="productID" value="{{ $product->id }}"
                        id="productID">
                    <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="auto" rows="3" class="w-100"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary text-uppercase">Submit</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection