$(document).ready(function(){
	
	/* menu */
	
		$("#menuMobile img").on('click',function(){
			$("#menuMobile .menuOptions").slideToggle(200);
		});
	
	/* menu */
	
	/* how it works */
	
	$(".stepArrow").remove();
    $(".step").on("swiperight",function(e){
      $(this).prev().animate({ marginLeft: '0'}, 300, selectStep);
    });
	 $(".step").on("swipeleft",function(e){
      if(!$(this).hasClass("last")){
        $(this).animate({marginLeft: '-100%'}, 300, selectStep.bind($(this).next()));
      }
    });

    $('.stepSel').on('click',function(){
      var conxt = $(this),
	      ele =  $("#"+conxt.attr("data-id"));
      ele.prevAll(".step").animate({marginLeft: '-100%'}, 300);
      ele.animate({marginLeft: '0'}, 300, selectStep);
      ele.nextAll(".step").animate({marginLeft: '0'}, 300);
    });
	
	function selectStep(){
		 $('.stepSel').removeClass('selected');
		 var id = $(this).attr('id');
		 $('[data-id='+id+']').addClass('selected')
	}
	
	/* how it works */

});