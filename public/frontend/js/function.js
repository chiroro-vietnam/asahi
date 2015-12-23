jQuery(function() {

//scroll-------------------------------------------------
  jQuery('a[href*=#]').click(function() {		
      var $target = jQuery(this.hash);
      $target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        jQuery((navigator.userAgent.indexOf("Opera") != -1) ? document.compatMode == 'BackCompat' ? 'body' : 'html' :'html,body').animate({scrollTop: targetOffset}, 1000);
       return false;
      }

  });

//pagetop-------------------------------------------------
	 var topBtn = jQuery('#pagetop');	
	 topBtn.hide();
	 jQuery(window).scroll(function () {
		  if (jQuery(this).scrollTop() > 100) {
			   topBtn.fadeIn();
		  } else {
			   topBtn.fadeOut();
		  }
	 });
  topBtn.click(function () {
		  jQuery('body,html').animate({
			   scrollTop: 0
		    }, 1000);
		    return false;
  });

//pan-------------------------------------------------
  jQuery('.pan li:not(:last)').append('&gt;');

//accordion-------------------------------------------------
(function($){
var flag = false;
  $('.subMenu').on('click' , '.acrd-ctrl', function(e){
    e.preventDefault();
 

$('.item-detail').click(function() {
  flag = true;
  window.location.href = $(this).attr('href');
 });
 if(flag == false)
 {
    // 現在のアイコン状態で＋にするか−にするか判定
    if($(this).children('a').is('.now')){
      // ＋アイコンに変更
      $(this).children('a')
        .removeClass()
    }else{
      // −アイコンに変更
      $(this).children('a')
        .removeClass()
        .addClass('now');
    }

    // クリックしたリストの開閉
    $(this)
      .children('.acrd-pl')
      .slideToggle();
 }
});

})(jQuery);
	
//fsc-------------------------------------------------
(function($){

        $(function(){
                fontsizeChange();
        });

        function fontsizeChange(){

                var changeArea = $("body,.listTitle,.listName,.listDetail,.pan,.ht_wrap,.acrd-ctrl,#textNavi .main,.address,.copy,.dtl_left,.dtl_right,.di_text,#brand_maker_list");                      //フォントサイズ変更エリア
                var btnArea = $(".ht_fsize");                           //フォントサイズ変更ボタンエリア
                var changeBtn = btnArea.find(".fchgBtn");     //フォントサイズ変更ボタン
                var fontSize = [100,116];                           //フォントサイズ（HTMLと同じ並び順、幾つでもOK、単位は％）
                var ovStr = "_ov";                                                      //ロールオーバー画像ファイル末尾追加文字列（ロールオーバー画像を使用しない場合は値を空にする）
                var activeClass = "active";                                     //フォントサイズ変更ボタンのアクティブ時のクラス名
                var defaultSize = 0;                                            //初期フォントサイズ設定（HTMLと同じ並び順で0から数値を設定）
                var cookieExpires = 7;                                          //クッキー保存期間
                var sizeLen = fontSize.length;
                var useImg = ovStr!="" && changeBtn.is("[src]");

                //現在クッキー確認関数
                function nowCookie(){
                        return $.cookie("fontsize");
                }

                //画像切替関数
                function imgChange(elm1,elm2,str1,str2){
                        elm1.attr("src",elm2.attr("src").replace(new RegExp("^(\.+)"+str1+"(\\.[a-z]+)$"),"$1"+str2+"$2"));
                }

                //マウスアウト関数
                function mouseOut(){
                        for(var i=0; i<sizeLen; i++){
                                if(nowCookie()!=fontSize[i]){
                                        imgChange(changeBtn.eq(i),changeBtn.eq(i),ovStr,"");
                                }
                        }
                }

                //フォントサイズ設定関数
                function sizeChange(){
                        changeArea.css({fontSize:nowCookie()+"%"});
                }

                //クッキー設定関数
                function cookieSet(index){
                        $.cookie("fontsize",fontSize[index],{path:'/',expires:cookieExpires});
                }

                //初期表示
                if(nowCookie()){
                        for(var i=0; i<sizeLen; i++){
                                if(nowCookie()==fontSize[i]){
                                        sizeChange();
                                        var elm = changeBtn.eq(i);
                                        if(useImg){
                                                imgChange(elm,elm,"",ovStr);
                                        }
                                        elm.addClass(activeClass);
                                        break;
                                }
                        }
                }
                else {
                        cookieSet(defaultSize);
                        sizeChange();
                        var elm = changeBtn.eq(defaultSize);
                        if(useImg){
                                imgChange(elm,elm,"",ovStr);
                                imgChange($("<img>"),elm,"",ovStr);
                        }
                        elm.addClass(activeClass);
                }

                //ホバーイベント（画像タイプ）
                if(useImg){
                        changeBtn.each(function(i){
                                var self = $(this);
                                self.hover(
                                function(){
                                        if(nowCookie()!=fontSize[i]){
                                                imgChange(self,self,"",ovStr);
                                        }
                                },
                                function(){
                                        mouseOut();
                                });
                        });
                }

                //クリックイベント
                changeBtn.click(function(){
                        var index = changeBtn.index(this);
                        var self = $(this);
                        cookieSet(index);
                        sizeChange();
                        if(useImg){
                                mouseOut();
                        }
                        if(!self.hasClass(activeClass)){
                                changeBtn.not(this).removeClass(activeClass);
                                self.addClass(activeClass);
                        }
                });

        }

})(jQuery);


// subMenu(tab)------------------------------------
$(function() {
    //クリックしたときのファンクションをまとめて指定
    $('.tab li').click(function() {

        //.index()を使いクリックされたタブが何番目かを調べ、
        //indexという変数に代入します。
        var index = $('.tab li').index(this);

         //コンテンツを一度すべて非表示にし、
        $('.tab_content').children('li').css('display','none');
//        $('.content').children('li').fadeOut();

        //クリックされたタブと同じ順番のコンテンツを表示します。
//        $('.content').children('li').eq(index).css('display','block');
        $('.tab_content').children('li').eq(index).fadeIn("slow");

        //一度タブについているクラスselectを消し、
        $('.tab li').removeClass('select');

        //クリックされたタブのみにクラスselectをつけます。
        $(this).addClass('select')
    });
});
	

});