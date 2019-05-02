
$.ajax({
    type: "GET",
    url: "api/getFeaturedCar.php",
    dataType: "json",
    success: function(data, status) {
        $("#featuredCarImage").attr('src', data.image);
        $("#featuredCarName").html(data.year.toString() + " " + data.make + " " + data.model);
        $("#featuredCarPrice").html("$" + data.price);
        $("#featuredCarMileage").html(data.odometer);
        $("#featuredCarTransmission").html(data.transmission);
        $("#featuredCarColor").html(data.color);
    }
});

// if(typeof(admin) !== "undefined" || typeof(user) !== "undefined") {
//     $("#logInBtn").hide();
//     $("#logoutBtn").show();
// }else{
//     $("#logInBtn").show();
//     $("#logoutBtn").hide();
// }
