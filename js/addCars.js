
$("#submitButton").on("click", function(){
    let transmission = "";

    if($("#transmission1").is(":checked")) {
        transmission = "Automatic";
    }else if($("#transmission2").is(":checked")) {
        transmission = "Manual";
    }
    
    $.ajax({
        type: "GET",
        url: "api/addCarAPI.php",
        dataType: "json",
        data : {
            "make": $("#make").val(),
            "model": $("#model").val(),
            "year": $("#year").val(),
            "color": $("#color").val(),
            "type": $("#type").val(),
            "transmission": transmission,
            "odometer": $("#odometer").val(),
            "price": $("#price").val(),
            "image": $("#image").val()
        },
        success: function(data, status) {
        
        }
    }); // ajax
});