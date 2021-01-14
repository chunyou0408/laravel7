@extends('layouts.template')
@section('css')
    <style>
        main{
            height: auto;
        }
        .container{
            padding: 100px 0;
        }
        .img{
            background-size: cover;
            background-position: center;
            height: 250px;
        }

    </style>
    
@endsection
@section('main')
    <div class="container">
        <div class="type_area"></div>
        <div class="product_area row ">
            @foreach ($products as $product)
                <div class="card col-3 my-2">
                    {{-- <img src="{{$product->img}}" class="card-img-top" alt="..."> --}}
                    <div class="card-img-top img" style="background-image: url({{$product->img}});"></div>
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="/product/{{$product->id}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach





{{-- 

            <div class="card col-3 my-2">
                <img src="/images/no-image-found-360x250.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

            <div class="card col-3 my-2">
                <img src="/images/no-image-found-360x250.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

            <div class="card col-3 my-2">
                <img src="/images/no-image-found-360x250.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            
            <div class="card col-3 my-2">
                <img src="/images/no-image-found-360x250.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-3 my-2">
                <img src="/images/no-image-found-360x250.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('js')
    
@endsection