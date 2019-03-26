(function(){
  $(document).ready(function(){
	    $(".btn-scroll").click(function (){
	        $('html, body').animate({ scrollTop: $(".header-info").offset().top},1000);
	    });


	    var clientHeight = $("body").height();
	    console.log(clientHeight);
		$(window).scroll(function(){
		   if ( $(window).scrollTop() >= clientHeight/2 ){              
		      $('.btn-scroll').css('display','block'); 
		   }
		   else {
		   		$('.btn-scroll').css('display','none');  
		   }
		})


  })
}());