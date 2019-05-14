(function () {
    $(document).ready(function () {

        var globalFlats,
            globalHouses,
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

            data = {
                action: 'getflats'
            },
            datahouses = {
                action: 'gethouses'
            };

        if (districtsSelect && window.location.href.split('page_id=').pop() !== '9') {
            if (!window.location.href.split('page_id=7053').pop() || !sessionStorage.getItem('globalFlats')) {

                $.get( my_ajax.ajaxurl, data, function(response) {
                    sessionStorage.setItem('globalFlats', response);
                });
                $( document ).ajaxComplete(function() {
                    globalFlats = JSON.parse(sessionStorage.getItem('globalFlats'));
                    getAndShowDistricts(globalFlats);

                    if(window.location.href.split('page_id=7053').pop()){
                        getUrlParameter ();
                        // showMoreOption (actualFlatsArray, showMoreStep, (showMoreStep + 12));
                        var activeRoomsOption = document.querySelector('.filter__option--active'),
                            selectedDistrictValue = districtsSelect.value;
                        var actFlats = getSortingArray (globalFlats, activeRoomsOption, selectedDistrictValue);
                        showMoreOption (actFlats, showMoreStep, (showMoreStep + 12));
                    } else {
                        showMoreOption (globalFlats, showMoreStep, (showMoreStep + 12));
                    }
                });
            } else {
                globalFlats = JSON.parse(sessionStorage.getItem('globalFlats'));
                getAndShowDistricts(globalFlats);
                getUrlParameter ();
                // showMoreOption (actualFlatsArray, showMoreStep, (showMoreStep + 12));

                var activeRoomsOption = document.querySelector('.filter__option--active'),
                    selectedDistrictValue = districtsSelect.value;

                var actFlats = getSortingArray (globalFlats, activeRoomsOption, selectedDistrictValue);
                showMoreOption (actFlats, showMoreStep, (showMoreStep + 12));
            }
        } else if (districtsSelect && window.location.href.split('page_id=').pop() == '9') {
            document.querySelector('.category__filter').style.display = 'none';
            $.get( my_ajax.ajaxurl, datahouses, function(response) {
            sessionStorage.setItem('globalHouses', response);
        });
        $( document ).ajaxComplete(function() {
            globalHouses = JSON.parse(sessionStorage.getItem('globalHouses'));
            showMoreOption (globalHouses, showMoreStep, (showMoreStep + 12));

        });
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
                if (flatsArray[j]['category'] == 'комната' && activeLink.getAttribute('data-rooms') == 'room') {
                    showingFlatsByRoomsQuantity.push(flatsArray[j]);
                } else {
                    var roomsNumber = flatsArray[j]['rooms'];
                    if (activeLink.getAttribute('data-rooms') == 4 && +roomsNumber >= activeLink.getAttribute('data-rooms') && flatsArray[j]['category-id'] !== '2') {
                        showingFlatsByRoomsQuantity.push(flatsArray[j]);
                    } else if (activeLink.getAttribute('data-rooms') == roomsNumber && flatsArray[j]['category-id'] !== '2') {
                        showingFlatsByRoomsQuantity.push(flatsArray[j]);
                    }
                }
            }

            actualFlatsArray = [];
            for (var i = 0; i < showingFlatsByRoomsQuantity.length; i++) {
                if (showingFlatsByRoomsQuantity[i]['location']['sub-locality-name'] == activeDistrict) {
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
                allDistrictsArray.push(flatsArray[i]['location']['sub-locality-name']);
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
            districtsArray = districtsArray.sort();

                if (!sessionStorage.getItem('districts') || !JSON.parse(sessionStorage.getItem('districts')).length) {
                    var districtsString = JSON.stringify(districtsArray);
                    sessionStorage.setItem('districts', districtsString);
                } else {
                    districtsArray = JSON.parse(sessionStorage.getItem('districts'));
                }

            // for (var i = 0; i < districtsArray.length; i++) {
            //     var option = document.createElement('option');
            //     option.value = option.innerText = districtsArray[i];
            //     option.setAttribute('data-district-id', i);
            //     districtsSelect.appendChild(option);
            // }

            $('#select-district').niceSelect('destroy');
            $("#select-district").niceSelect();
        }

//  view actual flats on the page
        function viewFlats (flatsArr) {

            // for (var i = 0; i < flatsArr.length; i++) {
                var flatContainerWrap = document.createElement('div');
                flatContainerWrap.className = 'col-sm-6 col-lg-4';
                var dataDistrictAttr = flatsArr['location']['sub-locality-name'];
                flatContainerWrap.setAttribute('data-district', dataDistrictAttr);

                var flatContainer = document.createElement('a');
                flatContainer.className = 'proposals__item';
                flatContainer.href = document.location.origin + '/?page_id=7&flat_id=' + flatsArr['@attributes']['internal-id'];


                var imgWrapper = document.createElement('div');
                imgWrapper.className = 'proposals__img-wrapper';
                var proposalsLink = document.createElement('a');
                proposalsLink.innerText = 'Посмотреть';
                proposalsLink.className = 'proposals__link';
                var proposalsImg = document.createElement('img');
                proposalsImg.className = 'proposals__img';
                proposalsImg.alt = flatsArr['Street'];

                if (flatsArr['image'] == undefined) {
                    proposalsImg.src = 'wp-content/themes/mainTheme/images/noimage.jpg';
                } else {
                    if (typeof flatsArr['image'] == 'string') {
                        proposalsImg.src = flatsArr['image'];
                    } else {
                        proposalsImg.src = flatsArr['image'][0];
                    }
                }

                if (flatsArr['mortgage'] == '1') {
                    var proposalsMortgage = document.createElement('span');
                    proposalsMortgage.className = 'proposals__mortgage';
                    proposalsMortgage.innerText = 'Ипотека';
                }

                var proposalsRooms = document.createElement('span');
                proposalsRooms.className = 'proposals__rooms';
                if (flatsArr['category-id'] == '3') {
                    proposalsRooms.innerText = flatsArr['category'];
                    proposalsRooms.style.textTransform = 'Capitalize';
                } else {
                    if (flatsArr['rooms'] == 1) {
                        proposalsRooms.innerText = flatsArr['rooms'] + ' комната';
                    } else if (!flatsArr['rooms']) {
                        proposalsRooms.innerText = ' комнаты';
                    } else {
                        if (+flatsArr['rooms']) {
                            proposalsRooms.innerText = flatsArr['rooms'] + ' комнаты';
                        } else {
                            proposalsRooms.innerText = flatsArr['rooms'];
                        }
                    }
                }


                // if (flatsArr['image'].length != 0 && flatsArr['image'].length >= 8) {
                //     var proposalsReccommend = document.createElement('span');
                //     proposalsReccommend.className = 'proposals__reccommend';
                // }

                imgWrapper.appendChild(proposalsLink);
                imgWrapper.appendChild(proposalsImg);
                if (flatsArr['mortgage'] == '1') {imgWrapper.appendChild(proposalsMortgage);}
                imgWrapper.appendChild(proposalsRooms);
                // if (proposalsReccommend) {imgWrapper.appendChild(proposalsReccommend);}


                var infoWrapper = document.createElement('div');
                infoWrapper.className = 'proposals__info-wrapper';
                var proposalsTitle = document.createElement('h3');
                proposalsTitle.className = 'proposals__title';
                proposalsTitle.innerText = flatsArr['location']['address'];
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
                proposalsInfofirstvalue.innerText = (flatsArr['floor'] ? flatsArr['floor'] : ' - ') + '/' + flatsArr['floors-total'];
                proposalsInfosecondvalue.innerText = flatsArr['rooms'] ? flatsArr['rooms'] : ' - ';
                proposalsInfothirdvalue.innerHTML = flatsArr['area']['value'] + 'm<sup>2</sup>';

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
                proposalsPrice.innerHTML = flatsArr['price']['value'] + ' &#8381;';

                priceWrapper.appendChild(proposalsPrice);


                flatContainer.appendChild(imgWrapper);
                flatContainer.appendChild(infoWrapper);
                flatContainer.appendChild(priceWrapper);

                flatContainerWrap.appendChild(flatContainer);

                flatList.appendChild(flatContainerWrap);
            // }

            // return document.querySelectorAll('.proposals__item');
        }

        function getUrlParameter () {
            var urlPartsArray = window.location.href.split('&');
            var roomsParametr = urlPartsArray[1].split('roomsquantity=').pop();
            var districtParametr = urlPartsArray[2].split('district=').pop();
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

            if (flatsArray.length) {
                document.querySelector('.proposals__noitem').style.display = 'none';
            } else {
                document.querySelector('.proposals__noitem').style.display = 'block';
            }

            for (var i = startIndex; i < endIndex; i++) {
                if (flatsArray[i]) {
                    viewFlats(flatsArray[i]);
                    if (i ==  (endIndex - 1) && flatsArray.length <= endIndex) {
                        showMorebutton.style.display="none";
                    } else {
                        showMorebutton.style.display="inline-block";
                    }
                } else {
                    showMorebutton.style.display="none";
                    break;
                }

            }
        }

//  filter and buttons events
        if (showMorebutton) {
            showMorebutton.onclick = function () {
                showMoreStep += 12;
                if (!window.location.href.split('page_id=7053').pop()) {
                    showMoreOption(globalFlats, showMoreStep, (showMoreStep + 12));
                } else if (window.location.href.split('page_id=').pop() == '9') {
                    showMoreOption(globalHouses, showMoreStep, (showMoreStep + 12));
                } else {
                    showMoreOption(actualFlatsArray, showMoreStep, (showMoreStep + 12));
                }
                // showMoreOption(globalFlats, showMoreStep, (showMoreStep + 12));
            }
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

        if (searchButton) {
            searchButton.onclick = function () {
                var activeRoomsOption = document.querySelector('.filter__option--active'),
                    selectedDistrictValue = districtsSelect.value,
                    selectedDistrictIndex = districtsSelect.options['selectedIndex'];

                if (!activeRoomsOption) {
                    document.querySelector('.filter__message').style.display = 'block';
                } else {
                    setPageUrl(selectedDistrictIndex, activeRoomsOption);
                }
            }
        }

    });
}());

// фильтр для категории "комнаты" - перебор массива с конца, пока не встретится категория "Квартиры", т.к. все комнаты расположены в конце массива после квартир
