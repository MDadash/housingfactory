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
                    if (currentDistrict) {
                        districtsArray.push(currentDistrict);
                    }
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

//   fillFlatPageInfo
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
                proposalsLink.className = 'proposals__link';
                // proposalsLink.href =  window.location.href.split('/').shift() + '/?page=7&flat_id=' + flatsArr[i]['Id'] + '; ?>';
                var proposalsImg = document.createElement('img');
                proposalsImg.className = 'proposals__img';
                proposalsImg.alt = flatsArr[i]['Street'];

                if (flatsArr[i]['Images'].length == 0) {
                    proposalsImg.src = '<?php bloginfo(\'template_url\') ?>/images/noimage.jpg';
                } else {
                    proposalsImg.src = flatsArr[i]['Images']['Image'][0]['@attributes']['url'];
                }

                if (flatsArr[i]['Description'].indexOf('ипотек')) {
                    var proposalsMortgage = document.createElement('span');
                    proposalsMortgage.className = 'proposals__mortgage';
                    proposalsMortgage.innerText = 'Ипотека';
                }

                var proposalsRooms = document.createElement('span');
                proposalsRooms.className = 'proposals__rooms';
                proposalsRooms.innerText = flatsArr[i]['Rooms'] + ' комнаты';

                if (flatsArr[i]['Images']['Image'].length >= 8) {
                    var proposalsReccommend = document.createElement('span');
                    proposalsReccommend.className = 'proposals__reccommend';
                }

                imgWrapper.appendChild(proposalsLink);
                imgWrapper.appendChild(proposalsImg);
                if (proposalsMortgage) {imgWrapper.appendChild(proposalsMortgage);}
                imgWrapper.appendChild(proposalsMortgage);
                imgWrapper.appendChild(proposalsRooms);
                if (proposalsReccommend) {imgWrapper.appendChild(proposalsReccommend);}


                 var infoWrapper = document.createElement('div');
                 infoWrapper.className = 'proposals__info-wrapper';
                 var proposalsTitle = document.createElement('h3');
                 proposalsTitle.className = 'proposals__title';
                 proposalsTitle.innerText = flatsArr[i]['Street'];
                 var proposalsInfoTable = document.createElement('table');
                 proposalsInfoTable.className = 'proposals__info';
                 var proposalsInfofirstRow = document.createElement('tr');
                 var proposalsInfosecondRow = document.createElement('tr');
                 var proposalsInfothirdRow = document.createElement('tr');
                 var proposalsInfofirstfield = document.createElement('td');
                 var proposalsInfofirstvalue = document.createElement('td');
                 var proposalsInfosecondfield = document.createElement('td');
                 var proposalsInfosecondvalue = document.createElement('td');
                 var proposalsInfothirdfield = document.createElement('td');
                 var proposalsInfothirdvalue = document.createElement('td');
                 proposalsInfofirstfield.className = proposalsInfosecondfield.className = proposalsInfothirdfield.className = 'proposals__field';
                 proposalsInfofirstvalue.className = proposalsInfosecondvalue.className = proposalsInfothirdvalue.className = 'proposals__value';
                 proposalsInfofirstfield.innerText = 'Этаж:';
                 proposalsInfosecondfield.innerText = 'Комнат';
                 proposalsInfothirdfield.innerText = 'Площадь';
                 proposalsInfofirstvalue.innerText = flatsArr[i]['Floor'] + '/' + flatsArr[i]['Floors'];
                 proposalsInfosecondvalue.innerText = flatsArr[i]['Rooms'];
                 proposalsInfothirdvalue.innerHTML = flatsArr[i]['Square'] + 'm<sup>2</sup>';

                 proposalsInfofirstRow.appendChild(proposalsInfofirstfield);
                 proposalsInfofirstRow.appendChild(proposalsInfofirstvalue);

                 proposalsInfosecondRow.appendChild(proposalsInfosecondfield);
                 proposalsInfosecondRow.appendChild(proposalsInfosecondvalue);

                 proposalsInfothirdRow.appendChild(proposalsInfothirdfield);
                 proposalsInfothirdRow.appendChild(proposalsInfothirdvalue);

                 proposalsInfoTable.appendChild(proposalsInfofirstRow);
                 proposalsInfoTable.appendChild(proposalsInfosecondRow);
                 proposalsInfoTable.appendChild(proposalsInfothirdRow);

                 proposalsInfoTable.appendChild(proposalsInfothirdRow);

                 infoWrapper.appendChild(proposalsTitle);
                 infoWrapper.appendChild(proposalsInfoTable);

                 var priceWrapper = document.createElement('div');
                 priceWrapper.className = 'proposals__price-wrapper';
                 var proposalsPrice = document.createElement('span');
                 proposalsPrice.className = 'proposals__price-new';
                 proposalsPrice.innerHTML = flatsArr[i]['Price'] + ' &#8381;';

                 priceWrapper.appendChild(proposalsPrice);


                 flatContainer.appendChild(imgWrapper);
                 flatContainer.appendChild(infoWrapper);
                 flatContainer.appendChild(priceWrapper);

                 flatList.appendChild(flatContainer);
            }
         }


         // filter by select district
         // function districtFilter (flatsArray) {
         //     var sel=document.getElementById('select-district').selectedIndex;
         //     console.log(sel);
         // }

    });
}());



