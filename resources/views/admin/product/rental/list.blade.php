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
        <input type="hidden" name="cr_id" id="cr_id" value="{{$cr_id}}" />
        <input type="hidden" name="url" id="url" value="{{url('admin/product/rental?cr_id='.$cr_id)}}" />
        @endif
    </td>
  </tr>
  <tr>
    <td>
        <table id="tblSort" width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr class="col3">
            <td width="8%" align="center">削除</td>
            <td width="5%" align="center">表示</td>
            <td width="28%"align="center">商品名</td>
            <td width="28%" align="center">商品名（補助）</td>
            <td width="10%" align="center">詳細・編集</td>
            <td width="20%" colspan="4" align="center">表示順序</td>
        </tr>
            <?php 
              $display_arr = array('0' => '×', '1' => '○'); 
              $class_arr = array('0'=>'red', '1'=>'blue');
            ?>
            @if(isset($rp) && count($rp) > 0)            
                <?php $total = count($rp); $pos = 1;?>
                @foreach($rp as $val_rp)
                
                <div id="sort-order">
                    <tr class="sort-record">                        
                            <input type="hidden" name="sortId" id="sortId" value="{{$val_rp->id}}" />
                            <input type="hidden" name="sortOder" id="sortOder" value="{{$val_rp->order}}" />
                            
                            <td width="5%">
                                <a id="delRP" name="delRP" onclick="return confirm('Are you sure delete this item?');" href="<?php echo route('admin.product.rental.del', $val_rp->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                            </td>
                            <td width="8%" align="center"><span class={{@$class_arr[$val_rp->display]}}>{{@$display_arr[$val_rp->display]}}</span></td>
                            <td>{{$val_rp->product_name}}</td>
                            <td>{{$val_rp->product_name_auxiliary}}</td>
                            <td width="10%"><input type="button" onclick="location.href='<?php echo route('admin.product.rental.edit', $val_rp->id); ?>'" value="詳細・編集" /></td>

                        @if($total > 1)
                            <td align="center">@if($pos > 1)
                                <input class="btn-top" type="submit" name="btn-top" action="top" order="{{$val_rp->order}}" id="{{$val_rp->id}}" value="TOP" />                                
                                @else &nbsp; @endif</td>
                            <td align="center">@if($pos > 1)
                                <input class="btn-up" type="submit" name="btn-up" action="up" order="{{$val_rp->order}}" id="{{$val_rp->id}}" value="↑" />
                                @else &nbsp; @endif</td>

                            <td align="center">@if($pos < $total)
                                <input class="btn-down" type="submit" name="btn-down" action="down" order="{{$val_rp->order}}" id="{{$val_rp->id}}" value="↓" />
                                @else &nbsp; @endif</td>
                            <td align="center">@if($pos < $total)
                                <input class="btn-last" type="submit" name="btn-last" action="last" order="{{$val_rp->order}}" id="{{$val_rp->id}}" value="LAST" />
                                @else &nbsp; @endif</td>
                        @else
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>

                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        @endif                                        

                    </tr>
                </div>
                    <?php $pos++; ?>
              @endforeach
            @else
              <tr>
                <td colspan="9"><center>No Data</center></td>  
              </tr>
            @endif

        </table> 
<!--       table sort-->
    </td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <?php } ?>
    <tr>
      <td>
         <div class="pull-right">
            <ul class="pagination">
                @if(isset($cr_id))
                    @if(count($rp) > 0)
                    {!! $rp->appends( ['cr_id' => $cr_id])->render() !!} 
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
        //var url = window.location.href;        
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action');  
        var cr_id = $(this).attr('cr_id');
        orderSort(cr_id, id, order, action);
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
        var cr_id = $(this).attr('cr_id');
        orderSort(cr_id, id, order, action);        
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
        var cr_id = $(this).attr('cr_id');
        orderSort(cr_id, id, order, action);
        
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
        var cr_id = $(this).attr('cr_id');
        orderSort(cr_id, id, order, action);
        
//        var $current = $(this).closest('tr.sort-record');
//        var $last = $current.last('tr.sort-record');
//        if($last.length !== 0){
//          $current.insertAfter($last);
//      }
      return false;
    });
});
function orderSort(cr_id, id, order, action){
    var ref = "{{route('admin.product.rental.order')}}"; 
    $.ajax(
    {
        type : 'get',
        url : ref,
        data : 
        {
            'csr_id' : cr_id, 'id' : id,'order' : order,'action' : action
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