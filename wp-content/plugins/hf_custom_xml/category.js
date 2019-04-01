(function () {
    $(document).ready(function () {

        var flatsArray,
            districtsArray = [],
            districtsSelect = document.querySelector('#select-district'),
            roomsLinks = document.querySelectorAll('.filter__option'),
            flatsOnDom,
            flatsOnDomRoomSorting,
            data = {
                action: 'getflats'
            };
        if (districtsSelect) {
            $.get( my_ajax.ajaxurl, data, function(response) {
                flatsArray = JSON.parse(response);
                getDistricts(flatsArray);
                flatsOnDom = fillFlatInfo(flatsArray);
                flatsOnDomRoomSorting = filterWhenPageIsLoading();
            });
        }


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

            var flatList = document.querySelector('.proposals__item-list');

             for (var i = 0; i < flatsArr.length; i++) {
                var flatContainer = document.createElement('div');
                flatContainer.className = 'proposals__item col-sm-6 col-lg-4';
                var dataDistrictAttr = flatsArr[i]['District'];
                flatContainer.setAttribute('data-district', dataDistrictAttr);
                var imgWrapper = document.createElement('div');
                imgWrapper.className = 'proposals__img-wrapper';
                var proposalsLink = document.createElement('a');
                proposalsLink.innerText = 'Посмотреть';
                proposalsLink.className = 'proposals__link';
                proposalsLink.href = '/?page_id=7&flat_id=' + flatsArr[i]['Id'];
                var proposalsImg = document.createElement('img');
                proposalsImg.className = 'proposals__img';
                proposalsImg.alt = flatsArr[i]['Street'];

                if (flatsArr[i]['Images'].length == 0) {
                    proposalsImg.src = 'wp-content/themes/mainTheme/images/noimage.jpg';
                } else {
                    if (flatsArr[i]['Images']['Image'][0]) {
                        proposalsImg.src = flatsArr[i]['Images']['Image'][0]['@attributes']['url'];
                    } else {
                        proposalsImg.src = flatsArr[i]['Images']['Image']['@attributes']['url'];
                    }
                }

                if (flatsArr[i]['Description'].indexOf('ипотек')) {
                    var proposalsMortgage = document.createElement('span');
                    proposalsMortgage.className = 'proposals__mortgage';
                    proposalsMortgage.innerText = 'Ипотека';
                }

                var proposalsRooms = document.createElement('span');
                proposalsRooms.className = 'proposals__rooms';
                if (flatsArr[i]['Rooms'] == 1) {
                    proposalsRooms.innerText = flatsArr[i]['Rooms'] + ' комната';
                } else if (!flatsArr[i]['Rooms']) {
                    proposalsRooms.innerText = ' комнаты';
                } else {
                    if (+flatsArr[i]['Rooms']) {
                        proposalsRooms.innerText = flatsArr[i]['Rooms'] + ' комнаты';
                    } else {
                        proposalsRooms.innerText = flatsArr[i]['Rooms'];
                    }
                }

                if (flatsArr[i]['Images'].length != 0 && flatsArr[i]['Images']['Image'].length >= 8) {
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

            return document.querySelectorAll('.proposals__item');
         }


         // filter by select district
        if (districtsSelect) {
            districtsSelect.onchange = function () {
                console.log(flatsOnDomRoomSorting)
                filterByDistrict(flatsOnDomRoomSorting);
            }
        }

        function filterByDistrict(flatsaArray) {
            console.log(districtsSelect.value);
            for (var i = 0; i < flatsaArray.length; i++) {
                if (districtsSelect.value != flatsaArray[i].getAttribute('data-district')) {

                    flatsaArray[i].style.display = 'none';
                } else {
                    flatsaArray[i].style.display = 'block';
                }
            }
        }

        // filter by rooms number

        document.addEventListener('click', function () {

            if (!event.target.classList.contains('filter__option')) return;
            event.target.classList.add('filter__option--active');
            var links = document.querySelectorAll('.filter__option');
            for (var i = 0; i < links.length; i++) {
                if (links[i] === event.target) continue;
                links[i].classList.remove('filter__option--active');
            }

        }, false);

        for (var i = 0; i < roomsLinks.length; i++) {

            roomsLinks[i].onclick = function() {
                var showingFlats = [];
                for (var j = 0; j < flatsOnDom.length; j++) {

                    var roomsNumber = flatsOnDom[j].querySelector('tr:nth-child(2) .proposals__value').innerText;

                    if (this.getAttribute('data-rooms') ==  'room') {
                        if (+roomsNumber) {
                            flatsOnDom[j].style.display = 'none';
                        } else {
                            flatsOnDom[j].style.display = 'block';
                            showingFlats.push(flatsOnDom[j]);
                        }
                    } else {
                        if (this.getAttribute('data-rooms') !==  roomsNumber) {
                            flatsOnDom[j].style.display = 'none';
                        } else {
                            flatsOnDom[j].style.display = 'block';
                            showingFlats.push(flatsOnDom[j]);
                        }
                    }
                }
                flatsOnDomRoomSorting = showingFlats;
                filterByDistrict(showingFlats);
            }
        }

        var activeRoomsOption = document.querySelector('.filter__option--active');

        function filterWhenPageIsLoading () {

            var showingFlats = [];
            for (var j = 0; j < flatsOnDom.length; j++) {
                var roomsNumber = flatsOnDom[j].querySelector('tr:nth-child(2) .proposals__value').innerText;

                if (activeRoomsOption.getAttribute('data-rooms') ==  'room') {
                    if (+roomsNumber) {
                        flatsOnDom[j].style.display = 'none';
                    } else {
                        flatsOnDom[j].style.display = 'block';
                        showingFlats.push(flatsOnDom[j]);
                    }
                } else {
                    if (activeRoomsOption.getAttribute('data-rooms') !==  roomsNumber) {
                        flatsOnDom[j].style.display = 'none';
                    } else {
                        flatsOnDom[j].style.display = 'block';
                        showingFlats.push(flatsOnDom[j]);
                    }
                }
            }
            filterByDistrict(showingFlats);
            return showingFlats;
        }

        function showMoreButton(flatsArr) {


        }
        showMoreButton (flatsOnDomRoomSorting);

    });
}());
