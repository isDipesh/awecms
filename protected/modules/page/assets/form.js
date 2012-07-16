$(document).ready(function(){

    $('#Page_title').keyup(function() {
        changeSlug();
    });

    $('#Page_title').blur(function() {
        changeSlug();
    });
    
    $('#Page_slug').blur(function() {
        updateSlug();
    });

    $('#slug_holder').click(function() {
        toggleSlugEditor();
    });
    
    $('#Page_slug').blur(function() {
        toggleSlugEditor();
    });

});

function changeSlug(){
    $('#Page_slug').val(string_to_slug($('#Page_title').val()));
    $('#slug_holder').html($('#Page_slug').val());
}

function updateSlug(){
    $('#slug_holder').html($('#Page_slug').val());
}

function toggleSlugEditor(){
    $('#slug_holder').toggle();
    $('#Page_slug').toggle();
    $('#Page_slug').focus();
}

//http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript/
function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

    return str;
}