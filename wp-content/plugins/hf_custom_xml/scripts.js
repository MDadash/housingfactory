(function(){
  $(document).ready(function(){
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


        var container = document.getElementById("slider");
        if (container) {
          var id = window.location.href.split('flat_id=').pop();

        function initSlider(arr){
          if (arr.length) {
            alert(arr.length);
            arr.forEach( function(item) {
                    var li = document.createElement("li");
                    var link = item;
                    li.setAttribute("data-thumb", link);
                    li.setAttribute("data-src", link);
                    var img = document.createElement("img");
                    img.setAttribute("src", link);
                    li.appendChild(img);
                    container.appendChild(li);
                });

              $('#slider').lightSlider({
                  gallery:true,
                  item:1,
                  loop:true,
                  thumbItem:9,
                  slideMargin:0,
                  enableDrag: false,
                  currentPagerPosition:'left',
                  onSliderLoad: function(el) {
                      el.lightGallery({
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
            alert("noPhoto");
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


  })
}());