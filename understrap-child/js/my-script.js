'use strict';
jQuery( function( $ ){
    $( '#filter-button' ).click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'http://test-vizual-tech.s-host.net/wp-content/themes/understrap-child/myajax.php',
            method: 'POST',
            dataType: 'json',
            data: $('#dad-form').serialize(),
            success: function(data){
                ShowResult(data);
            }
        });
    });
});
function ShowResult(data){
    let myCollection = document.getElementsByClassName('real-estate-item');
    for (let i=0; i<myCollection.length; i++){
        myCollection[i].classList.add('hide-item');
    }
    if(data.length){
        for(let i=0; i<data.length; i++){
            document.getElementById("real-estate-item-"+data[i]).classList.remove('hide-item');
        }
    }else{
        document.getElementById('filter-error').classList.remove('hide-item');
    }
}