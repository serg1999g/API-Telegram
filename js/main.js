$(document).ready(function () {

    $('#hello').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Message.php",
            method: "POST",
            success: function (data) {
                /* console.log(data); */
            }
        });
    });


    $('#date').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "Date.php",
            method: "POST",
            success: function (data) {
                /* console.log(data); */
            }
        });
    });




});