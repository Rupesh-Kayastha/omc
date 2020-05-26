function notificationsend()
 {
        $.ajax({url: "notificationsend.php", success: function(result){
           if(result!='')
           {
              playsound();
              $("#allnotification").append(result);
           }
         }});
 }
 function playsound()
 {
  var filename="bing";
  document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="' + filename + '.mp3" type="audio/mpeg" /><source src="' + filename + '.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3" /></audio>';
 }

 setInterval(function(){notificationsend();},1000);
