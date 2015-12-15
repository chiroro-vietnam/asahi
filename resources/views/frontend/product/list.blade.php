@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="index.html" title="TOP" class="now">TOP</a></li>
    <li><a href="products_list.html" title="販売">販売</a></li>
    <li>自社ブランド</li>
  </ul>
</div>

<div id="products">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">販売</span></h2>
    <h3 class="h3_title">自社ブランド</h3>

    <div class="productsList clear"> <a href="<?php echo url('product/detail/'); ?>">
      <div class="listFrame">
        <div class="listImg"><img src="frontend/image/top_products_img1.jpg" alt=""></div>
        <div class="listName"><span class="ln_cat">ダイヤモンドブレード(湿式)</span><br /><span class="ln_name">ハイグレードブレードHG</span></div>
      </div>
      </a> <a href="products_detail.html">
      <div class="listFrame">
        <div class="listImg"><img src="frontend/image/top_products_img1.jpg" alt=""></div>
        <div class="listName"><span class="ln_cat">ダイヤモンドブレード(湿式)</span><br /><span class="ln_name">ハイグレードブレードHG</span></div>
      </div> <a href="products_detail.html">
      <div class="listFrame">
        <div class="listImg"><img src="frontend/image/top_products_img1.jpg" alt=""></div>
        <div class="listName"><span class="ln_cat">ダイヤモンドブレード(湿式)</span><br /><span class="ln_name">ハイグレードブレードHG</span></div>
      </div>
      </a> <a href="products_detail.html">
      <div class="listFrame">
        <div class="listImg"><img src="fronend/image/top_products_img1.jpg" alt=""></div>
        <div class="listName"><span class="ln_cat">ダイヤモンドブレード(湿式)</span><br /><span class="ln_name">ハイグレードブレードHG</span></div>
      </div>
      </a> <a href="products_detail.html">
      <div class="listFrame">
        <div class="listImg"><img src="frontend/image/top_products_img1.jpg" alt=""></div>
        <div class="listName"><span class="ln_cat">ダイヤモンドブレード(湿式)</span><br /><span class="ln_name">ハイグレードブレードHG</span></div>
      </div>
      </a>
 </div>
    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="frontend/image/sec_products_title.jpg" alt="販売"></div>
      <ul class="sub_products">
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
      <a href="inquiry.html"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>


@endsection