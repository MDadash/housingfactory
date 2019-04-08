(function(){
  $(document).ready(function(){
    //1 scroll btn
    var clientHeight = $("body").height();
    $(".btn-scroll").click(function (){
          $('html, body').animate({ scrollTop: $(".header-info").offset().top},1000);
    });
    $(window).scroll(function(){
       if ( $(window).scrollTop() >= clientHeight/2 ){              
          $('.btn-scroll').css('display','block'); 
       }
       else {
          $('.btn-scroll').css('display','none');  
       }
    })

    var clientHeight = $("body").height();
      $(".btn-scroll").click(function (){
          $('html, body').animate({ scrollTop: $(".header-info").offset().top},1000);
      });
    $(window).scroll(function(){
       if ( $(window).scrollTop() >= clientHeight/2 ){              
          $('.btn-scroll').css('display','block'); 
       }
       else {
          $('.btn-scroll').css('display','none');  
       }
    })


    //2 slider

    var container = document.getElementById("slider");
    if (container) {
      var id = window.location.href.split('flat_id=').pop();

      function initSlider(arr){
        if (arr.length){
          arr.forEach( function(item) {
                  var li = document.createElement("li");
                  var div = document.createElement("div");
                  var img = document.createElement("img");
                  var link = item;
                  li.setAttribute("data-thumb", link);
                  li.setAttribute("data-src", link);
                  img.setAttribute("src", link);
                  div.style.backgroundImage = "url(" + link + ")";
                  li.appendChild(img);
                  li.appendChild(div);
                  container.appendChild(li);
                
              });

          $('#slider').lightSlider({
              gallery:true,
              item:1,
              loop:true,
              thumbItem:9,
              slideMargin:0,
              enableDrag: true,
              autoplay :false,
              currentPagerPosition:'middle',
              onSliderLoad: function(el) {
                  el.lightGallery({
                    loop:true,
                    selector: '#slider .lslide'
                });
              }
          });
        }else if(!arr.length){
          var wrapper = document.querySelector(".appartment__rs");
          var img = document.createElement("img");
          img.className = "appartment__img";
          img.src  = "http://demo.pinofran.com/demo/housingfactory/wp-content/themes/mainTheme/images/noPhoto.png";
          wrapper.insertBefore(img,wrapper.firstChild);
        }
      };

      var data = {
        action: 'getimagesbyflat',
        flat_id: window.location.href.split('flat_id=').pop()
      };

      $.get( my_ajax.ajaxurl, data, function(response) {
          var arr = JSON.parse(response);
          initSlider(arr);
      });
    }


    //3 nice selector
    function customizeSelect(){
      if ($("select")){
          $("select").niceSelect();
      }
    }

    customizeSelect();

  })
}());