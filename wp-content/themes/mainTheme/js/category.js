(function () {
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "/wp-admin/admin-ajax.php?action=getflats",
            success: function(response){
                console.log(JSON.parse(response));
            }
        });

    });
}());