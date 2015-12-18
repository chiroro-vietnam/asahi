@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品管理　＞　登録済み販売商品の一覧</td>
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
  {!! Form::open( ['method' => 'post', 'url' => 'admin/product/sell/', 'id' => 'frmCatSell', 'enctype'=>'multipart/form-data'] ) !!}
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td class="col3">カテゴリ</td>
        <td><select name="cat_sell" id="cat_sell">
                <option selected="selected" value="">▼選択</option>
          @if(count($csp) > 0) 
                @foreach($csp as $key => $cat)
                <option value="{{$key}}"
                        <?php if(isset($cs_id) && $cs_id == $key) echo 'selected='."selected" ;?> >{{$cat}}</option>                
                @endforeach
            @endif   
        </select>
          <input type="submit" name="btmSearchSP" id="btmSearchSP" value="表示" /></td>
      </tr>
    </table></td>
  </tr>
    {!! Form::close() !!}
  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td align="right">
        @if(!empty($cs_id))
        <input type="button" onClick="location.href='<?php echo url('admin/product/sell/add/'.$cs_id); ?>'" value="商品の新規登録" />
        @endif
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr class="col3">
        <td width="8%" align="center">削除</td>
        <td width="8%" align="center">表示</td>
        <td width="29%" align="center">商品名</td>
        <td width="29%" align="center">商品名（補助）</td>
        <td width="10%" align="center">詳細・編集</td>
        <td width="10%" colspan="4" align="center">表示順序</td>
    </tr>
    
      <?php 
              $display_arr = array('0' => '×', '1' => '○'); 
              $class_arr = array('0'=>'red', '1'=>'blue');
            ?>
            @if(isset($sp) && count($sp) > 0)
                <?php $total = count($sp); $pos=1;?>
                @foreach($sp as $val_sp)
                      <tr>
                            <td>
                                <a id="delRP" name="delRP" onclick="return confirm('Are you sure delete this item?');" href="<?php echo route('admin.product.rental.del', $val_sp->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                            </td>
                            <td align="center"><span class={{@$class_arr[$val_sp->display]}}>{{@$display_arr[$val_sp->display]}}</span></td>
                            <td>{{$val_sp->product_name}}</td>
                            <td>{{$val_sp->product_name_auxiliary}}</td>
                            <td><input type="button" onclick="location.href='<?php echo url('admin/product/sell/edit/'.$val_sp->id); ?>'" value="詳細・編集" /></td>
                          
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
                
                    </tr>
                    <?php $pos++; ?>
              @endforeach
            @else
              <tr>
                <td colspan="9"><center>No Data</center></td>  
              </tr>
            @endif
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 
</table>
@endsection