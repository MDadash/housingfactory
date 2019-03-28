(function () {
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "/wp-admin/admin-ajax.php?action=getflats",
            success: function(response){
                console.log(JSON.parse(response));
            }
        });

        $.ajax({
            type: "GET",
            url: "/wp-admin/admin-ajax.php?action=getimagesbyflat&flat_id=2460304",
            success: function(response){
                console.log(JSON.parse(response));
            }
        });

    });
}());