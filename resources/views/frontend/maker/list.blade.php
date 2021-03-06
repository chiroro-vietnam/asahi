@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li>取扱いメーカー</li>
  </ul>
</div>

<div id="maker">
<div class="clear" id="index">
  <div id="topLeft">
  	<h2><span class="h2_title">取扱いメーカー</span></h2>
    
    
    <div class="asset-body">
            <table id="brand_maker_list" border="0" cellspacing="0" summary="取り扱いメーカー一覧" cellpadding="0">
<tbody>
<tr>
<td>（株）IKK</td>
<td><a href="http://www.asada.co.jp/">アサダ（株）</a></td>
<td><a href="http://www.arkace.co.jp/">（株）アークエース</a></td></tr>
<tr>
<td>（株）石井マーク</td>
<td><a href="http://www.itabasi.com/">板橋機械工業（株）</a></td>
<td>（株）エヌ・エス・ピー</td></tr>
<tr>
<td>（株）エピア</td>
<td><a href="http://www.mcccorp.co.jp/">（株）MCCコーポレーション</a></td>
<td>大肯精密（株）</td></tr>
<tr>
<td><a href="http://www.ogura-web.com/">（株）オグラ</a></td>
<td><a href="http://www.kamekura.co.jp/">亀倉精機（株）</a></td>
<td>（有）川村製作所</td></tr>
<tr>
<td><a href="http://www.kantool.co.jp/">（株）カンツール</a></td>
<td><a href="http://www.kyowapmp.jp/">（株）キョーワ</a></td>
<td><a href="http://www.kk-kokusai.com/">（株）コクサイ</a></td></tr>
<tr>
<td><a class="specify-shop" href="http://www.consec.co.jp/seihin/page_1.htm"><strong>（株）コンセック　※</strong></a></td>
<td>コーリョー建販（株）</td>
<td><a href="http://www.sankyotrading.co.jp/">（株）サンキョウ・トレーディング</a></td></tr>
<tr>
<td><a href="http://www.norton.co.jp/">サンゴバン（株）</a></td>
<td><a href="http://www.sanko-techno.co.jp/">サンコーテクノ（株）</a></td>
<td><a class="specify-shop" href="http://www.shibuya-group.co.jp/"><strong>（株）シブヤ　※</strong></a></td></tr>
<tr>
<td>神王工業（株）</td>
<td><a href="http://www.stihl.co.jp/"><strong>（株）スチール　※</strong></a></td>
<td><a href="http://www.supertool.co.jp/">（株）スーパーツール</a></td></tr>
<tr>
<td>大喜工業（株）</td>
<td>大宝ダイヤモンド工業（株）</td>
<td><a href="http://www.taiyoseiki.co.jp/">大洋製器工業（株）</a></td></tr>
<tr>
<td><a href="http://www.takemuratec.co.jp/">タケムラテック（株）</a></td>
<td><a href="http://www.k-nakao.co.jp/">（株）ナカオ</a></td>
<td>名古屋手袋（株）</td></tr>
<tr>
<td><a href="http://www.nishiyama.co.jp/">（株）ニシヤマ</a></td>
<td>日東ポリマー工業（株）</td>
<td><a href="http://www.nippondiamond.co.jp/">日本ダイヤモンド（株）</a></td></tr>
<tr>
<td><a href="http://www.husqvarna.jp/">ハスクバーナー・ゼノア（株）</a></td>
<td><a href="http://www.hitachi-kenki.co.jp/camino/">（株）日立建機カミーノ</a></td>
<td><a class="specify-shop" href="http://www.hitachi-koki.co.jp/"><strong>日立工機（株）　※</strong></a></td></tr>
<tr>
<td><a href="http://www.fujitecom.co.jp/">フジテコム（株）</a></td>
<td><a href="http://www.hoshin.co.jp/">ホーシン（株）</a></td>
<td><a href="http://www.makita.co.jp/">（株）マキタ</a></td></tr>
<tr>
<td><a href="http://www.max-ltd.co.jp/">マックス（株）</a></td>
<td><a href="http://www.maruzenkogyo.co.jp/">丸善工業（株）</a></td>
<td><a href="http://www.miyanaga.co.jp/jp/">（株）ミヤナガ</a></td></tr>
<tr>
<td><a href="http://www.mutohengineering.co.jp/">（株）ムトーエンジニアリング</a></td>
<td><a href="http://www.ympc.co.jp/">ヤマハモーターパワープロダクツ</a></td>
<td><a href="http://www.yamabiko-corp.co.jp/">（株）やまびこ</a></td></tr>
<tr>
<td><a href="http://www.yutani.co.jp/">（株）ユタニ</a></td>
<td>ユニカ（株）</td>
<td><a class="specify-shop" href="http://www.rexind.co.jp/jp/index.html">レッキス工業※</a></td></tr>
<tr>
<td>若井産業（株）</td>
<td>---</td>
<td>---</td>
</tr>
</tbody></table>
<br />
他、多数　　　<span class="specify-shop"><strong>※サービス指定店</strong></span>
<br /><br />
メーカー名をクリックするとメーカー公式ホームページへジャンプします。
<br />
各種取り扱っております。詳細は、TEL:086-244-1201<br /><br />
        </div>

    
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>
  
  
</div></div>

@endsection