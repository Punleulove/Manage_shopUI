@extends('Frontend.master')
@section('content')
    <main class="home">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            NEW PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @forelse ($Newproducts as $item)
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
                        <h1>Empty data</h1>
                    @endforelse



                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            PROMOTION PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @forelse ($Promosion as $item)
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
                        <h1>Empty data</h1>
                    @endforelse



                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            POPULAR PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                     @forelse ($Popular as $item)
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
                        <h1>Empty data</h1>
                    @endforelse
                </div>
            </div>
        </section>

    </main>
@endsection
