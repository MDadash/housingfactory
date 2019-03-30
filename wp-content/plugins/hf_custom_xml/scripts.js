(function(){
  $(document).ready(function(){
        // $(".btn-scroll").click(function (){
	     //    $('html, body').animate({ scrollTop: $(".header-info").offset().top},1000);
        // });
        //
        //
        // var clientHeight = $("body").height();
        // console.log(clientHeight);
		// $(window).scroll(function(){
		//    if ( $(window).scrollTop() >= clientHeight/2 ){
		//       $('.btn-scroll').css('display','block');
		//    }
		//    else {
		//    		$('.btn-scroll').css('display','none');
		//    }
		// })

      var data = {
          action: 'getimagesbyflat',
          flat_id: '5779658',
      };

      $.get( my_ajax.ajaxurl, data, function(response) {
          console.log(JSON.parse(response))
      });
  })
}());