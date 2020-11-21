
$(document).ready(function () {

  $('#formLogin').submit(function (event) {
    event.preventDefault();
    // $('#form_register').attr('disabled', 'disabled');
    $.ajax({
      type: 'POST',
      url: BASE_URL + 'login/access',
      data: $('#formLogin').serialize(),
      success: (result) => {
        const data = JSON.parse(result);
        if (data.status == "Sucess") {
          window.location.href = `${BASE_URL}home`;
          return;
        }
        $.suiAlert({
          title: 'Ops',
          description: data.menssagen,
          type: 'error',
          time: '6',
          position: 'bottom-right',
        });
        return;

      },
      error: (error) => {
        console.log(error);
      }
    });
  });

  $('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  }).sidebar('attach events', '.menu .item');

});

