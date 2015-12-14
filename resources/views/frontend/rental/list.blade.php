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
    <h3 class="h3_title">{{$title_cat_rental}}</h3>
    <?php $count = count($rentals); ?>
    @if($count > 0)
    <div class="rentalList clear">        
            @foreach($rentals as $rt)
            <a href="<?php echo url('rental/detail/'.$rt->id); ?>">
                <div class="listFrame">
                    <div class="listImg"><img src="frontend/image/rental_img1.jpg" alt=""></div>
                    <div class="listName"><span class="ln_cat">{{$rt->product_name}}</span><br /><span class="ln_name">{{$rt->product_name_auxiliary}}</span></div>
                </div>
            <?php 
                if($count >= 6) break; 
            ?>
             </a>
            @endforeach
            
       
    </div>
    @endif

    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="frontend/image/sec_rental_title.jpg" alt="レンタルサービス"></div>
      <ul class="sub_rental">
        <li class="acrd-ctrl"><a href="#">電動工具</a>
          <ul class="acrd-pl">
            <li><a href="#">ステンレス管端処理機</a></li>
            <li><a href="#">セーバーソーCR13VBY</a></li>
            <li><a href="#">セーバーソーCR17Y(バイス付)</a></li>
            <li><a href="#">インパクトレンチWR16SA</a></li>
            <li><a href="#">LEDバルーン投光器</a></li>
          </ul>
        </li>
        <li class="acrd-ctrl"><a href="#">電動工具</a>
          <ul class="acrd-pl">
            <li><a href="#">ステンレス管端処理機</a></li>
            <li><a href="#">セーバーソーCR13VBY</a></li>
            <li><a href="#">セーバーソーCR17Y(バイス付)</a></li>
            <li><a href="#">インパクトレンチWR16SA</a></li>
            <li><a href="#">LEDバルーン投光器</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /subMenu -->
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>

@endsection