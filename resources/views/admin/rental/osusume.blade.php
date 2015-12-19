@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■TOPページ掲載商品管理　＞　TOPページおすすめ＜レンタル＞商品の編集</td>
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
  {!! Form::open( ['method' => 'post', 'url' => 'admin/product/osusume-rental', 'enctype'=>'multipart/form-data'] ) !!}
  <tr>
    <td align="left">※商品管理でおすすめ商品として表示するにチェックが入っている商品のみを表示しております。<br />
※TOPページにおすすめ＜レンタル＞商品を●点まで表示することができます。<br /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr class="col3">
        <td width="10%" align="center">削除</td>
        <td width="40%" align="center">商品名</td>
        <td width="40%" align="center">商品名（補助）</td>
        <td width="10%" align="center">表示順序</td>
      </tr>
      
      @if(count($lrp) > 0)
        @foreach($lrp as $rp)
            <tr>
                <td align="center">                   
                    <a id="delRP" name="delRP" onclick="return confirm('Are you sure delete this item?');" href="<?php echo url('admin/product/osusume-rental/del/'.$rp->id); ?>" class="btn btn-default btn-sm" role="button">削除</a>
                <td>{{$rp->product_name}}</td>
                <td>{{$rp->product_name_auxiliary}}</td>
                <td align="center">
                  <input style="text-align:center" name="order_{{$rp->id}}" type="text" id="order_{{$rp->id}}" value="{{$rp->order}}" size="5" />
                </td>
            </tr>

        @endforeach
      @else
        <tr>
            <td colspan="4"><center>NO DATA</center></td>
        
        </tr>
      <tr>
      @endif      
    </table></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="button" id="button" value="表示順序を更新する" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
      <td>
          <div class="pull-right">
            <ul class="pagination">
                @if(count($lrp) > 0)
                {!! $lrp->render() !!} 
                @endif
            </ul>
        </div>
     </td>
  </tr>
  
</table>

  {!! Form::close() !!}
@endsection

