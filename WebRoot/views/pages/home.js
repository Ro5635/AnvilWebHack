  $('#StartGame').click(function(){

    
    var data = 'AJAXSection=GetYouTubeVideoByProductID&ProductID=' + ProductID ;

       $.ajax({
            url: "AJAXEditProduct.php",
            type: "POST",
            data: data,
            cache: false,
            success: function(reternedData) {
              $('#VideoCamoflarge').show();
              $('#VideoPlayer').html(decodeURIComponent(reternedData))
              $('#VideoPlayerContainer').slideDown();
            }
        });

  });