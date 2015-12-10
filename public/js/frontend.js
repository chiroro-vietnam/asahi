$(document).ready(function(){
	$("#myTab a").click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});
});

$(window).load(function() {
	$('.slide').myelinSlider({
		mode : 'fade',
		direction : 'up',
		auto : true,
		speed : 3000
	});
});


$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});

$(document).ready(function() {
	//Default Action
	$("ul.tabs li").removeClass("active");
	$(".tab_content").hide(); //Hide all content
	if($("ul.tabs li:last").attr('tab_cur')=='active'){
		$("ul.tabs li:first").removeClass("active");
		$("ul.tabs li:last").addClass("active").show(); //Activate first tab
		$(".tab_content:last").show(); //Show first tab content
	} else {
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
	}


	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
});

$(document).ready(function() {    
    $(window).scroll(function(){
	    if($(this).scrollTop()!=0){
	        $('#bttop').fadeIn();
	    }else{
	        $('#bttop').fadeOut();
	    }
	});
    $('#bttop').click(function(){
        $('body,html').animate({scrollTop:0},800);
    });
});


$(function() {
	var $sidebar   = $(".adv"),
		$window    = $(window),
		offset     = $sidebar.offset(),
		offset2    = $(".content-main").offset(),
		topPadding = 15;
		
	var elem = $('.adv');
	var connect_main = $('.content-main');
	
	var ads_height = $('.right-main').height();
	if ($('.left-main').height() > ads_height){
		ads_height = $('.left-main').height();
	}

	$window.scroll(function() {
		if ($window.scrollTop() > offset.top){
			if (connect_main.outerHeight() + connect_main.offset().top > $window.scrollTop() + ads_height + 60){
				$sidebar.stop().animate({
					marginTop: $window.scrollTop() - offset.top + topPadding
				});		
			}
		}else{
			$sidebar.stop().animate({
				marginTop: 0
			});	
		}
	});
});


$(window).load(function() {
	$('.slide').myelinSlider({
		mode : 'fade',
		direction : 'up',
		auto : true,
		speed : 3000
	});
});


//slideshow detail real
$(function() {
    var galleries = $('.ad-gallery').adGallery({
        effect: 'fade'
    });
});


//show hidden comment
$(document).ready(function() {
    $(".show-comment").click(function() {
        $(".related-articles-comment").slideToggle("slow");
    });
});


$(document).ready(function() {
	$(".mouseWheelButtons .carousel").jCarouselLite({
	    btnNext: ".mouseWheelButtons .next",
	    btnPrev: ".mouseWheelButtons .prev",
	    mouseWheel: true,
	    auto: 3000,
	    speed: 3000,
	    visible: 1,
	    width: 300,
	    hoverPause: true,
	    //easing: "easeOutBounce",
	});
});


$( document ).ready(function(){
	//if sub2 have child, will font weight bold
	$('.menu-top-inner li').find('ul.sub3').each(function(){
		if($(this).length != 0){
			$(this).prev().css('font-weight', 'bold')
		}
	});

	//if sub2 have child, will font weight bold but != travel
	$('#category91 ul li a').css('font-weight', 'normal');


	$('.menu-top-inner li').hover(function(){
		// $(this).find('ul.sub1').addClass('test');

		var is_add = false;
		$(this).find('ul.sub1 > li').each(function(){
			var style = $(this).attr("style");
			if (style != null && style.length > 1){
				is_add  = true;
			}
		});
		if (is_add){
			return true;
		}

		//set max width
		var max_width = 0;
		var total_sub = 0;
		var obj1 = null;
		$(this).find('ul.sub1 > li').each(function(){
			total_sub++;
			var width = $(this).width();
			if (width > max_width){
				max_width = width ;
			}
		});
		max_width++;
		$(this).find('ul.sub1 > li').each(function(){
			$(this).width(max_width);
		});
		$(obj1).width(max_width);
		$(this).find('ul.sub1').width(max_width * total_sub);
		
		
		//set max height
		var max_height = 0;
		$(this).find('ul.sub2 > li').each(function(){
			var height = $(this).height();
			if(height > max_height){
				max_height = height;
			}
		});        
		$(this).find('ul.sub2 > li').each(function(){
			$(this).height(max_height);
		}); 
		
		
		//set menu travel
		$('#category87').width(753);
		$('#li-category88').width(552);
		$('#li-category90').width(99);
		$('#li-category233').width(102);
	});
});

