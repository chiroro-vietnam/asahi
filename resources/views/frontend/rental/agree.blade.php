@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li>レンタルサービス約款</li>
  </ul>
</div>

<div id="rental_agree">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">レンタルサービス約款</span></h2>
    <h3 class="h3_title">見出し</h3>

    
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div>
</div>

@endsection