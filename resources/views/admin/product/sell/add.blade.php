@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■販売商品管理　＞　販売商品の新規登録</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td class="col3">表示種別<span class="notnull">[*]</span></td>
          <td><input type="radio" name="radio" id="radio" value="radio" />
            詳細画面タイプ<br />
            <input type="radio" name="radio2" id="radio2" value="radio2" />
            リンクタイプ<br />
            <input type="radio" name="radio3" id="radio3" value="radio3" />
            ファイルタイプ</td>
        </tr>
        <tr>
          <td width="20%" class="col3">カテゴリ</td>
          <td>配水ポリエチレン管融着工具</td>
        </tr>
        <tr>
          <td width="20%" class="col3">商品名 <span class="notnull">[*]</span></td>
          <td><input name="textfield10" type="text" id="textfield10" size="60" /></td>
        </tr>
        <tr>
          <td width="20%" class="col3">商品名（補助用語）</td>
          <td><input name="textfield3" type="text" id="textfield3" size="60" /></td>
        </tr>
        <tr>
          <td width="20%" class="col3">キャッチコピー</td>
          <td><textarea name="textfield11" cols="60" rows="2" id="textfield11"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" class="col2">●&nbsp;詳細画面タイプ</td>
        </tr>
        <tr>
          <td width="20%" class="col3">概要</td>
          <td><textarea name="textfield12" cols="60" rows="3" id="textfield12"></textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">セット内容</td>
          <td><textarea name="textfield13" cols="60" rows="5" id="textfield13"></textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">注釈</td>
          <td><textarea name="textfield14" cols="60" rows="2" id="textfield14"></textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">写真-1</td>
          <td><input type="file" name="textfield19" id="textfield19" /></td>
        </tr>
        <tr>
          <td width="20%" class="col3">写真-2</td>
          <td><input type="file" name="textfield15" id="textfield15" /></td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼料金</td>
        </tr>
        <tr>
          <td width="20%" class="col3">料金の表示 <span class="notnull">[*]</span></td>
          <td><input name="radio" type="radio" id="radio" value="radio" checked="checked" />
            する（以下を埋めてください）<br />
            <input type="radio" name="radio2" id="radio2" value="radio2" />
            しない（「価格はお問い合わせください」を表示します）</td>
        </tr>
        <tr>
          <td width="20%" class="col3">販売価格</td>
          <td><input type="text" name="textfield16" id="textfield16" />
            円（税別）</td>
        </tr>
        <tr>
          <td width="20%" class="col3">価格注釈</td>
          <td><textarea name="textfield4" cols="60" rows="2" id="textfield4"></textarea></td>
        </tr>
        <tr>
          <td width="20%" class="col3">表組み</td>
          <td><table width="100%" cellspacing="0" cellpadding="5">
              <tr>
                <td bgcolor="#999999"><input name="textfield" type="text" id="textfield" size="60" /></td>
              </tr>
            </table>
            <img src="WYSWIG.png" width="724" height="377" /><!--<table width="100%" border="1" cellspacing="0" cellpadding="5">
          <tr>
            <td colspan="4" bgcolor="#999999"><input name="textfield" type="text" id="textfield" size="60" /></td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC"><input name="textfield2" type="text" id="textfield2" size="20" /></td>
            <td bgcolor="#CCCCCC"><input name="textfield2" type="text" id="textfield2" size="20" /></td>
            <td bgcolor="#CCCCCC"><input name="textfield2" type="text" id="textfield2" size="20" /></td>
            <td bgcolor="#CCCCCC"><input name="textfield2" type="text" id="textfield2" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield20" type="text" id="textfield20" size="20" /></td>
            <td><input name="textfield20" type="text" id="textfield20" size="20" /></td>
            <td><input name="textfield20" type="text" id="textfield20" size="20" /></td>
            <td><input name="textfield20" type="text" id="textfield20" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield21" type="text" id="textfield21" size="20" /></td>
            <td><input name="textfield21" type="text" id="textfield21" size="20" /></td>
            <td><input name="textfield21" type="text" id="textfield21" size="20" /></td>
            <td><input name="textfield21" type="text" id="textfield21" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield22" type="text" id="textfield22" size="20" /></td>
            <td><input name="textfield22" type="text" id="textfield22" size="20" /></td>
            <td><input name="textfield22" type="text" id="textfield22" size="20" /></td>
            <td><input name="textfield22" type="text" id="textfield22" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            <td><input name="textfield23" type="text" id="textfield23" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            <td><input name="textfield24" type="text" id="textfield24" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            <td><input name="textfield25" type="text" id="textfield25" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            </tr>
          <tr>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            <td><input name="textfield26" type="text" id="textfield26" size="20" /></td>
            </tr>
          </table>--></td>
        </tr>
        <tr>
          <td colspan="2" class="col2">●リンクタイプ</td>
        </tr>
        <tr>
          <td class="col3">URL <span class="notnull">[*]</span></td>
          <td><input name="textfield13" type="text" id="textfield13" size="50" />
            <input type="checkbox" name="checkbox3" id="checkbox3" />
            新しいウィンドウを開いて表示する <br />
            入力例） http://www.yahoo.co.jp</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">●&nbsp;ファイルタイプ</td>
        </tr>
        <tr>
          <td class="col3">ファイル <span class="notnull">[*]</span></td>
          <td><input type="file" name="textfield14" id="textfield14" />
            <br />
            ※容量2MBまで</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼トップページ／おすすめ＜販売＞商品</td>
        </tr>
        <tr>
          <td class="col3">表示設定</td>
          <td><input type="checkbox" name="checkbox2" id="checkbox2" />
            おすすめの＜販売＞商品として表示する</td>
        </tr>
        <tr>
          <td colspan="2" class="col2">▼表示</td>
        </tr>
        <tr>
          <td class="col3">表示設定</td>
          <td><input type="checkbox" name="checkbox" id="checkbox" />
            一時的に一般側画面へ表示しない</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="button" id="button" value="登録する" />
      <input type="reset" name="button2" id="button2" value="クリア" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input type="button" onClick="location.href='sell_product_list.html'" value="登録済み販売商品一覧に戻る" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
@endsection