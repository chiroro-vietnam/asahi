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
{!! Form::open( ['method' => 'post', 'url' => 'inquiry/confirm', 'enctype'=>'multipart/form-data'] ) !!} 
  	<h2><span class="h2_title">お問い合わせ</span></h2>
    <h3 class="h3_title">入力画面</h3>

      <p>下記のフォームへお問い合わせ内容をご入力し、「確認画面へ進む」ボタンを押してください。

      <section class="form">
        <form>
            @if(isset($data))
                @foreach($data as $val) @endforeach 
            @endif
          <table>
            <tbody>
              <tr>
                <th>お問い合わせ内容</th>
                <td>{{$val['content']}}</td>
              </tr>
              <tr>
                <th>お名前</th>                
                <td>{{$val['name']}}</td>
              </tr>
              <tr>
                <th>ふりがな</th>              
                <td>{{$val['furigana']}}</td>
              </tr>
              <tr>
                <th>会社名</th>               
                <td>{{$val['company']}}</td>
              </tr>
              <tr>
                <th>部署</th>
                <td>{{$val['department']}}</td>
              </tr>
              <tr>
                <th>役職</th>
                <td>{{$val['position']}}</td>
              </tr>
              <tr>
                <th>郵便番号</th>                
                <td class="w_auto">
                  {{$val['postalCode1']}}&nbsp;-&nbsp;{{$val['postalCode2']}}                  
              </tr>
              <tr>
                <th>都道府県</th>                
                <td>{{$val['state']}}</td>
              </tr>
              <tr>
                <th>ご住所</th>               
                <td>{{$val['address']}}</td>
              </tr>
            <th>電話番号</th>             
              <td>{{$val['phone']}}</td>
            </tr>
            
              <th>FAX番号</th>
              <td>{{$val['fax']}}</td>
              <td></td>
            </tr>
            <tr>
              <th>メールアドレス</th>              
              <td>{{$val['email']}}</td>
            </tr>
            
              </tbody>
          </table>
          <div class="btn">
            <input type="submit" value="お問い合わせの送信" alt="お問い合わせの送信" />
          </div>
 
      </section>
  </div>
  {!! Form::close() !!}
  <div id="topRight">
    <div class="sub_info">
      <a href="<?php echo route('frontend.inquiry.index'); ?>"><img src="../../../frontend/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>  
  
</div></div>

@endsection