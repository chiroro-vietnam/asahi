@extends('frontend')

@section('content')
<div class="clear" id="index">
  <div id="topLeft">
    <div id="topimage">
      <ul class="bxslider">
        <li class="first"><img src="frontend/image/topimage-01.jpg" alt=""></li>
      </ul>
    </div>

    <h2 class="rental"><span>おすすめのレンタル商品</span><span class="rental_btn"><a href="<?php echo route('frontend.rental.list'); ?>"><img src="frontend/image/top_rental_btn.png" alt="レンタル商品一覧を見る"></a></span></h2>
    <div class="rentalList clear"> 
        @if(count($rentalTop) > 0)
        @foreach($rentalTop as $rt)
            <a href="<?php echo route('frontend.rental.detail',$rt->id); ?>">
                <div class="listFrame">
                  <div class="listTitle">{{$rt->name}}</div>
                  <div class="listImg">
                    @if(empty($rt->image_first))
                    <img src="../../frontend/image/noimage.png" alt="">
                    @else
                      {!! HTML::image(@$rt->image_first, '', array( 'width' => 200, 'height' => 122 )) !!}
                    @endif
                  </div>
                  <div class="listName"><span class="ln_cat">{{$rt->product_name_auxiliary}}</span><br /><span class="ln_name">{{$rt->product_name}}</span></div>
                  <div class="listDetail">{{$rt->overview}}</div>
                </div>            
            </a>

        @endforeach
        @endif
    </div>
    
    <h2 class="products"><span>おすすめの販売商品</span><span class="products_btn">
            <a href="<?php echo route('frontend.product.list'); ?>"><img src="frontend/image/top_products_btn.png" alt="販売商品一覧を見る"></a></span></h2>
    <div class="productsList clear"> 
        @if(count($prTop) >0)
        @foreach($prTop as $product)
            @if($product->display_type == 1) <!--  detail -->
                <a href="<?php echo route('frontend.product.detail', $product->id); ?>">
                    <div class="listFrame">
                      <div class="listImg">
                            @if(empty($product->image_first))
                            <img src="../../frontend/image/noimage.png" alt="">
                            @else
                            {!! HTML::image($product->image_first, '', array( 'width' => 200, 'height' => 122 )) !!}
                            @endif
                      </div>
                        <div class="listName"><span class="ln_cat">{{$product->product_name_auxiliary}}</span><br /><span class="ln_name">{{$product->product_name}}</span></div>
                      <div class="listDetail">{{$product->overview}}</div>
                    </div>
                </a> 
            @elseif($product->display_type == 2) <!--  link url-->
                <a href="<?php echo url($product->url);?>" <?php if($product->open_tab == 1) echo 'target="_blank"';?>>
                    <div class="listFrame">
                      <div class="listImg">
                            <img src="../../frontend/image/icon_link.png" alt="">
                      </div>
                      <div class="listName"><span class="ln_cat">{{$product->product_name_auxiliary}}</span><br /><span class="ln_name">{{$product->product_name}}</span></div>
                      <div class="listDetail">{{$product->overview}}</div>
                    </div>
                </a> 
            @else <!--  file -->
                <a href="<?php echo url($product->file); ?>">
                    <div class="listFrame">
                      <div class="listImg">
                          <img src="../../frontend/image/icon_file.png" alt="">
                      </div>
                      <div class="listName"><span class="ln_cat">{{$product->product_name_auxiliary}}</span><br /><span class="ln_name">{{$product->product_name}}</span></div>
                      <div class="listDetail">{{$product->overview}}</div>
                    </div>
                </a> 
            @endif
        @endforeach
        @endif
    </div>

    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<ul class="tab clear">
      	<li class="select"><img src="frontend/image/top_tab_rental.png" alt="レンタル商品カテゴリ"></li>
      	<li><img src="frontend/image/top_tab_products.png" alt="販売商品カテゴリ"></li>
      </ul>

      <ul class="tab_content">
      	<li>
          <ul class="sub_rental">
            @if(count($catRenTop) > 0)
            @foreach($catRenTop as $cr)
             <li class="acrd-ctrl"><a href="#">{{$cr->name}}</a>
                @if(count($lrs) > 0)
                    @foreach($lrs as $rts)
                        @if($cr->id == $rts->cat_rental_id)
                            <ul class="acrd-pl">
                                <li><a class="item-detail" href="<?php echo url('rental/detail/'.$rts->id); ?>">{{@$rts->product_name}}</a></li>
                            </ul> 
                        @endif
                    @endforeach
                @endif
                </li>
            @endforeach                
            @endif        
            
          </ul>
        </li>
        <li class="hide">
          <ul class="sub_products">
           @if(count($catSellTop) > 0)
            @foreach($catSellTop as $cs)
             <li class="acrd-ctrl"><a href="#">{{$cs->name}}</a>
                @if(count($lps) > 0)
                    @foreach($lps as $sp)
                        @if($cs->id == $sp->cat_product_id)
                            <ul class="acrd-pl">
                                <li><a class="item-detail" href="<?php echo url('product/detail/'.$sp->id); ?>">{{@$sp->product_name}}</a></li>
                            </ul> 
                        @endif
                    @endforeach
                @endif
                
                </li>
             @endforeach            
            @endif
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>

@endsection