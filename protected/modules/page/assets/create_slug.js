$(document).ready(function(){
    
    $('#Page_title').keyup(function() {
        changeSlug();
    });

    $('#Page_title').blur(function() {
        changeSlug();
    });

});

function changeSlug(){
    $('#Page_slug').val(string_to_slug($('#Page_title').val()));
    $('#slug_holder').html($('#Page_slug').val());
}