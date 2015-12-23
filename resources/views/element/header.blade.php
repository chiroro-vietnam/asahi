 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
@yield('style')
    {!! HTML::style('frontend/css/import.css') !!}
    {!! HTML::style('frontend/css/common.css') !!}

@yield('script')
    {!! HTML::script('frontend/js/jquery.cookie.js'); !!}
    {!! HTML::script('frontend/js/jquery.bxslider.min.js'); !!}
    {!! HTML::script('frontend/js/function.js'); !!}
    {!! HTML::script('frontend/js/jquery.bxslider.min.js'); !!}
    {!! HTML::script('frontend/js/top.js'); !!}
       
<div id="header_top">
	<div class="ht_wrap clear">
    <div class="ht_text">機械工具・販売・レンタル・メンテナンスの総合商社</div>
    <div class="ht_search">
      <div id="siteSearch">
      	<img src="../../frontend/image/ht_seach_title.png" alt="サイト内検索">
        
        <form action="http://www.google.com/search">
 
<!--        <form class="form-search" id="search" method="GET" action="{{URL::route('frontend.search')}}">-->
            <input type="hidden" name="hl" value="ja">
            <input type="hidden" name="hq" value="inurl:www.ash-s.com/">
            <input type="hidden" name="ie" value="Shift_JIS">
            <input type="hidden" name="oe" value="Shift_JIS">
            <input type="hidden" name="filter" value="0">
            <input type="text" name="keyword" size="25" maxlength="30" value="" placeholder="サイト内検索">
            <input type="submit" name="btnG" value="検索" class="btn_submit">
        </form>

      </div><!--siteSearch//-->
    </div>
    <div class="ht_fsize">
    	<img class="ht_fsize_title" src="../../frontend/image/ht_fsize_title.png" alt="文字の大きさ">
      <a href="#"><img class="fchgBtn" src="../../frontend/image/ht_fsize_defo.png" alt="標準"></a>
      <a href="#"><img class="fchgBtn" src="../../frontend/image/ht_fsize_large.png" alt="拡大"></a>
    </div>
  </div>
</div>
<header>
  <h1><a href="<?php echo route('frontend.homepage'); ?>">アサヒ産業株式会社</a></h1>
  <div class="h_inq_btn"><a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/h_inq_btn.png" alt="メールでのお問い合わせ"></a></div>
  <div class="h_tel">
      <img src="../../frontend/image/h_tel.png" alt="電話でのお問い合わせ：086-244-1201">
  </div>
</header>
<nav>
  <ul class="clear">
    <?php   $active = '';
            $curr_page = Request::route()->getName(); ?>
    <li id="nav01"><a @if($curr_page == 'frontend.homepage') class="now" @endif href="<?php echo route('frontend.homepage'); ?>" title="TOP">TOP</a></li>
    <li id="nav02"><a @if($curr_page == 'frontend.rental.list' || $curr_page == 'frontend.rental.detail') class="now" @endif href="<?php echo route('frontend.rental.list'); ?>" title="レンタルサービス">レンタルサービス</a></li>
    <li id="nav03"><a @if($curr_page == 'frontend.product.list' || $curr_page == 'frontend.product.detail') class="now" @endif href="<?php echo route('frontend.product.list'); ?>" title="販売">販売</a></li>
    <li id="nav04"><a @if($curr_page == 'frontend.maker.list') class="now" @endif href="<?php echo route('frontend.maker.list'); ?>" title="取扱いメーカー">取扱いメーカー</a></li>
    <li id="nav05"><a @if($curr_page == 'frontend.company.index') class="now" @endif href="<?php echo route('frontend.company.index'); ?>" title="会社概要">会社概要</a></li>
  </ul>
</nav>