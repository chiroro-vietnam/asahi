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
          <span class="dn_notice">{{$rental->copy}}</span>
        </div>
        <div class="dtlHr"></div>
        <div class="dtlText">
          <div class="dt_text">
              <?php echo nl2br($rental->overview);?>
          </div>
        </div>
        <div class="dtlSet">
        	<div class="ds_title"><span>セット内容</span></div>
        	<div class="ds_text"><?php echo nl2br($rental->set_content);?></div>
        </div>
        <div class="dtlNotes">
            <div class="dn_text">
                <?php echo nl2br($rental->annotation);?>
            </div>
        </div>
      </div>
  	</div>
    
    
    <div class="dtlInq">
    	<span class="di_text">レンタル価格についてはお問い合わせください</span>
      <div class="di_inq_btn"><a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/di_inq_btn.jpg" alt="メールでのお問い合わせ"></a></div>
    </div>
    
    @if($rental->show_rate == 1)
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
          <?php echo nl2br($rental->omotekumi);?>
        </div>
    @endif

    
  </div>
  <div id="topRight">
    <div class="subMenu">
    	<div class="sub_title"><img src="../../frontend/image/sec_rental_title.jpg" alt="レンタルサービス"></div>
      <ul class="sub_rental">
          @if(count($catRentals) > 0)
          @foreach($catRentals as $catr)
            <li class="acrd-ctrl"><a href="#">{{$catr->name}}</a>
                @if(!empty($lrs[$catr->id]))
                <ul class="acrd-pl">
                  <li><a href="#">{{$lrs[$catr->id]}}</a></li>                  
                </ul>
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