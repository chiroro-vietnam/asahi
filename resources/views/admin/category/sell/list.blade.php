@extends('backend')
@section('content')
{!! Form::open( ['method' => 'post', 'route' => 'admin.category.sell.list'] ) !!}

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品カテゴリ管理　＞　登録済み販売商品のカテゴリ一覧</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                    <li>{{ $message }}</li>
            </div>
	@endif
      </td>
  </tr>
  <tr>
    <td align="right"><input type="button" onclick="window.location.href='<?php echo route('admin.category.sell.add'); ?>';" value="カテゴリの新規登録" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr class="col3">
            <td width="5%" align="center">削除</td>
            <td width="6%" align="center">表示</td>
            <td width="37%" align="center">カテゴリ名</td>
            <td width="10%" align="center">詳細・編集</td>
            <td  width="10%" colspan="4" align="center">表示順序</td>
            <td  width="12%" align="center">カテゴリ内商品管理</td>
        </tr>
        <?php 
          $display_arr = array('0' => '×', '1' => '○'); 
          $class_arr = array('0'=>'red', '1'=>'blue');
        ?>
        @if(count($cat_sell) > 0)
          @foreach($cat_sell as $cat)
            <tr>
                <td>
                    <a id="delCatSell" name="delCatSell" onclick="return confirm('Are you sure delete this item?');" href="<?php echo url('admin/category/sell/del/'.$cat->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                </td>
                <td align="center"><span class={{@$class_arr[$cat->display]}}>{{@$display_arr[$cat->display]}}</span></td>
                <td>{{$cat->name}}</td>
                <td><input type="button" onclick="location.href='<?php echo url('admin/category/sell/edit/'.$cat->id); ?>'" value="詳細・編集" /></td>
                <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
                <td><input type="submit" name="button7" id="button7" value="↑" /></td>
                <td><input type="submit" name="button8" id="button8" value="↓" /></td>
                <td><input type="submit" name="button4" id="button4" value="LAST" /></td>
                <td><input type="button" onclick="location.href='<?php echo url('admin/product/sell/?cr_id='.$cat->id); ?>'" value="カテゴリ内商品管理" /></td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="9"><center>No Data</center></td>  
          </tr>
        @endif

      <!--<tr>
        <td><input type="button" onclick="location.href='rental_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="red">×</span></td>
        <td>その他</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.product.sell.list'); ?>'" value="カテゴリ内商品管理" /></td>
      </tr>-->
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td>
          <div class="pull-right">
            <ul class="pagination">
                {!! $cat_sell->render() !!}          
            </ul>
        </div>
      </td>
  </tr>
</table> 
    

{!! Form::close() !!}
  
@endsection
