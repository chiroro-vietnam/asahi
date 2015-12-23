@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li><a href="<?php echo route('frontend.product.list'); ?>" title="販売">販売</a></li>
    <li>自社ブランド</li>
  </ul>
</div>

<div id="products">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">{{$title_sell_product}}</span></h2>
     @if(count($products) > 0)
    <h3 class="h3_title">{{$tile_branch}}</h3>       
        <div class="productsList clear"> 
            @foreach($products as $product)            
                <a href="<?php echo url('product/detail/'.$product->id); ?>">
                    <div class="listFrame">
                      <div class="listImg"><img src="frontend/image/top_products_img1.jpg" alt=""></div>
                      <div class="listName"><span class="ln_cat">{{$product->product_name}}</span><br /><span class="ln_name">{{$product->product_name_auxiliary}}</span></div>
                    </div>            
                </a>  
            
            @endforeach
            </div>
        @endif
  </div> 
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="frontend/image/sec_products_title.jpg" alt="販売"></div>
      <ul class="sub_products">
       @if(count($catSell) > 0)
       @foreach($catSell as $cp)
            <li class="acrd-ctrl"><a href="#">{{$cp->name}}</a>
                @if(count($lps) > 0)
                    @foreach($lps as $sp)
                        @if($cp->id == $sp->cat_product_id)
                            <ul class="acrd-pl">
                                <li><a href="<?php echo url('product/detail/'.$sp->id); ?>">{{@$sp->product_name}}</a></li>
                            </ul> 
                        @endif
                    @endforeach
                @endif
                             
            </li>
        @endforeach
        @endif
      </ul>
    </div><!-- /subMenu -->
    <div class="sub_info">
      <a href="inquiry.html"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>


@endsection