$(window).resize(function(){
    var width = $(window).width();
    var height = $(window).height();
    if(width<=768 && width>425){
    	$('.left').addClass('display');
    	$('.header').addClass('header_768');
    	$('.searchh').addClass('search_768');
    	$('.header_logo').addClass('header_logo_768');
    	$('.cart').addClass('display');
	    $('.responsive_log').addClass('display_log');
    }else{
    	if(width<=425 && width>375){
	    	$('.left, .right').addClass('display');
	    	$('.searchh').addClass('search_425');
	    	$('.cart').addClass('display');
	    	$('.responsive_log').addClass('display_log');
    	}else{
	    	if(width<=375 && width>318){
		    	$('.left, .right').addClass('display');
		    	$('.searchh').addClass('search_375');
		    	$('.cart').addClass('display');
	    		$('.responsive_log').addClass('display_log');
		    }else{
			    if(width<=318){
			    	$('.left, .right').addClass('display');
			    	$('.searchh').addClass('search_320');
			    	$('.cart').addClass('display');
	    			$('.responsive_log').addClass('display_log');
			    }
			}
		}
	}	
});
