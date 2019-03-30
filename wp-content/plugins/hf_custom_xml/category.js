(function () {
    $(document).ready(function () {

        var flatsArray,
            districtsArray = [],
            districtsSelect = document.querySelector('#select-district'),
            data = {
                action: 'getflats'
            };

        $.get( my_ajax.ajaxurl, data, function(response) {
            flatsArray = JSON.parse(response);
            getDistricts(flatsArray);
            fillFlatInfo(flatsArray);
        });

//   get and fill districts from flats array
        function getDistricts(flatsArr) {
            var allDistrictsArray = [];

            for (var i = 0; i < flatsArr.length; i++) {
                allDistrictsArray.push(flatsArr[i]["District"]);
            }

            districtsFilter:
                for (var i = 0; i < allDistrictsArray.length; i++) {
                    var currentDistrict = allDistrictsArray[i];
                    for (var j = 0; j < districtsArray.length; j++) {
                        if (districtsArray[j] == currentDistrict) continue districtsFilter;
                    }
                    districtsArray.push(currentDistrict);
                }
            fillDistrictSelect(districtsArray);
        }

        function fillDistrictSelect(districtsArr) {
            for (var i = 0; i < districtsArr.length; i++) {
                var option = document.createElement('option');
                option.value = option.innerText = districtsArr[i];
                districtsSelect.appendChild(option);
            }
        }

//   filter flats by district
         function fillFlatInfo (flatsArr) {
            console.log(flatsArr);
            var flatList = document.querySelector('.proposals__item-list');

            for (var i = 0; i < flatsArr.length; i++) {
                var flatContainer = document.createElement('div');
                flatContainer.className = 'proposals__item col-sm-6 col-lg-4';
                var imgWrapper = document.createElement('div');
                imgWrapper.className = 'proposals__img-wrapper';
                var proposalsLink = document.createElement('a');
                proposalsLink.innerText = 'Посмотреть';
                proposalsLink.className = 'proposal__link';
                imgWrapper.appendChild(proposalsLink);
                proposalsLink.href =  window.location.href.split('/').shift() + '/?page=7&flat_id=' + flatsArr[i]['Id'] + '; ?>';
                var proposalsImg = document.createElement('img');
                proposalsImg.className = 'proposals__img';
                proposalsImg.alt = flatsArr[i]['Street'];
                console.log(proposalsLink);
                // console.log(flatsArr[i]['Images']);

                if (flatsArr[i]['Images'].length == 0) {
                    proposalsImg.src = '<?php bloginfo(\'template_url\') ?>/images/noimage.jpg';
                } else {
                    proposalsImg.src = flatsArr[i]['Images']['Image'][0]['@attributes']['url'];
                }


                imgWrapper.appendChild(proposalsLink);
                imgWrapper.appendChild(proposalsImg);
                flatContainer.appendChild(imgWrapper);
                // flatList.appendChild(flatContainer);
            }

         }


    });
}());
