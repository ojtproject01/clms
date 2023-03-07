
$('document').ready(function () {

  $('#loginbttn').prop("disabled", true);

  $('#username, #password').on('keyup', function () {
    if ($('#username').val() == "" || $('#password').val() == "") {
      $('#loginbttn').prop("disabled", true);
      $('#loginbttn').removeClass("button--telesto");
      $('#loginbttn').html('<span><span><i class="fas fa-info-circle"></i> Incomplete fields</span></span>');
    } else {
      $('#loginbttn').prop("disabled", false);
      $('#loginbttn').addClass("button--telesto");
      $('#loginbttn').html('<span><span><i class="fas fa-sign-in-alt"></i> Login</span></span>');
    }
  });
  $("#password").keypress(function (event) {
    if (event.keyCode === 13) {
      $("#loginbttn").click();
    }
  });

  $("#loginbttn").click(function () {
    $('#loginbttn').html('<span><span> Logging in... <i class="fa fa-spinner fa-spin fa-1x fa-fw text-danger"></i></span></span>');
    $('#loginbttn').prop("disabled", true);

    $.ajax({
      type: 'POST',
      url: 'api/index.php?mode=authenticate',
      dataType: 'text',
      cache: false,
      data: JSON.stringify({
        username: $('#username').val(),
        password: $('#password').val(),
      }),
      success: function (result) {
        let usersToString = JSON.stringify(result);
        console.log(usersToString)
        switch (result) {
          case "login":
            window.location.replace("dashboard.php");
            break;
          case "invalidpass":
            alertCenter(invalidPassword, icon_error, 'FAILED!');
            break;
          case "notexist":
            alertCenter(userNotExist, icon_error, 'FAILED!');
            break;
          case "failed":
            alertCenterTimer(somethingWentWrongContactIT, icon_error, 'FAILED!')
            .then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.reload();
              }
            })
            break;
        }
        $('#loginbttn').html('<span><span><i class="fas fa-sign-in-alt"></i> Login</span></span>');
        $('#loginbttn').prop("disabled", false);
      },
      error: function(){
        alertCenter(somethingWentWrongContactIT, icon_error);
        $('#loginbttn').html('<span><span><i class="fas fa-sign-in-alt"></i> Login</span></span>');
        $('#loginbttn').prop("disabled", false);
      }
    });

    
  });
});