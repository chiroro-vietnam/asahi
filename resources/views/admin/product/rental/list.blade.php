@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■レンタル商品管理　＞　登録済みレンタル商品の一覧</td>
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
 {!! Form::open( ['method' => 'post', 'url' => 'admin/product/rental/', 'id' => 'frmCatRental', 'enctype'=>'multipart/form-data'] ) !!}
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td class="col3">カテゴリ</td>
        <td><select name="cat_rental" id="cat_rental">
                <option value="" selected="selected">▼選択</option>          
            @if(count($crs) > 0) 
                @foreach($crs as $key => $cat)
                <option value="{{$key}}"
                        <?php if(isset($cr_id) && $cr_id == $key) echo 'selected='."selected" ;?> >{{$cat}}</option>                
                @endforeach
            @endif          
        </select>
          <input type="submit" name="btmSearchRT" id="btmSearchRT" value="表示" /></td>
      </tr>
    </table></td>
  </tr>
  {!! Form::close() !!}
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <?php if(isset($rp)) {?>
  <tr>
    <td align="right">
        @if(!empty($cr_id))
        <input type="button" onClick="location.href='<?php echo url('admin/product/rental/add/'.$cr_id); ?>'" value="商品の新規登録" />
        @endif
    </td>
  </tr>
  <tr>
    <td>
        <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr class="col3">
            <td width="5%" align="center">削除</td>
            <td width="5%" align="center">表示</td>
            <td width="30%"align="center">商品名</td>
            <td width="30%" align="center">商品名（補助）</td>
            <td width="10%" align="center">詳細・編集</td>
            <td width="20%" colspan="4" align="center">表示順序</td>
        </tr>
            <?php 
              $display_arr = array('0' => '×', '1' => '○'); 
              $class_arr = array('0'=>'red', '1'=>'blue');
            ?>
            @if(isset($rp) && count($rp) > 0)
                @foreach($rp as $val_rp)
                      <tr>
                          <td width="5%">
                              <a id="delRP" name="delRP" onclick="return confirm('Are you sure delete this item?');" href="<?php echo route('admin.product.rental.del', $val_rp->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                          </td>
                          <td  width="8%" align="center"><span class={{@$class_arr[$val_rp->display]}}>{{@$display_arr[$val_rp->display]}}</span></td>
                          <td>{{$val_rp->product_name}}</td>
                          <td>{{$val_rp->product_name_auxiliary}}</td>
                          <td width="10%"><input type="button" onclick="location.href='<?php echo route('admin.product.rental.edit', $val_rp->id); ?>'" value="詳細・編集" /></td>
                          <td align="center"><input type="submit" name="button6" id="button6" value="TOP" /></td>
                          <td align="center"><input type="submit" name="button7" id="button7" value="↑" /></td>
                          <td align="center"><input type="submit" name="button8" id="button8" value="↓" /></td>
                          <td align="center"><input type="submit" name="button4" id="button4" value="LAST" /></td>                      
                    </tr>
              @endforeach
            @else
              <tr>
                <td colspan="9"><center>No Data</center></td>  
              </tr>
            @endif

        </table>
    </td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
  
</table>
@endsection