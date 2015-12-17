@extends('frontend')

@section('content')

<div id="breadcrumbs">
  <ul class="pan clear">
    <li><a href="<?php echo route('frontend.homepage'); ?>" title="TOP" class="now">TOP</a></li>
    <li>サイト内検索</li>
  </ul>
</div>　
<br/>
 @if(!empty($dataSearch))
        <div class="search-result" style="float:right;">You are searching 
            <strong> "{{Input::get('keyword')}}"</strong>, result: <strong>{{count($dataSearch)}} items</strong>.
        </div>
    @endif
    
<br/><br/>
<div id="resulSearch">
    <div class="inqInput">
          <table border="0" cellspacing="2" cellpadding="5" style="margin-left: 328px;">
            <tr>
              <th>1</th>
              <th>AAAAA</th>
              <th>BBBBB</th>
              <th>CCCCC</th>
            </tr>
            <tr>
              <td>2</td>
              <td>AAAAA</td>
              <td>BBBBB</td>
              <td>CCCCC</td>
            </tr>
            <tr>
              <td>3</td>
              <td>AAAAA</td>
              <td>BBBBB</td>
              <td>CCCCC</td>
            </tr>
            <tr>
              <td>4</td>
              <td>AAAAA</td>
              <td>BBBBB</td>
              <td>CCCCC</td>
            </tr>
            <tr>
              <td>5</td>
              <td>AAAAA</td>
              <td>BBBBB</td>
              <td>CCCCC</td>
            </tr>
            <tr>
              <td>6</td>
              <td>AAAAA</td>
              <td>BBBBB</td>
              <td>CCCCC</td>
            </tr>
          </table>
    </div>
 </div>

@endsection