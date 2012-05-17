$(document).ready(function(){
    
    //method that handles change in permission field for page module
    pagePermissionHandler = function(e){
        if (droplist.val() == 'password_protected')
            $('#password_row').show();
        else 
            $('#password_row').hide();
    };
    //add onchange listener to the dropdown for permission
    var droplist = $('#permission_selector');
    droplist.change(pagePermissionHandler);
    //also, check on page load
    pagePermissionHandler();
    
    hideLabel = function(t){
    };
    
    
});
