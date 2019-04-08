(function () {
    $(document).ready(function () {


        var globalFlats,
            flatList = document.querySelector('.proposals__item-list'),
            districtsSelect = document.querySelector('#select-district'),
            showMorebutton = document.getElementById('showMore'),
            searchButton = document.getElementById('searchButton'),
            actualFlatsArray = [],
            showMoreStep = 0,
            roomsLinks = document.querySelectorAll('.filter__option'),

            roomsQuantity,
            districtIndex,
            districtsArray = [],

            flatsOnDom,
            flatsOnDomRoomSorting,
            data = {
                action: 'getflats'
            };

        if (districtsSelect) {
            if (!window.location.href.split('page_id=7053').pop() || !sessionStorage.getItem('globalFlats')) {
                $.get( my_ajax.ajaxurl, data, function(response) {
                    sessionStorage.setItem('globalFlats', response);
                });
                $( document ).ajaxComplete(function() {
                    globalFlats = JSON.parse(sessionStorage.getItem('globalFlats'));
                    getAndShowDistricts(globalFlats);
                    showMoreOption (globalFlats, showMoreStep, (showMoreStep + 12));
                });
            } else {
                globalFlats = JSON.parse(sessionStorage.getItem('globalFlats'));
                getAndShowDistricts(globalFlats);
                console.log(actualFlatsArray);

                getUrlParameter ();
                // showMoreOption (actualFlatsArray, showMoreStep, (showMoreStep + 12));

                var activeRoomsOption = document.querySelector('.filter__option--active'),
                    selectedDistrictValue = districtsSelect.value;

                var actFlats = getSortingArray (globalFlats, activeRoomsOption, selectedDistrictValue);
                showMoreOption (actFlats, showMoreStep, (showMoreStep + 12));
            }




        }

//  set page url
        function setPageUrl (districtOption, roomsLink) {
            districtIndex = districtOption;
            roomsQuantity = roomsLink.getAttribute('data-rooms');
            window.location.href = '/?page_id=7053&roomsquantity=' + roomsQuantity + '&district=' + districtIndex;
        }

//  sorting all flats after getting data from ajax
        function getSortingArray (flatsArray, activeLink, activeDistrict) {
            var showingFlatsByRoomsQuantity = [];

            for (var j = 0; j < flatsArray.length; j++) {
                var roomsNumber = flatsArray[j]['Rooms'];

                if (activeLink.getAttribute('data-rooms') == 'room') {
                    if (+roomsNumber) {
                    } else {
                        showingFlatsByRoomsQuantity.push(flatsArray[j]);
                    }
                } else {
                    if (activeLink.getAttribute('data-rooms') !== roomsNumber) {
                    } else {
                        showingFlatsByRoomsQuantity.push(flatsArray[j]);
                    }
                }
            }

            actualFlatsArray = [];
            for (var i = 0; i < showingFlatsByRoomsQuantity.length; i++) {
                if (showingFlatsByRoomsQuantity[i]['District'] == activeDistrict) {
                    actualFlatsArray.push(showingFlatsByRoomsQuantity[i]);
                }
            }

            // if (sessionStorage.getItem('actualFlats')) {
            //     sessionStorage.removeItem('actualFlats');
            // }
            //
            // sessionStorage.setItem('actualFlats', JSON.stringify(actualFlatsArray));

            return actualFlatsArray;
        }

//  show all districts from xml in select
        function getAndShowDistricts (flatsArray) {
            var allDistrictsArray = [];
            for (var i = 0; i < flatsArray.length; i++) {
                allDistrictsArray.push(flatsArray[i]["District"]);
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
                console.log(districtsArray, JSON.stringify(districtsArray));

                if (!sessionStorage.getItem('districts')) {
                    var districtsString = JSON.stringify(districtsArray);
                    sessionStorage.setItem('districts', districtsString);
                } else {
                    districtsArray = JSON.parse(sessionStorage.getItem('districts'));
                }

            for (var i = 0; i < districtsArray.length; i++) {
                var option = document.createElement('option');
                option.value = option.innerText = districtsArray[i];
                option.setAttribute('data-district-id', i);
                districtsSelect.appendChild(option);
            }

            $('#select-district').niceSelect('destroy');
            $("#select-district").niceSelect();
        }

//  sort flats by district
//         function getActualFlatsArray (flatsArray, activeDistrict) {
//             for (var i = 0; i < flatsArray.length; i++) {
//                 if (flatsArray[i]['District'] == activeDistrict) {
//                     actualFlatsArray.push(flatsArray[i]);
//                 }
//             }
//         }
//
// //  sort flats when clicking on rooms quantity link
//         for (var i = 0; i < roomsLinks.length; i++) {
//             roomsLinks[i].onclick = function (event) {
//                 getSortingByRoomsArray(globalFlats, event.target);
//             }
//         }

//  view actual flats on the page
        function viewFlats (flatsArr) {

            // for (var i = 0; i < flatsArr.length; i++) {
                var flatContainer = document.createElement('div');
                flatContainer.className = 'proposals__item col-sm-6 col-lg-4';
                var dataDistrictAttr = flatsArr['District'];
                flatContainer.setAttribute('data-district', dataDistrictAttr);
                var imgWrapper = document.createElement('div');
                imgWrapper.className = 'proposals__img-wrapper';
                var proposalsLink = document.createElement('a');
                proposalsLink.innerText = 'Посмотреть';
                proposalsLink.className = 'proposals__link';
                proposalsLink.href = '/?page_id=7&flat_id=' + flatsArr['Id'];
                var proposalsImg = document.createElement('img');
                proposalsImg.className = 'proposals__img';
                proposalsImg.alt = flatsArr['Street'];

                if (flatsArr['Images'].length == 0) {
                    proposalsImg.src = 'wp-content/themes/mainTheme/images/noimage.jpg';
                } else {
                    if (flatsArr['Images']['Image'][0]) {
                        proposalsImg.src = flatsArr['Images']['Image'][0]['@attributes']['url'];
                    } else {
                        proposalsImg.src = flatsArr['Images']['Image']['@attributes']['url'];
                    }
                }

                if (flatsArr['Description'].indexOf('ипотек')) {
                    var proposalsMortgage = document.createElement('span');
                    proposalsMortgage.className = 'proposals__mortgage';
                    proposalsMortgage.innerText = 'Ипотека';
                }

                var proposalsRooms = document.createElement('span');
                proposalsRooms.className = 'proposals__rooms';
                if (flatsArr['Rooms'] == 1) {
                    proposalsRooms.innerText = flatsArr['Rooms'] + ' комната';
                } else if (!flatsArr['Rooms']) {
                    proposalsRooms.innerText = ' комнаты';
                } else {
                    if (+flatsArr['Rooms']) {
                        proposalsRooms.innerText = flatsArr['Rooms'] + ' комнаты';
                    } else {
                        proposalsRooms.innerText = flatsArr['Rooms'];
                    }
                }

                if (flatsArr['Images'].length != 0 && flatsArr['Images']['Image'].length >= 8) {
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
                proposalsTitle.innerText = flatsArr['Street'];
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
                proposalsInfofirstvalue.innerText = flatsArr['Floor'] + '/' + flatsArr['Floors'];
                proposalsInfosecondvalue.innerText = flatsArr['Rooms'];
                proposalsInfothirdvalue.innerHTML = flatsArr['Square'] + 'm<sup>2</sup>';

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
                proposalsPrice.innerHTML = flatsArr['Price'] + ' &#8381;';

                priceWrapper.appendChild(proposalsPrice);


                flatContainer.appendChild(imgWrapper);
                flatContainer.appendChild(infoWrapper);
                flatContainer.appendChild(priceWrapper);

                flatList.appendChild(flatContainer);
            // }

            // return document.querySelectorAll('.proposals__item');
        }

        function getUrlParameter () {
            var urlPartsArray = window.location.href.split('&');
            var roomsParametr = urlPartsArray[1].split('roomsquantity=').pop();
            var districtParametr = urlPartsArray[2].split('district=').pop();
            console.log(roomsParametr, districtParametr);
            for (var i = 0; i < roomsLinks.length; i++) {
                if (roomsLinks[i].getAttribute('data-rooms') == roomsParametr) {
                    roomsLinks[i].classList.add('filter__option--active');
                }
                    districtsSelect.options.selectedIndex = districtParametr;
                $('#select-district').niceSelect('destroy');
                $("#select-district").niceSelect();



            }
        }

//  show next 12 elements
        function showMoreOption (flatsArray, startIndex, endIndex) {
            for (var i = startIndex; i < endIndex; i++) {
                viewFlats(flatsArray[i]);
            }
        }

//  filter and buttons events
        showMorebutton.onclick = function() {
            showMoreStep += 12;
            if (!window.location.href.split('page_id=7053').pop()) {
                showMoreOption(globalFlats, showMoreStep, (showMoreStep + 12));
            } else {
                showMoreOption(actualFlatsArray, showMoreStep, (showMoreStep + 12));
            }
            // showMoreOption(globalFlats, showMoreStep, (showMoreStep + 12));
        }

        //  set active rooms number
        document.addEventListener('click', function () {

            if (!event.target.classList.contains('filter__option')) return;
            event.target.classList.add('filter__option--active');
            var links = document.querySelectorAll('.filter__option');
            for (var i = 0; i < links.length; i++) {
                if (links[i] === event.target) continue;
                links[i].classList.remove('filter__option--active');
            }

        }, false);

        searchButton.onclick = function() {
            var activeRoomsOption = document.querySelector('.filter__option--active'),
                selectedDistrictValue = districtsSelect.value,
                selectedDistrictIndex = districtsSelect.options['selectedIndex'];

            setPageUrl (selectedDistrictIndex, activeRoomsOption);
            // getSortingArray (globalFlats, activeRoomsOption, selectedDistrictValue);

            console.log(actualFlatsArray);
            console.log(flatList);
            flatList.innerHTML = '';

            // activeRoomsOption.classList.add('filter__option--active');
            // districtsSelect.options['selectedIndex'] = districtIndex;
        }

    });
}());



// ошибка когда элементов меньше 12 или нет вообще
