@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="index.html" title="TOP" class="now">TOP</a></li>
    <li>お問い合わせ</li>
  </ul>
</div>

<div id="inquiry">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">お問い合わせ</span></h2>
    <h3 class="h3_title">ありがとうございました。お申し込みを受付いたしました</h3>   
    
          <div class="btn">
            <input type="submit" value="ホームページ" alt="ホームページ" name="btnHome"/>
          </div>
{!! Form::close() !!}
      </section>
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>  
  
</div></div>

@endsection