(function () {
    $(document).ready(function () {

        var flatsArray,
            allDistrictsArray = [],
            uniqueDistrictsArray,
            districtsSelect = document.querySelector('#select-district');

        $.ajax({
            type: "GET",
            url: "/wp-admin/admin-ajax.php?action=getflats",
            success: function(response){
                flatsArray = JSON.parse(response);
                getAllDistricts(flatsArray);
            }
        });

        function getAllDistricts(arr) {
            for (var i = 0; i < arr.length; i++) {
                allDistrictsArray.push(arr[i]["District"]);
            }
            uniqueDistrictsArray = findUniqueDistricts(allDistrictsArray);
            fillDistrictSelect(uniqueDistrictsArray);
        }

        function findUniqueDistricts(arr) {
            var result = [];

            nextInput:
                for (var i = 0; i < arr.length; i++) {
                    var str = arr[i];
                    for (var j = 0; j < result.length; j++) {
                        if (result[j] == str) continue nextInput;
                    }
                    result.push(str);
                }

            return result;
        }

        function fillDistrictSelect(districtsArr) {
            console.log(districtsArr);
            console.log(districtsSelect);

            for (var i = 0; i < districtsArr.length; i++) {
                var option = document.createElement('option');
                option.value = option.innerText = districtsArr[i];
                console.log(option);
                districtsSelect.appendChild(option);
            }
        }
    });
}());