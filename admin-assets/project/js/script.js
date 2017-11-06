

$(function() {


    // date picker

    // $( ".datepicker" ).datepicker();

    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });

//file input plugin for image upload and preview
    $(".fileinput").fileinput({
        showUpload: false,
        showRemove: false,
        showCaption: false
    });

    // CKEDITOR.replace( '.editor1' );

});

var has_offer = $("#has_offer").val();
if (has_offer == "1") {
    $("#offer_area").show();
} else {
    $("#offer_area").hide();
}

$("#has_offer").change(function () {

    has_offer = $("#has_offer").val();
    if (has_offer == "1") {
        $("#offer_area").show();
    } else {
        $("#offer_area").hide();
    }
});

