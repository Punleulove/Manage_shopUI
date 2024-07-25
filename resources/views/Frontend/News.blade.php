@extends('Frontend.master')
@section('content')
    <main class="home">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            ព័ត៌មានថ្មីៗ
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @forelse ($Newnews as $item)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <a href="/news/{{$item->id}}">
                                        <img src={{ url('Images/' . $item->thumbnail) }} alt="" width="300px"
                                            height="300px">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h5 class="title">{{ $item->title }}</h5>
                                </div>
                            </figure>
                        </div>
                    @empty
                        <h1>News is Empty</h1>
                    @endforelse

                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            ​​​​​​​កម្សាន្ត
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @forelse  ($Entertainment as $Et)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <a href="/news/{{$Et->id}}">
                                        <img src={{ url('Images/' . $Et->thumbnail) }} alt="" width="300px"
                                            height="300px">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h5 class="title">{{ $Et->title }}</h5>
                                </div>
                            </figure>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            កីឡា
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @forelse  ($sport as $sport)
                        <div class="col-3">
                            <figure>
                                <div class="thumbnail">
                                    <a href="/news/{{$sport->id}}">
                                        <img src={{ url('Images/' . $sport->thumbnail) }} alt="" width="300px"
                                            height="300px">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h5 class="title">{{ $sport->title }}</h5>
                                </div>
                            </figure>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>

    </main>
@endsection
