(function () {
    $(document).ready(function () {

        var flatsArray,
            districtsArray = [];

        $.ajax({
            type: "GET",
            url: "/wp-admin/admin-ajax.php?action=getflats",
            success: function(response){
                flatsArray = JSON.parse(response);
                // console.log(flatsArray);
                qaz();
            }
        });

        function qaz(){
            for (var i = 0; i < flatsArray.length; i++) {
                var currentDistrict = flatsArray[i]['District'];
                districtsArray.push(currentDistrict);
                console.log(currentDistrict);
                for (var j = 0; j < districtsArray.length; j++) {
                    if (currentDistrict !== districtsArray[j]) {
                        districtsArray.push(currentDistrict);
                        console.log(districtsArray);
                    }
                }

                console.log(districtsArray);
            }
        }



    });
}());