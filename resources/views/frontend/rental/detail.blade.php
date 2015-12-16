@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li><a href="<?php echo route('frontend.rental.list'); ?>" title="レンタルサービス">レンタルサービス</a></li>
    <li><a href="<?php echo route('frontend.rental.list'); ?>" title="レンタルサービス">配水ポリエチレン管融着工具</a></li>
    <li>JWEF200-Ⅱ</li>
  </ul>
</div>　

<div id="rental">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">{{$title_rental}}</span></h2>

    <div class="rentalDetail clear">
      <div class="dtl_left">
        <div class="dtlImg1">{!!HTML::image($rental->image_first) !!}</div>
        <div class="dtlImg2">{!!HTML::image($rental->image_second) !!}</div>
      </div>
      <div class="dtl_right">
        <div class="dtlName">
          <span class="dn_cat">{{$rental->product_name}}</span>
          <span class="dn_name">{{$rental->product_name_auxiliary}}</span>
          <span class="dn_notice">1台で3社のEF継手に対応!!</span>
        </div>
        <div class="dtlHr"></div>
        <div class="dtlText">
          <div class="dt_text">
            融着履歴を1,000件自動記録<br />
            バーコード読み取りで通電制御<br />
          </div>
        </div>
        <div class="dtlSet">
        	<div class="ds_title"><span>セット内容</span></div>
        	<div class="ds_text"><?php echo nl2br($rental->set_content);?></div>
        </div>
        <div class="dtlNotes">
        	<div class="dn_text">
            JW (日本水道協会)規格対応<br />
            PWA (配水用ポリエチレン管協会)規格　対応<br />
          </div>
        </div>
      </div>
  	</div>
    
    
    <div class="dtlInq">
    	<span class="di_text">レンタル価格についてはお問い合わせください</span>
      <div class="di_inq_btn"><a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/di_inq_btn.jpg" alt="メールでのお問い合わせ"></a></div>
    </div>
    
    
    <div class="inqInput2">
      <table border="0" cellspacing="2" cellpadding="5">
        <tr>
          <th width="143" bgcolor="#EBF2FC">1日レンタル料金</th>
          <td width="517" align="right">{{number_format($rental->rental_first_price)}}円</td>
        </tr>
        <tr>
          <th bgcolor="#EBF2FC">1ヶ月レンタル料金</th>
          <td align="right">{{number_format($rental->rental_one_month_price)}}円</td>
        </tr>
        <tr>
          <th bgcolor="#EBF2FC">整備点検費</th>
          <td align="right">{{number_format($rental->service_cost)}}円</td>
        </tr>
      </table>
      </div>
      
      <div class="inqInput">
      <table border="0" cellspacing="2" cellpadding="5">
        <tr>
          <th>サイズ</th>
          <th>1日</th>
          <th>5日</th>
          <th>10日</th>
        </tr>
<!--        <tr>
          <td>75～100</td>
          <td>7,500円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr>
          <td>100～200</td>
          <td>13,200円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr>
          <td>150～300</td>
          <td>17,500円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr>
          <td>200～400</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>300～525</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>350～600</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>375～750</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>500～1000</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>延長ホース・ポンプ</td>
          <td>2,000円</td>
          <td>2,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>延長ホース・ポンプ2</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>延長ホース・ポンプ3</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>
        <tr> <td>延長ホース・ポンプ4</td>
          <td>00,000円</td>
          <td>00,000円</td>
          <td>00,000円</td>
        </tr>-->
      </table>
    </div>

    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="common/image/sec_rental_title.jpg" alt="レンタルサービス"></div>
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
      <a href="inquiry.html"><img src="common/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>

@endsection