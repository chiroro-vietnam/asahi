@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品カテゴリ管理　＞　登録済み販売商品のカテゴリ一覧</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><input type="button" onClick="location.href='<?php echo route('admin.category.sell.add'); ?>'" value="カテゴリの新規登録" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr class="col3">
        <td width="1%" align="center">削除</td>
        <td width="8%" align="center">表示</td>
        <td align="center">カテゴリ名</td>
        <td width="1%" align="center">詳細・編集</td>
        <td colspan="4" align="center">表示順序</td>
        <td align="center">カテゴリ内商品管理</td>
        </tr>
      <tr>
        <td><input type="button" onClick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>発電機</td>
        <td><input type="button" onClick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td width="1%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="1%"><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td width="1%"><input type="submit" name="button2" id="button2" value="LAST" /></td>
        <td width="1%"><input type="button" onClick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
      </tr>
      <tr>
        <td><input type="button" onClick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>配水ポリエチレン管融着工具</td>
        <td><input type="button" onClick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td width="1%"><input type="submit" name="button" id="button" value="TOP" /></td>
        <td width="1%"><input type="submit" name="button3" id="button3" value="↑" /></td>
        <td width="1%"><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td width="1%"><input type="submit" name="button2" id="button2" value="LAST" /></td>
        <td width="1%"><input type="button" onClick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>鋳鉄管加工機</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button4" id="button4" value="LAST" /></td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>パイプ挿入機</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button5" id="button5" value="LAST" /></td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>塩ビパイプ挿入機</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>漏水探知機</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
        </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="blue">○</span></td>
        <td>各種テスト用機器</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td><input type="submit" name="button8" id="button8" value="↓" /></td>
        <td><input type="submit" name="button9" id="button9" value="LAST" /></td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
      </tr>
      <tr>
        <td><input type="button" onclick="location.href='sell_cat_delete_check.html'" value="削除" /></td>
        <td align="center"><span class="red">×</span></td>
        <td>その他</td>
        <td><input type="button" onclick="location.href='<?php echo route('admin.category.sell.edit'); ?>'" value="詳細・編集" /></td>
        <td><input type="submit" name="button6" id="button6" value="TOP" /></td>
        <td><input type="submit" name="button7" id="button7" value="↑" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="button" onclick="location.href='sell_product_list.html'" value="カテゴリ内商品管理" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection