$(document).ready(function(){

    var param_id = getUrlVars()["id"];

    var module = $('#Access_module').val();

    $('#Access_module').change(function(){

        var loc = document.location.host+document.location.pathname;
        loc += '?module='+$(this).val();

        if (param_id == undefined ){
            window.location.href = 'http://'+loc
        }
        else
        {
            window.location.href = 'http://'+loc+'&id='+param_id;
        }
    });

    $('#Access_controller').change(function(){

        var loc = document.location.host+document.location.pathname;
        loc += '?module='+module+'&controller='+$(this).val();

        if (param_id == undefined ){
            window.location.href = 'http://'+loc
        }
        else
        {
            window.location.href = 'http://'+loc+'&id='+param_id;
        }

    });
});

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}