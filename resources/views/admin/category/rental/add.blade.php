@extends('backend')

@section('content')
{!! Form::open( ['method' => 'post', 'route' => 'admin.category.rental.add', 'enctype'=>'multipart/form-data'] ) !!}
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■レンタル商品カテゴリ管理　＞　レンタル商品のカテゴリの新規登録</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
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
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td width="20%" class="col3">カテゴリ名 <span class="notnull">[*]</span></td>
        <td><input name="name" type="text" id="name" size="60" value="{{Input::old('name')}}" /></td>
      </tr>
      <tr>
        <td width="20%" class="col3">表示設定</td>
        <td>
            <input type="checkbox" name="display" id="display" <?php if (Input::old('display')) echo 'checked'; ?>/>
          一時的に一般側画面へ表示しない</td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="btnSubmit" id="btnSubmit" value="登録する" />
      　　　　　
    <input type="reset" name="btnReset" id="btnReset" value="クリア" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input type="button" onClick="location.href='<?php echo route('admin.category.rental.list'); ?>'" value="登録済みレンタル商品のカテゴリ一覧に戻る" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
{!! Form::close() !!}
@endsection