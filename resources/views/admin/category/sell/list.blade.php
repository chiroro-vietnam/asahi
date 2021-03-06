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
	@elseif($message = Session::get('error'))
            <div class="alert alert-danger">
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
            <td width="6%" align="center">削除</td>
            <td width="6%" align="center">表示</td>
            <td width="25%" align="center">カテゴリ名</td>
            <td width="7%" align="center">詳細・編集</td>
            <td  width="20%" colspan="4" align="center">表示順序</td>
            <td  width="7%" align="center">カテゴリ内商品管理</td>
        </tr>
        <?php 
          $display_arr = array('0' => '○', '1' => '×'); 
          $class_arr = array('0'=>'blue', '1'=>'red');
        ?>
        @if(isset($cat_sell) && count($cat_sell) > 0)
        <?php $total = count($cat_sell); $pos = 1;?>
          @foreach($cat_sell as $cat)
            <tr>
                <td>
                    <a id="delCatSell" name="delCatSell" onclick="return confirm('あなたはこれを削除してもよろしいですか。');" href="<?php echo url('manage/category/sell/del/'.$cat->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                </td>
                <td align="center"><span class={{@$class_arr[$cat->display]}}>{{@$display_arr[$cat->display]}}</span></td>
                <td>{{$cat->name}}</td>
                <td><input type="button" onclick="location.href='<?php echo url('manage/category/sell/edit/'.$cat->id); ?>'" value="詳細・編集" /></td>
                @if($total > 1)
                    <td align="center">@if($pos > 1)
                        <input class="btn-top" type="button" name="btn-top" action="top" order="{{$cat->order}}" id="{{$cat->id}}" value="TOP" />                                
                        @else &nbsp; @endif</td>
                    <td align="center">@if($pos > 1)
                        <input class="btn-up" type="button" name="btn-up" action="up" order="{{$cat->order}}" id="{{$cat->id}}" value="↑" />
                        @else &nbsp; @endif</td>

                    <td align="center">@if($pos < $total)
                        <input class="btn-down" type="button" name="btn-down" action="down" order="{{$cat->order}}" id="{{$cat->id}}" value="↓" />
                        @else &nbsp; @endif</td>
                    <td align="center">@if($pos < $total)
                        <input class="btn-last" type="button" name="btn-last" action="last" order="{{$cat->order}}" id="{{$cat->id}}" value="LAST" />
                        @else &nbsp; @endif</td>
                @else
                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>

                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                @endif     
                <td><input type="button" onclick="location.href='<?php echo url('manage/product/sell/?cs_id='.$cat->id); ?>'" value="カテゴリ内商品管理" /></td>
          </tr>
          <?php $pos++;?>
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
                {!! $cat_sell->render() !!}          
            </ul>
        </div>
      </td>
  </tr>
</table> 
    

{!! Form::close() !!}
<script type="text/javascript">
$(document ).ready(function() {
   $( ".btn-up" ).click(function(e) { 
       e.preventDefault();
        var url = window.location.href;        
        var id = $(this).attr('id');
        var order = $(this).attr('order');
        var action = $(this).attr('action');       
        orderSort(id, order, action);
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
        orderSort(id, order, action);        
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
        orderSort(id, order, action);
        
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
        orderSort(id, order, action);
        
//        var $current = $(this).closest('tr.sort-record');
//        var $last = $current.last('tr.sort-record');
//        if($last.length !== 0){
//          $current.insertAfter($last);
//      }
      return false;
    });
});
function orderSort(id, order, action){
    var ref = "{{route('admin.category.sell.order')}}"; 
    $.ajax(
    {
        type : 'get',
        url : ref,
        data : 
        {
            'id' : id,'order' : order,'action' : action
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
