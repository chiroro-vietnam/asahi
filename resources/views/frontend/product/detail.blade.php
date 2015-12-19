@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li><a href="<?php echo route('frontend.product.list'); ?>" title="販売">販売</a></li>
    <li><a href="<?php echo route('frontend.product.list'); ?>" title="ダイヤモンドブレード(湿式)">ダイヤモンドブレード(湿式)</a></li>
    <li>ハイグレードブレードHG</li>
  </ul>
</div>　

<div id="products">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">{{$title_product}}</span></h2>

    <div class="productsDetail clear">
      <div class="dtl_left">
        <div class="dtlImg1">{!!HTML::image($product->image_first) !!}</div>
        <div class="dtlImg2">{!!HTML::image($product->image_first) !!}</div>
      </div>
      <div class="dtl_right">
        <div class="dtlName">
          <span class="dn_cat">{{$product->product_name_auxiliary}}</span>
          <span class="dn_name">{{$product->product_name}}</span>
          <span class="dn_notice"><?php echo nl2br($product->copy);?></span>
        </div>
        <div class="dtlHr"></div>
        <div class="dtlText">
          <div class="dt_text">
              <?php echo nl2br($product->overview);?>             
          </div>
        </div>
        @if($product->display_rate == 1)
            <div class="dtlPrice">
              <div class="dp_price">{{number_format($product->sell_price)}}<span>円(税別）</span></div>
              <div class="dp_caption">{{$product->annotation_price}}</div>
            </div>
        @endif
        <div class="dtlSet">
        	<div class="ds_title"><span>セット内容</span></div>
        	<div class="ds_text">
                <?php echo nl2br($product->set_content);?>
          </div>
        </div>
        <div class="dtlNotes">
          <div class="dn_text"><?php echo nl2br($product->overview);?></div>
        </div>
      </div>
  	</div>
    
    
    <div class="dtlInq">
    	<span class="di_text">販売価格についてはお問い合わせください</span>
      <div class="di_inq_btn"><a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/di_inq_btn.jpg" alt="メールでのお問い合わせ"></a></div>
    </div>
    
    
    <h4><span class="h4_title">サイズや料金表について</span></h4>
    
    @if($product->display_rate == 1)
        <div class="inqInput">
            <?php echo $product->omotekumi;?>
        </div>
    @endif
    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="../../frontend/image/sec_products_title.jpg" alt="販売"></div>
      <ul class="sub_products">
        @if(!empty($catSell))
        @foreach($catSell as $cs)
            <li class="acrd-ctrl"><a href="#">{{$cs->name}}</a>
               @if(count($lps) > 0)
                    @foreach($lps as $sp)
                        @if($cs->id == $sp->cat_product_id)
                            <ul class="acrd-pl">
                                <li><a href="#">{{@$sp->product_name}}</a></li>
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
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>

@endsection