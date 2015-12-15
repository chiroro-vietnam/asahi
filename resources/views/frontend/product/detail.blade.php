@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li><a href="<?php echo route('frontend.product.list'); ?>" title="販売">販売</a></li>
    <li><a href="<?php echo route('frontend.product.list'); ?>" title="ダイヤモンドブレード(湿式)">ダイヤモンドブレード(湿式)</a></li>
    <li>ハイグレードブレードHG</li>
  </ul>
</div>　

<div id="products">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">レンタルサービス</span></h2>

    <div class="productsDetail clear">
      <div class="dtl_left">
        <div class="dtlImg1"><img src="../../frontend/image/products/001_img1.jpg" alt=""></div>
        <div class="dtlImg2"><img src="../../frontend/image/products/001_img2.jpg" alt=""></div>
      </div>
      <div class="dtl_right">
        <div class="dtlName">
          <span class="dn_cat">ダイヤモンドブレード(湿式)</span>
          <span class="dn_name">ハイグレードブレードHG</span>
          <span class="dn_notice">1枚の刃で一般品ブレードの3枚～5枚分の寿命!!</span>
        </div>
        <div class="dtlHr"></div>
        <div class="dtlText">
          <div class="dt_text">
            5ps～10psの小型コンクリートカッター用に切れ味・耐久性を重視<br />
            チップの高さが寿命の秘訣!一度使うと手放せない<br />
            <br />
            アスファルト・コンクリート兼用となります。<br />
          </div>
        </div>
        <div class="dtlPrice">
          <div class="dp_price">000,000<span>円(税別）</span></div>
          <div class="dp_caption">価格注釈がはいります。価格注釈がはいります。価格注釈がはいります。</div>
        </div>
        <div class="dtlSet">
        	<div class="ds_title"><span>セット内容</span></div>
        	<div class="ds_text">
            セット内容1<br />
            セット内容2<br />
            セット内容3<br />
            セット内容4<br />
            セット内容5<br />
          </div>
        </div>
        <div class="dtlNotes">
          <div class="dn_text">注釈がはいります。注釈がはいります。注釈がはいります。注釈がはいります。注釈がはいります。</div>
        </div>
      </div>
  	</div>
    
    
    <div class="dtlInq">
    	<span class="di_text">販売価格についてはお問い合わせください</span>
      <div class="di_inq_btn"><a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/di_inq_btn.jpg" alt="メールでのお問い合わせ"></a></div>
    </div>
    
    
    <h4><span class="h4_title">サイズや料金表について</span></h4>
      
      <div class="inqInput">
        <table border="0" cellspacing="2" cellpadding="5">
          <tr>
            <th>種類</th>
            <th>サイズ</th>
            <th>料金</th>
          </tr>
          <tr>
            <td>12HG</td>
            <td>外径323mm／チップ高9mm／チップ厚3.0mm／チップ長47mm／基板厚2.4mm</td>
            <td>00,000円</td>
          </tr>
          <tr>
            <td>14HG</td>
            <td>外径323mm／チップ高9mm／チップ厚3.0mm／チップ長47mm／基板厚2.4mm</td>
            <td>00,000円</td>
          </tr>
          <tr>
            <td nowrap>一般スタンダードタイプ／<br>
            12インチ</td>
            <td>外径323mm／チップ高9mm／チップ厚3.0mm／チップ長47mm／基板厚2.4mm</td>
            <td>00,000円</td>
          </tr>
          <tr>
            <td>一般スタンダードタイプ／<br>
            14インチ</td>
            <td>外径323mm／チップ高9mm／チップ厚3.0mm／チップ長47mm／基板厚2.4mm</td>
            <td>00,000円</td>
          </tr>
        </table>
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
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>

@endsection