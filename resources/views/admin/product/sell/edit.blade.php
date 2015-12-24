@extends('backend')

@section('content')
{!! HTML::script('ckeditor/ckeditor.js') !!}
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品管理　＞　販売商品の新規登録</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>  
  <tr>
      <td>
            @if($errors->any())
            <div class="errors ">
                <ul class="msg-validate">
                      <div class="alert alert-danger">
                         @foreach($errors->all() as $error)  
                          <li>{{ $error }}</li>
                         @endforeach
                      </div>               
                </ul>
            </div>
          @endif 
      </td>
  </tr>
  
  @if(count($sp) >0)
    @foreach($sp as $val)        
    @endforeach
  @endif
{!! Form::open( [ 'id' => 'frmEditSP','method' => 'post', 'url' => 'manage/product/sell/edit/'.$id, 'files'=>true, 'enctype'=>'multipart/form-data']) !!}  
 
<tr>      
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td class="col3">表示種別<span class="notnull">[*]</span></td>
          <td><input type="radio" name="display_type" id="display_type" <?php if($val->display_type == 1) echo 'checked="checked"'; ?> value="1" />
            詳細画面タイプ<br />
            <input type="radio" name="display_type" id="display_type" <?php if($val->display_type == 2) echo 'checked="checked"'; ?> value="2" />
            リンクタイプ<br />
            <input type="radio" name="display_type" id="display_type" <?php if($val->display_type == 3) echo 'checked="checked"'; ?> value="3" />
            ファイルタイプ
            <input name="id" type="hidden" id="id" value="{{$id}}"/>
            <input name="order" type="hidden" id="id" value="{{$val->order}}"/>
            <input name="cat_product_id" type="hidden" id="cat_product_id" value="{{$val->cat_product_id}}"/>
          </td>
        </tr>
        <tr>
          <td width="20%" class="col3">カテゴリ</td>
          <td>{{$val->name}}</td>
        </tr>
        <tr>
          <td width="20%" class="col3">商品名 <span class="notnull">[*]</span></td>
          <td><input name="product_name" type="text" id="product_name" value="{{$val->product_name}}" size="60" /></td>
        </tr>
        <tr>
          <td width="20%" class="col3">商品名（補助用語）</td>
          <td><input name="product_name_auxiliary" type="text" id="product_name_auxiliary" value="{{$val->product_name_auxiliary}}" size="60" /></td>
        </tr>
        <tr>
          <td width="20%" class="col3">キャッチコピー</td>
          <td><textarea name="copy" cols="60" rows="2" id="copy" value="{{$val->copy}}">{{$val->copy}}</textarea></td>
        </tr>
        <tr>
          <td colspan="2" class="col2">●&nbsp;詳細画面タイプ</td>
        </tr>
        <tr>
          <td width="20%" class="col3">概要</td>
          <td><textarea name="overview" cols="60" rows="3" id="overview" value="{{$val->overview}}">{{$val->overview}}</textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">セット内容</td>
          <td><textarea name="set_content" cols="60" rows="5" id="set_content" value="{{$val->overview}}">{{$val->set_content}}</textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">注釈</td>
          <td><textarea name="annotation" cols="60" rows="2" id="annotation" value="{{$val->annotation}}">{{$val->annotation}}</textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">写真-1</td>
          <td><input type="file" name="image_first" id="image_first" value="{{$val->image_first}}"/></td>
        </tr>
        <tr>
          <td width="20%" class="col3">写真-2</td>
          <td><input type="file" name="image_second" id="image_second" value="{{$val->image_second}}"/></td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼料金</td>
        </tr>
        <tr>
          <td width="20%" class="col3">料金の表示 <span class="notnull">[*]</span></td>
          <td><input name="display_rate" type="radio" id="display_rate" value="1" <?php if($val->display_rate == 1) echo 'checked="checked"' ;?>/>
            する（以下を埋めてください）<br />
            <input type="radio" name="display_rate" id="display_rate" value="2" <?php if($val->display_rate == 2) echo 'checked="checked"' ;?>/>
            しない（「価格はお問い合わせください」を表示します）</td>
        </tr>
        <tr>
          <td width="20%" class="col3">販売価格</td>
          <td><input type="text" name="sell_price" id="sell_price" value="{{$val->sell_price}}"/>
            円（税別）</td>
        </tr>
        <tr>
          <td width="20%" class="col3">価格注釈</td>
          <td><textarea name="annotation_price" cols="60" rows="2" id="annotation_price" value="{{$val->annotation_price}}">{{$val->annotation_price}}</textarea></td>
        </tr>
        <tr>
            <td width="20%" class="col3">表組み</td>       
            <td>
                <table width="100%" cellspacing="0" cellpadding="5">
             <tr>
               <td bgcolor="#999999"><input name="omotekumi_title" type="text" id="omotekumi_title" value="{{$val->omotekumi_title}}" size="60" /></td>
               </tr>
            </table>
                <textarea name="omotekumi" cols="90" rows="30" id="omotekumi" value="{{$val->omotekumi}}">{{$val->omotekumi}}</textarea></td>              
        </tr>
        <tr>
          <td colspan="2" class="col2">●リンクタイプ</td>
        </tr>
        <tr>
          <td class="col3">URL <span class="notnull">[*]</span></td>
          
          <td><input name="url" type="text" id="url" size="50" value="{{$val->url}}" />
              
              <input type="checkbox" name="open_tab" id="open_tab" <?php if($val->open_tab == 1) echo 'checked="checked"'; ?>/>
            新しいウィンドウを開いて表示する <br />
            入力例） http://www.yahoo.co.jp</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">●&nbsp;ファイルタイプ</td>
        </tr>
        <tr>
          <td class="col3">ファイル <span class="notnull">[*]</span></td>
          <td><input type="file" name="file" id="file" value="{{$val->file}}"/><br />
            ※容量2MBまで</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼トップページ／おすすめ＜販売＞商品</td>
        </tr>
        <tr>
          <td class="col3">表示設定</td>
          <td><input type="checkbox" name="display_top" id="display_top" <?php if($val->display_top == 1) echo 'checked="checked"'; ?> />
            おすすめの＜販売＞商品として表示する</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼表示</td>
        </tr>
        <tr>
          <td class="col3">表示設定</td>
          <td><input type="checkbox" name="display" id="display" <?php if($val->display == 1) echo 'checked="checked"'; ?> />
            一時的に一般側画面へ表示しない</td>
        </tr>
      </table></td>
  </tr>

  <tr>
    <td align="center"><input type="submit" name="btnSubEdit" id="btnSubEdit" value="登録する" />     
  </tr>
      {!! Form::close() !!}
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input type="button" onClick="location.href='<?php echo url('manage/product/sell/?cs_id='.$val->cat_product_id); ?>'" value="登録済み販売商品一覧に戻る" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection
<script type="text/javascript">
    window.onload = function () {
        CKEDITOR.replace('omotekumi', {
            filebrowserBrowseUrl: "{!! url('filemanager/show') !!}",
            enterMode	: Number(2)
        });
    };
</script>