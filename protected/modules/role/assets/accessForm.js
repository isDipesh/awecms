$(document).ready(function(){

    var module = $('#Access_module').val();

    $('#Access_module').change(function(){
        var loc = document.location.host+document.location.pathname;
        loc += '?module='+$(this).val();
        self.location.href = 'http://'+loc
    });

    $('#Access_controller').change(function(){
        var loc = document.location.host+document.location.pathname;
        loc += '?module='+module+'&controller='+$(this).val();
        window.location.href = 'http://'+loc
    });
});