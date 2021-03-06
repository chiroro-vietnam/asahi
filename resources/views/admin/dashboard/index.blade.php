@extends('backend')

@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td class="col1">■管理者メニュー</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="col2">▼レンタル商品管理</td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.product.rental.list'); ?>">商品一覧／新規登録／変更／削除</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="col2">▼販売商品管理</td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.product.sell.list'); ?>">商品一覧／新規登録／変更／削除</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="col2">▼カテゴリ管理</td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.category.rental.list'); ?>">＜レンタル＞カテゴリ一覧／新規登録／変更／削除</a></td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.category.sell.list'); ?>">＜販売＞カテゴリ一覧／新規登録／変更／削除</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="col2">▼TOPページ掲載商品管理</td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.rental.osusume'); ?>">TOPページ/おすすめ＜レンタル＞商品の編集</a></td>
  </tr>
  <tr>
    <td>　●<a href="<?php echo route('admin.sell.osusume'); ?>">TOPページ/おすすめ＜販売＞商品の編集</a></td>
  </tr>
</table>
@endsection

