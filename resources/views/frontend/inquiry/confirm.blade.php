@extends('frontend')

@section('content')
<?php
//print_r($items);
?>
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

      <p>下記のフォームへお問い合わせ内容をご入力し、「確認画面へ進む」ボタンを押してください。
      <p>※半角カナは使用しないでください。
      <p>※<img src="frontend/image/require.png" alt="必須" />の印がついているものは必要項目です。</p>
      <section class="form">
        <form>
          <table>
            <tbody>
              <tr>
                <th>お問い合わせ内容</th>
                <td>{{}}</td>
              </tr>
              <tr>
                <th>お名前</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td></td>
              </tr>
              <tr>
                <th>ふりがな</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td></td>
              </tr>
              <tr>
                <th>会社名</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td></td>
              </tr>
              <tr>
                <th>部署</th>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>役職</th>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>郵便番号</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td class="w_auto">
                  &nbsp;-&nbsp;
                  
                  &nbsp;&nbsp;
                  <button>郵便番号検索</button></td>
              </tr>
              <tr>
                <th>都道府県</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td><select>
                    <option>都道府県名選択</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                  </select></td>
              </tr>
              <tr>
                <th>ご住所</th>
                <td><img src="frontend/image/require.png" alt="必須" /></td>
                <td></td>
              </tr>
            <th>電話番号</th>
              <td><img src="frontend/image/require.png" alt="必須" /></td>
              <td></td>
            </tr>
            
              <th>FAX番号</th>
              <td></td>
              <td><input type="text" /></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><img src="frontend/image/require.png" alt="必須" /></td>
              <td></td>
            </tr>
            
              </tbody>
          </table>
          <div class="btn">
            <input type="submit" value="確認画面へ進む" alt="確認画面へ進む" />
          </div>
        </form>
      </section>
  </div>
  <div id="topRight">
    <div class="sub_info">
      <a href="inquiry.html"><img src="common/image/sub_info_mail.png" alt="メールでのお問い合わせ"></a>
    </div><!-- /sub_info -->
  </div>  
  
</div></div>

@endsection