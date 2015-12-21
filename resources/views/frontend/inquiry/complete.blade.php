@extends('frontend')

@section('content')
    {!! HTML::style('backend/css/custom.css') !!}
    {!! HTML::style('frontend/css/mystyle.css') !!}
    
<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li>お問い合わせ</li>
  </ul>
</div>

<div id="inquiry">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">お問い合わせ</span></h2>
    <h3 class="h3_title">ありがとうございました。お申し込みを受付いたしました</h3>   
    
        <div class="btn" style="margin-left:250px; width: 114px; width:97px;">             
          <input onclick="location.href = '<?php echo route('frontend.homepage'); ?>'" type="button" value="ホームページ" alt="ホームページ" name="btnHome"/>
        </div>
{!! Form::close() !!}
      </section>
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>  
  
</div></div>

@endsection