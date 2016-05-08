$(document).ready(main())



function main(){

  $('.StartGame').click(function(){
     $('.StartGameForm').slideDown();


  });

    $('#SubmitCreateGameForm').click(function(){

    
    var data = 'NewName=' + $("input[name=NameOfNewGame]").val(); ;


       $.ajax({
            url: "/ajax/createnewgame",
            type: "POST",
            data: data,
            cache: false,
            success: function(reternedData) {

            }
        });

  });



    $('#INCRotation').click(function(){

       $.ajax({
            url: "ajax/inczvalue",
            type: "POST",
            cache: false,
            success: function(reternedData) {

            }
        });

  });



    $('#DECRotation').click(function(){


       $.ajax({
            url: "ajax/deczvalue",
            type: "POST",
            cache: false,
            success: function(reternedData) {

            }
        });

  });






 var interval = 100;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax() {
    $.ajax({
            type: 'POST',
            url: 'ajax/getzvalue',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                    $zvalue = data;// first set the value
                    $('#CurrantVAlRot').html(data);    
            },
            complete: function (data) {
                    // Schedule the next
                    setTimeout(doAjax, interval);
            }
    });
}
setTimeout(doAjax, interval);


  //   $('#StartGame').click(function(){

    
  //   var data = 'AJAXSection=GetYouTubeVideoByProductID&ProductID=' + ProductID ;

  //      $.ajax({
  //           url: "AJAXEditProduct.php",
  //           type: "POST",
  //           data: data,
  //           cache: false,
  //           success: function(reternedData) {
  //             $('#VideoCamoflarge').show();
  //             $('#VideoPlayer').html(decodeURIComponent(reternedData))
  //             $('#StartGameForm').slideDown();
  //           }
  //       });

  // });
}