$(".clicked-image").click(function () {
    var imgUrl = $(this).data('rel'); 
    $("#change").attr("src",imgUrl);
});

