@extends('client.layouts.app')

@section('title')
    Products
@endsection

{{-- @section('responsive') --}}

<link rel="stylesheet" type="text/css" href= "{{asset('frontend/styles/categories.css')}}">
<link rel="stylesheet" type="text/css" href= "{{asset('frontend/styles/categories_responsive.css')}}">
{{-- @endsection --}}

@section('slide')
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{asset('frontend/images/categories.jpg')}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Smart Phones<span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
@endsection

@section('content')
<?php $all_manufa=DB::table('manufacturer')->get(); ?>
<!-- Products -->
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
        <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                         <div class="col">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Hãng sản xuất</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    
                                        <ul>
                                            
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }' ><a href="{{URL::to('/productsclient')}}">ALL</a></li>
                                            @foreach ($all_manufa as $item)
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><a href="{{URL::to('/product_by_manufacturer/'.$item->ManufacturerID)}}"><span>{{$item->ManufacturerName}}</span></a></li>
                                            @endforeach
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="sorting">
                            <ul class="item_sorting">
                                <li>
                                    <span class="sorting_text">Sort by</span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <ul>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="product_grid">
                    <!-- Product -->
                    @foreach ($products as $item)
                   
                    <div class="product">
                        <div class="product_image"><img src='{{url('images/product/'.$item->Image0)}}'
                             alt=""></div>
                        {{-- <div class="product_extra product_new"><a href="categories.html">New</a></div> --}}
                        {{-- <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addToCart/'.$products->ProductID)}}">Add to cart</a> --}}
                        @if(Session::has('userLogin'))
                        <a class="btn btn-block btn-outline-primary"  onclick="addToCart({{$item->ProductID}})" href="javascript:">Add to cart</a>
                        {{-- <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addToCart/'.$item->ProductID)}}">Add to cart</a> --}}
                        @else
                        
                        <a class="btn btn-block btn-outline-primary" href="/login">Add to cart</a>
                        @endif
                        <div class="product_content">
                            <div class="product_title"><a href="{{URL::to('/productdetail/'.$item->ProductID)}}">{{$item->ProductName}}</a></div>
                            <div class="product_price">{{number_format($item->Price).' '.'VND'}}</div>
                            
                        </div>
                        
                    </div>
                    @endforeach
                    <!-- Product -->
                    <!-- Product -->
                </div>
                <div class="text-center">
                <div class="product_pagination ">
                    <ul>
                        {{$products->links()}}
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
 
@endsection

@section('custom')
<script src="{{asset('frontend/js/categories.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script>
    function addToCart(id){
      $.ajax({
          url:'addToCart/'+id,
          type: 'GET',
      }).done(function(respone){
          console.log(respone);
          $("#change-item-cart").empty();
          $("#change-item-cart").html(respone);
        //   alertify.success('Thêm sản phẩm thành công');
      });
    }
</script>
@endsection