@extends('frontend')

@section('content')
    {!! HTML::style('backend/css/custom.css') !!}
    {!! HTML::style('frontend/css/mystyle.css') !!}
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
    <h3 class="h3_title">入力画面</h3>
    
    @if($errors->any())
        <div class="errors">
            <ul class="msg-validate">
                  <div class="alert alert-danger" style="margin-left: -43px; padding-left: 30px;">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </div>               
            </ul>
        </div>
      @endif 

      <p>下記のフォームへお問い合わせ内容をご入力し、「確認画面へ進む」ボタンを押してください。
      <p>※半角カナは使用しないでください。
      <p>※<img src="frontend/image/require.png" alt="必須" />の印がついているものは必要項目です。</p>
      <section class="form">
        {!! Form::open( ['method' => 'post', 'url' => 'inquiry']) !!}  
          <table>
            <tbody>
              <tr>
                <th>お問い合わせ内容</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><textarea rows="7" name="content" value="{{Input::old('content')}}">{{Input::old('email')}}</textarea></td>
              </tr>
              <tr>
                <th>お名前</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><input type="text" name="name" value="{{Input::old('name')}}"/></td>
              </tr>
              <tr>
                <th>ふりがな</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><input type="text" name="furigana" value="{{Input::old('furigana')}}"/></td>
              </tr>
              <tr>
                <th>会社名</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><input type="text" name="company" value="{{Input::old('company')}}"/></td>
              </tr>
              <tr>
                <th>部署</th>
                <td></td>
                <td><input type="text" name="department" value="{{Input::old('department')}}"/></td>
              </tr>
              <tr>
                <th>役職</th>
                <td></td>
                <td><input type="text" name="position" value="{{Input::old('position')}}"/></td>
              </tr>
              <tr>
                <th>郵便番号</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td class="w_auto"><input type="text" size="3" name="postalCode1" value="{{Input::old('postalCode1')}}"/>
                  &nbsp;-&nbsp;
                  <input type="text" size="4" name="postalCode2" value="{{Input::old('postalCode2')}}"/>
                  &nbsp;&nbsp;
<!--                  <button>郵便番号検索</button>-->
<!--                        <a id="chkBtn" href="#">郵便番号検索</a>-->
                </td>
              </tr>
              <tr>
                <th>都道府県</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <?php $state_arr = array(
                    '北海道' => '北海道',
                    '青森県' => '青森県',
                    '岩手県' => '岩手県',
                    '宮城県' => '宮城県',
                    '秋田県' => '秋田県',
                    '山形県' => '山形県',
                    '福島県' => '福島県',
                    '茨城県' => '茨城県',
                    '栃木県' => '栃木県',
                    '群馬県' => '群馬県',
                    '埼玉県' => '埼玉県',
                    '千葉県' => '千葉県',
                    '東京都' => '東京都',
                    '神奈川県' => '神奈川県',
                    '新潟県' => '新潟県',
                    '富山県' => '富山県',
                    '石川県' => '石川県',
                    '福井県' => '福井県',
                    '山梨県' => '山梨県',
                    '長野県' => '長野県',
                    '岐阜県' => '岐阜県',
                    '静岡県' => '静岡県',
                    '愛知県' => '愛知県',
                    '三重県' => '三重県',
                    '滋賀県' => '滋賀県',
                    '京都府' => '京都府',
                    '大阪府' => '大阪府',
                    '兵庫県' => '兵庫県',
                    '奈良県' => '奈良県',
                    '和歌山県' => '和歌山県',
                    '鳥取県' => '鳥取県',
                    '岡山県' => '岡山県',
                    '広島県' => '広島県',
                    '山口県' => '山口県',
                    '香川県' => '香川県',
                    '愛媛県' => '愛媛県',
                    '高知県' => '高知県',
                    '愛媛県' => '愛媛県',
                    '福岡県' => '福岡県',
                    '佐賀県' => '佐賀県',
                    '長崎県' => '長崎県',
                    '熊本県' => '熊本県',
                    '大分県' => '大分県',
                    '宮崎県' => '宮崎県',
                    '鹿児島県' => '鹿児島県',
                    '沖縄県' => '沖縄県'
                    );?>
                <td><select name="state">                  
                    <option value="">--都道府県--</option>
                    <?php 
                        foreach($state_arr as $state) {
                        echo '<option value="'.$state.'"';
                           if( !empty(Input::old('state')) && $state == Input::old('state') ) {
                                  echo ' selected="selected"';
                           }
                           echo ' >'.$state.'</option>';
                       }
                       echo '<select>';
                    ?>

                  </select>
                
                </td>
              </tr>
              <tr>
                <th>ご住所</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><input type="text" name="address" value="{{Input::old('address')}}"/></td>
              </tr>
            <th>電話番号</th>
              <td><img src="frontend/image/require.png" alt="必須" /></td>
              <td><input type="text" name="phone" value="{{Input::old('phone')}}"/></td>
            </tr>
            
              <th>FAX番号</th>
              <td></td>
              <td><input type="text" name="fax" value="{{Input::old('fax')}}"/></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><img src="frontend/image/require.png" alt="必須" /></td>
              <td><input type="text" name="email" value="{{Input::old('email')}}"/></td>
            </tr>            
              </tbody>
          </table>
          <div class="btn" style="width: 114px;">
            <input type="submit" value="確認画面へ進む" alt="確認画面へ進む" name="btSubmit"/>
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