@extends('frontend')

@section('content')


<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li>会社概要</li>
  </ul>
</div>

<div id="company">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">会社概要</span></h2>
    
    <h3 class="h3_title">会社概要</h3>

<div class="asset-body">
<div class="company_img"><img alt="社屋外観" src="frontend/image/company_img.jpg" /></div>
<table summary="会社概要" id="company_profile" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th>社　　名</th>
<td>アサヒ産業株式会社</td>
</tr>
<tr>
<th>所 在 地</th>
<td>〒700-0951 岡山県岡山市北区田中598-3</td>
</tr>
<tr>
<th>電話番号</th>
<td>086-244-1201</td>
</tr>
<tr>
<th>業　　種</th>
<td>配管機械工具卸・レンタル</td>
</tr>
<tr>
<th>沿　　革</th>
<td>
<div class="company_history">
創業<br />
昭和60年（1985年）2月1日
</div>
<div>
創立<br />
平成元年（1989年）3月21日
</div>
</td>
</tr>
</tbody>
</table><br /><br />

<div id="company_inquiry">
<a href="<?php echo route('frontend.inquiry.index'); ?>" target="_brank">お問い合わせは送信フォームからお願い致します。</a>
</div>

<br /><br /><br />

    <h3 class="h3_title">アクセス</h3>

<table id="company_googlemap">
<tbody><tr>
<td>
<iframe marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E5%B2%A1%E5%B1%B1%E7%9C%8C%E5%B2%A1%E5%B1%B1%E5%B8%82%E5%8C%97%E5%8C%BA%E7%94%B0%E4%B8%AD598-3&amp;sll=36.5626,136.362305&amp;sspn=33.584679,77.34375&amp;brcurrent=3,0x3553f8a6944ae8ff:0xb5cdebd164bd7500,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E5%B2%A1%E5%B1%B1%E7%9C%8C%E5%B2%A1%E5%B1%B1%E5%B8%82%E5%8C%97%E5%8C%BA%E7%94%B0%E4%B8%AD%EF%BC%95%EF%BC%99%EF%BC%98%E2%88%92%EF%BC%93&amp;ll=34.64177,133.884587&amp;spn=0.007944,0.016115&amp;z=16&amp;iwloc=A&amp;output=embed" frameborder="0" height="380" scrolling="no" width="680"></iframe><br />
<small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E5%B2%A1%E5%B1%B1%E7%9C%8C%E5%B2%A1%E5%B1%B1%E5%B8%82%E5%8C%97%E5%8C%BA%E7%94%B0%E4%B8%AD598-3&amp;sll=36.5626,136.362305&amp;sspn=33.584679,77.34375&amp;brcurrent=3,0x3553f8a6944ae8ff:0xb5cdebd164bd7500,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E5%B2%A1%E5%B1%B1%E7%9C%8C%E5%B2%A1%E5%B1%B1%E5%B8%82%E5%8C%97%E5%8C%BA%E7%94%B0%E4%B8%AD%EF%BC%95%EF%BC%99%EF%BC%98%E2%88%92%EF%BC%93&amp;ll=34.64177,133.884587&amp;spn=0.007944,0.016115&amp;z=16&amp;iwloc=A" style="color: rgb(0, 0, 255); text-align: left;">大きな地図で見る</a></small></td>
</tr></tbody></table>
<br /><br />
        </div>
    
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>


@endsection