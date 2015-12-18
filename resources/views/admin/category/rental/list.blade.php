@extends('backend')
@section('content')
{!! Form::open( ['method' => 'post', 'route' => 'admin.category.rental.list'] ) !!}

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■レンタル商品カテゴリ管理　＞　登録済みレンタル商品のカテゴリ一覧</td>
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
    <td align="right"><input type="button" onclick="window.location.href='<?php echo route('admin.category.rental.add'); ?>';" value="カテゴリの新規登録" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr class="col3">
        <td width="6%" align="center">削除</td>
        <td width="6%" align="center">表示</td>
        <td width="25%" align="center">カテゴリ名</td>
        <td width="7%" align="center">詳細・編集</td>
        <td width="20%" colspan="4" align="center">表示順序</td>
        <td width="7%" align="center">カテゴリ内商品管理</td>
        </tr>
        <?php 
          $display_arr = array('0' => '×', '1' => '○'); 
          $class_arr = array('0'=>'red', '1'=>'blue');
        ?>
        @if(isset($cat_rental) && count($cat_rental) > 0)
        <?php $total = count($cat_rental); $pos = 1; echo $total;?>
          @foreach($cat_rental as $cat)
            <tr>
                <td>
                    <a id="delRental" name="delRental" onclick="return confirm('Are you sure delete this item?');" href="<?php echo route('admin.category.rental.del', $cat->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                </td>
                <td align="center"><span class={{@$class_arr[$cat->display]}}>{{@$display_arr[$cat->display]}}</span></td>
                <td>{{$cat->name}}</td>
                <td><input type="button" onclick="location.href='<?php echo url('admin/category/rental/edit/'.$cat->id); ?>'" value="詳細・編集" /></td>
                @if($total > 1)
                    <td align="center">@if($pos > 1)<input type="submit" name="top" id="top" value="TOP" />@else &nbsp; @endif</td>
                    <td align="center">@if($pos > 1)<input type="submit" name="up" id="up" value="↑" />@else &nbsp; @endif</td>

                    <td align="center">@if($pos < $total)<input type="submit" name="down" id="down" value="↓" />@else &nbsp; @endif</td>
                    <td align="center">@if($pos < $total)<input type="submit" name="last" id="last" value="LAST" />@else &nbsp; @endif</td>
                @else
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>

                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                @endif
                <td><input type="button" onclick="location.href='<?php echo url('admin/product/rental/?cr_id='.$cat->id); ?>'" value="カテゴリ内商品管理" /></td>
          </tr>
          <?php $pos++; ?>
          @endforeach
        @else
          <tr>
            <td colspan="9"><center>No Data</center></td>  
          </tr>
        @endif 
        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td>
         <div class="pull-right">
            <ul class="pagination">
                {!! $cat_rental->render() !!}          
            </ul>
        </div>
      </td>
  </tr>
</table> 
{!! Form::close() !!}
  
@endsection
