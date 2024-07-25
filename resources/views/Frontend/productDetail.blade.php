 @extends('Frontend.master')
 @section('title')
     Product | Detail
 @endsection
 @section('content')
     <main class="product-detail">
         <section class="review">
             <div class="container">
                 <div class="row">
                     <div class="col-5">
                         <div class="thumbnail">
                             <img src={{ url('Images/' . $product->thumbnail) }} alt="" width="450px" height="670px">

                         </div>
                     </div>
                     <div class="col-7">
                         <div class="detail">
                             <div class="price-list">

                                 @if ($product->discount == !0)
                                     {
                                     <div class="regular-price"><strike> US {{ $product->regular_price }}</strike></div>
                                     <div class="sale-price">US {{ $product->sale_price }}</div>
                                 } @else{
                                     <div class="price ">US {{ $product->regular_price }} </div>
                                     }
                                 @endif

                             </div>
                             <h5 class="title">Figure</h5>
                             <div class="group-size">
                                 <span class="title">Color Available</span>
                                 <div class="group">
                                     {{ $product->color }}
                                 </div>
                             </div>
                             <div class="group-size">
                                 <span class="title">Size Available</span>
                                 <div class="group">
                                     {{ $product->size }}
                                 </div>
                             </div>
                             <div class=" group-size">
                                 <button class=" btn btn-success" id="add">Add to cart</button>
                             </div>
                             <div class="group-size">
                                 <span class="title">Description</span>
                                 <div class="description">
                                     {{ $product->description }}
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <section>
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <h3 class="main-title">
                             RELATED PRODUCTS
                         </h3>
                     </div>
                 </div>
                 <div class="row">
                     @forelse ($relate as $item)
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


 <script>
     $(document).ready(function() {
         $('#add').on('click', function() {
             alert('add item');
         });
     })
 </script>
