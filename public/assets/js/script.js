$(function() {

    $(".write").typed({

        strings: ["Welcome to ItSolutionStuff.com!", "Thanks for visit"],

        typeSpeed: 1,
        loop: true,

    });

});
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
});