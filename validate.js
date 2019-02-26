$(document).ready(function(){

  var email = '';

  $('#email').keyup(function(){
      var value = $(this).val();

      $.ajax({
          type:'POST',
          url:'action.php',
          data:'email='+value,
          success:function(msg){

            if(msg == 'valid'){
              $('#message').html('<font color="green">Этот Email можно использовать.</font>');
              email = value;
            }else{
              $('#message').html('<font color="red">Этот Email уже занят.</font>');
            }
          }
        });
    });

    $('#submit').click(function(){

      if(email == ''){
        alert('Please, put data to all email');
      }else{
        $.ajax({
          type: 'POST',
          url:'action.php',
          data:'add_email='+email,
          success:function(msg){
            $('#message').html('<font color="red">Этот Email уже занят.</font>');
          }
        });
      }
    });

});