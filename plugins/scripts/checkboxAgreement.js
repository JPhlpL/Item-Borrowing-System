$(document).ready(function() {
    var termbox = $("#termbox");

    termbox.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn").removeAttr("disabled");
        } else {
            $("#submitBtn").attr("disabled", "disabled");
        }
    });
}); 
