@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li><a href="<?php echo route('frontend.rental.list'); ?>" title="レンタルサービス">レンタルサービス</a></li>
    <li>{{$title_cat_rental}}</li>
  </ul>
</div>

<div id="rental">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">{{$title_rental}}</span></h2>
     <?php $count = count($rentals); ?>
     @if($count > 0)
    <h3 class="h3_title">{{$title_cat_rental}}</h3>      
    <div class="rentalList clear">        
            @foreach($rentals as $rt)
            <a href="<?php echo url('rental/detail/'.$rt->id); ?>">
                <div class="listFrame">
                    <div class="listImg">
                        @if(empty($rt->image_first))
                        <img src="../../frontend/image/noimage.png" alt="">
                        @else
                        {!!HTML::image(@$rt->image_first) !!}
                        @endif
                    </div>
                    <div class="listName"><span class="ln_cat">{{$rt->product_name}}</span><br /><span class="ln_name">{{$rt->product_name_auxiliary}}</span></div>
                </div>            
             </a>
             <?php 
                if($count >= LIMIT_ITEM_PAGE) break; 
            ?>
            @endforeach   
       
    </div>
    @endif
    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="frontend/image/sec_rental_title.jpg" alt="レンタルサービス"></div>
      <ul class="sub_rental">
       @if(count($catRentals) > 0)
        @foreach($catRentals as $cr) 
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
    </div><!-- /subMenu -->
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>  
  
</div></div>

@endsection