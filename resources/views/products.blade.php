@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="{{ url('/product/'.$product->slug) }}">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo11/images/img-1.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo11/images/img-2.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="View"><i class="mdi mdi-eye"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="mdi mdi-cards-heart"></i></a></li>
                    </ul>
                    <a href="{{ url('/product/'.$product->slug.'/#inquire' ) }}" class="select-options">Inquire Now <i class="mdi mdi-send"></i></a>
                </div>
                <div class="product-content">
                <h3 class="title"><a href="{{ url('/product/'.$product->slug ) }}">{{ $product->title }}</a></h3>
                    {{-- <div class="price">$11.00 - $15.00</div> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection