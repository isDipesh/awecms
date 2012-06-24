$(document).ready(function(){

    var module = $('#Access_module').val();

    $('#Access_module').change(function(){
        var loc = document.location.origin+document.location.pathname;
        loc += '?module='+$(this).val();
        document.location = loc
    });

    $('#Access_controller').change(function(){
        var loc = document.location.origin+document.location.pathname;
        loc += '?module='+module+'&controller='+$(this).val();
        document.location = loc
    });
});