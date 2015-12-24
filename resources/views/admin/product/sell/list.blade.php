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
  {!! Form::open( ['method' => 'post', 'url' => 'manage/product/sell/', 'id' => 'frmCatSell', 'enctype'=>'multipart/form-data'] ) !!}
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td class="col3">カテゴリ</td>
        <td><select name="cs_id" id="cs_id">
                <option selected="selected" value="">▼選択</option>
          @if(count($csp) > 0) 
                @foreach($csp as $cat)
                <option value="{{$cat->id}}"
                        <?php if(isset($cs_id) && $cs_id == $cat->id) echo 'selected='."selected" ;?> >{{$cat->name}}</option>                
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
        <input type="button" onClick="location.href='<?php echo route('admin.product.sell.add'); ?>'" value="商品の新規登録" />
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
            $display_arr = array('0' => '○', '1' => '×'); 
            $class_arr = array('0'=>'blue', '1'=>'red');
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
                            <td><input type="button" onclick="location.href='<?php echo url('manage/product/sell/edit/'.$val_sp->id); ?>'" value="詳細・編集" /></td>
                          
                        @if($total > 1)
                            <td align="center">@if($pos > 1)
                                <input class="btn-top" type="submit" name="btn-top" action="top" order="{{$val_sp->order}}" id="{{$val_sp->id}}" value="TOP" />                                
                                @else &nbsp; @endif</td>
                            <td align="center">@if($pos > 1)
                                <input class="btn-up" type="submit" name="btn-up" action="up" order="{{$val_sp->order}}" id="{{$val_sp->id}}" value="↑" />
                                @else &nbsp; @endif</td>

                            <td align="center">@if($pos < $total)
                                <input class="btn-down" type="submit" name="btn-down" action="down" order="{{$val_sp->order}}" id="{{$val_sp->id}}" value="↓" />
                                @else &nbsp; @endif</td>
                            <td align="center">@if($pos < $total)
                                <input class="btn-last" type="submit" name="btn-last" action="last" order="{{$val_sp->order}}" id="{{$val_sp->id}}" value="LAST" />
                                @else &nbsp; @endif</td>
                        @else
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>

                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
  <td>
        <div class="pull-right">
            <ul class="pagination">
            @if(isset($cs_id))
                    @if(count($sp) > 0)
                    {!! $sp->appends( ['cs_id' => $cs_id])->render() !!} 
                    @endif
                @else
                    @if(count($sp) > 0)
                    {!! $sp->render() !!} 
                    @endif
                @endif

            </ul>
        </div>
  </td>
  </tr>
</table>
<script type="text/javascript">
$(document ).ready(function() {
   $( ".btn-up" ).click(function(e) { 
       e.preventDefault();
        var url = window.location.href;        
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action');  
        var cs_id = $(this).attr('cs_id');
        orderSort(cs_id, id, order, action);
//        var $current = $(this).closest('tr.sort-record');
//        var $previous = $current.prev('tr.sort-record');
//        if($previous.length !== 0){
//          $current.insertBefore($previous);
//        }
        return false;
    });

    $( ".btn-down" ).click(function(e) {
        e.preventDefault();   
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action'); 
        var cs_id = $(this).attr('cs_id');
        orderSort(cs_id, id, order, action);        
//        var $current = $(this).closest('tr.sort-record');
//        var $next = $current.next('tr.sort-record');
//        if($next.length !== 0){
//          $current.insertAfter($next);
//        }        
        return false;
    });
    
    $( ".btn-top" ).click(function() {
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action');
        var cs_id = $(this).attr('cs_id');
        orderSort(cs_id, id, order, action);
        
//        var $current = $(this).closest('tr.sort-record');
//        var $first = $current.first('tr.sort-record');
//        if($first.length !== 0){
//          $current.insertBefore($first);
//        }
//        return false;
    });

    $( ".btn-last" ).click(function() {
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action');
        var cs_id = $(this).attr('cs_id');
        orderSort(cs_id, id, order, action);
        
//        var $current = $(this).closest('tr.sort-record');
//        var $last = $current.last('tr.sort-record');
//        if($last.length !== 0){
//          $current.insertAfter($last);
//      }
      return false;
    });
});
function orderSort(cs_id, id, order, action){
    var ref = "{{route('admin.product.sell.order')}}"; 
    $.ajax(
    {
        type : 'get',
        url : ref,
        data : 
        {
            'cs_id' : cs_id, 'id' : id,'order' : order,'action' : action
        },
        success : function(response)
        {
            window.location.reload(true);      
        },
        error: function(jqXHR, textStatus, errorThrown) {              
            console.log(textStatus, errorThrown);
        }
    });  
}

</script>
@endsection