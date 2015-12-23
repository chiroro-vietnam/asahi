<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理画面</title>
 @yield('style')
    {!! HTML::style('backend/css/style.css') !!}
    {!! HTML::style('backend/css/custom.css') !!}
    {!! HTML::script('backend/js/jquery-1.11.3.js') !!}
    {!! HTML::script('backend/js/jquery-ui.js') !!}
  
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="50%">
            @if(Auth::check())
              <input type="button" onClick="location.href='<?php echo route('admin.dashboard.index'); ?>'" value="管理者メニューへ" />
             @else
              &nbsp;
            @endif 
          </td>
          <td width="50%">&nbsp;</td>
          <td>
          @if (Auth::check())
            <input type="button" onClick="location.href='<?php echo route('admin.auth.logout'); ?>'" value="ログアウト" />
          @endif
              
          </td>
        </tr>
      </table>
      <hr noshade="noshade" />
<!-- begin content -->
    @yield('content')
<!-- end content -->
</body>
</html>
