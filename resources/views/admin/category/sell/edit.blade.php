@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品カテゴリ管理　＞　販売商品のカテゴリの新規登録</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>
          @if($errors->any())
            <div class="errors">
                <ul class="msg-validate">
                    @foreach($errors->all() as $error)
                      <div class="alert alert-danger">
                          <li>{{ $error }}</li>
                      </div>               
                    @endforeach
                </ul>
            </div>
          @endif          
      </td>    
  </tr> 
   {!! Form::open( ['method' => 'post', 'url' => 'manage/category/sell/edit/'.$cat_sell->id, 'enctype'=>'multipart/form-data'] ) !!}
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td width="20%" class="col3">カテゴリ名 <span class="notnull">[*]</span></td>
        <td>
            <input name="name" type="text" id="name" value="{{$cat_sell->name}}" size="60" />
            <input name="order" type="hidden" id="name" value="{{$cat_sell->order}}"/>
        </td>
      </tr>
      <tr>
        <td width="20%" class="col3">表示設定</td>
        <td><input type="checkbox" name="display" id="display" <?php if($cat_sell->display) echo 'checked="checked"';?>/>
          一時的に一般側画面へ表示しない</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="button" id="button" value="登録する" />
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input type="button" onClick="location.href='<?php echo route('admin.category.sell.list'); ?>'" value="登録済み販売商品のカテゴリ一覧に戻る" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
{!! Form::close() !!}
@endsection