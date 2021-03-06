@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="index.html" title="TOP" class="now">TOP</a></li>
    <li>サイトマップ</li>
  </ul>
</div>

<div id="sitemap">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">サイトマップ</span></h2>
    
    <ul class="sitemap_list">
    	<li><a href="<?php echo route('frontend.homepage'); ?>">HOME</a></li>
    	<li><a href="<?php echo route('frontend.rental.list'); ?>">レンタルサービス</a></li>
    	<li><a href="<?php echo route('frontend.product.list'); ?>">販売</a></li>
    	<li><a href="<?php echo route('frontend.maker.list'); ?>">取り扱いメーカー</a></li>
    	<li><a href="<?php echo route('frontend.company.index'); ?>">会社概要</a></li>
    	<li><a href="<?php echo route('frontend.inquiry.index'); ?>">お問い合わせ</a></li>
    	<li><a href="<?php echo route('frontend.rental.agree'); ?>">レンタルサービス約款</a></li>
    	<li><a href="<?php echo route('frontend.sitemap.index'); ?>">サイトマップ</a></li>
    </ul>
    
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div> 
  
</div></div>
@endsection