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
    <td align="left">※商品管理でおすすめ商品として表示するにチェックが入っている商品のみを表示しております。<br />
※TOPページにおすすめ＜レンタル＞商品を●点まで表示することができます。<br /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr class="col3">
        <td width="1%" align="center">削除</td>
        <td align="center">商品名</td>
        <td align="center">商品名（補助）</td>
        <td width="4%" align="center">表示順序</td>
        </tr>
      <tr>
        <td><input type="button" onClick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>JWEF200-II</td>
        <td>EFコントローラ</td>
        <td><label for="textfield"></label>
          <input name="textfield" type="text" id="textfield" value="1 " size="5" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>転造ヘッド</td>
        <td>&nbsp;</td>
        <td><input name="textfield2" type="text" id="textfield2" value="2 " size="5" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>止水ボール</td>
        <td>&nbsp;</td>
        <td><input name="textfield3" type="text" id="textfield3" value="3 " size="5" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>配水PE用手動穿孔機</td>
        <td>配水PE用手動穿孔機</td>
        <td><input name="textfield4" type="text" id="textfield4" size="5" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>配水PE用手動穿孔機</td>
        <td>配水PE用手動穿孔機</td>
        <td><input name="textfield5" type="text" id="textfield5" size="5" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>配水PE用手動穿孔機</td>
        <td>配水PE用手動穿孔機</td>
        <td><input name="textfield6" type="text" id="textfield6" size="5" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td>配水PE用手動穿孔機</td>
        <td>配水PE用手動穿孔機</td>
        <td><input name="textfield7" type="text" id="textfield7" size="5" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="button" id="button" value="表示順序を更新する" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
@endsection

