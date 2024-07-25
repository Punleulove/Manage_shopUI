
@extends('Frontend.master')
@section('title')
   Product  |  search
 @endsection
@section('content')
  <main class="shop">

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="main-title">
                                Product Result
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                         @forelse ($product as $item)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    @if ($item->discount != 0)
                                        <div class="status">
                                            Promotion
                                        </div>
                                    @endif

                                    <a href="/product/{{ $item->id }}">
                                        <img src={{ url('Images/' . $item->thumbnail) }} alt="" width="261px"
                                            height="488px">
                                    </a>
                                </div>
                                <div class="detail">
                                    <div class="price-list">
                                        @if ($item->discount != 0)
                                            <div class="regular-price "><strike>{{ $item->regular_price }}$</strike></div>
                                            <div class="sale-price ">{{ $item->sale_price }}$</div>
                                        @else
                                            <div class="price ">{{ $item->regular_price }}$</div>
                                        @endif


                                    </div>
                                    <h5 class="title">{{ $item->name }}</h5>
                                </div>
                            </figure>
                        </div>
                    @empty
                        <h1 class="d-inline-flex">Products not found </h1>
                    @endforelse
                    </div>
                </div>

                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12">
                            <h3 class="main-title">
                                News Result
                            </h3>
                        </div>
                    </div>
                    <div class="row">

                        @forelse ($news as $item)
                            <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <a href="/news/{{$item->id}}">
                                       <img src={{ url('Images/' . $item->thumbnail) }} alt="" width="300px"
                                            height="300px">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h5 class="title">{{$item->title}}</h5>
                                </div>
                            </figure>
                        </div>
                        @empty
                            <h1>News not found</h1>
                        @endforelse

                    </div>
                </div>
            </section>

        </main>

@endsection
