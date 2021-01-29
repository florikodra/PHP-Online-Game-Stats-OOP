$('.play-button').click(function(){
    $('.play-button').attr("disabled", false).text('PLAY').addClass('btn-success').removeClass('btn-warning');
    buttonId = this.id;
    var currentLocation = window.location;
    $.ajax({
        type: "POST",
        data: {buttonId:buttonId},
        url: currentLocation,
        success: function(data){  
            checkClicked(data);        
        }
       
        });

});

function checkClicked(id){
    var buttonId = parseInt(id);

    $("#"+buttonId).attr("disabled", true).text('CLICKED').removeClass('btn-success').addClass('btn-warning');

}