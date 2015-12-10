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
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <td class="col3">カテゴリ</td>
        <td><select name="select" id="select">
          <option selected="selected">▼選択</option>
          <option>配水ポリエチレン管融着工具</option>
        </select>
          <input type="submit" name="button3" id="button3" value="表示" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><input type="button" onClick="location.href='sell_product_regist.html'" value="商品の新規登録" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr class="col3">
        <td width="1%" align="center">削除</td>
        <td width="8%" align="center">表示</td>
        <td align="center">商品名</td>
        <td align="center">商品名（補助）</td>
        <td width="1%" align="center">詳細・編集</td>
        <td colspan="4" align="center">表示順序</td>
        </tr>
      <tr>
        <td><input type="button" onClick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>JWEF200-II</td>
        <td>EFコントローラ</td>
        <td><input type="button" onClick="location.href='rental_product_detail.html'" value="詳細・編集" /></td>
        <td width="1%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="1%"><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td width="1%"><input type="submit" name="button9" id="button9" value="LAST" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>EF2800iSE</td>
        <td>インバーター発電機</td>
        <td><input type="button" onclick="location.href='rental_product_detail.html'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>ハイパーソー150</td>
        <td>樹脂感ガイド付き</td>
        <td><input type="button" onclick="location.href='rental_product_detail.html'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>配水PE用手動穿孔機</td>
        <td>&nbsp;</td>
        <td><input type="button" onclick="location.href='rental_product_detail.html'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='rental_product_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="red">×</span></td>
        <td>配水PE用手動穿孔機</td>
        <td>&nbsp;</td>
        <td><input type="button" onclick="location.href='rental_product_detail.html'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection