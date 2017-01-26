var device = "desktop"
$(document).ready(function(){
	if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		device = "mobile";	
	}
	if(device == "mobile"){
		var jsElm = document.createElement("script");
			jsElm.type = "application/javascript";
			jsElm.src = "js/mobile.js";
		document.body.appendChild(jsElm);
		$(".menuDesktop").remove();
		$("#menuMobile").show();
	} else {
		$(".menuDesktop").show();
		$(".stepSelection,#menuMobile").remove();
	}
	
	/* modal */
	$('.openModal').on('click',function(e){
		e.preventDefault();
		var curModal = $(e.currentTarget).attr("href");
		showSignUp();
		if($(this).hasClass("mobile")){
			$("#menuMobile .menuOptions").hide();
		}
		$('.w-modal,.w-backdrop').show();
		$('.w-modal,.w-backdrop').animate({top:0});
	});
	$('.w-modal .closeModal').on('click',function(){
		$('.w-modal,.w-backdrop').animate({top:"100%"},function(){
			$('.w-modal,.w-backdrop').hide();
		});
	});
	$('.showLoginForm').on('click',function(){
		if($(this).hasClass('showSignIn')){
			showSignIn();	
		} else {
			showSignUp();
		}
	});   
	
	function showSignIn(){
		$("#createProfile,.showSignInSec").hide();
		$("#userLogin").slideDown();
		$(".showSignUpSec").show();	
	}
	
	function showSignUp(){
		$("#userLogin,.showSignUpSec").hide();
		$("#createProfile").slideDown();
		$(".showSignInSec").show();
	}
	/* modal */
	
	
});