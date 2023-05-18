$(function() {
    $("#btn_msg").on("click", function() {
      var id = $(this).attr('value');
      if (id != null) {
        var dados = {
          id_conversa: id,
          msg_usuario: msg_usuario
        };
        $.post('enviar_msg.php', dados, function(response) {
            $("#card_body").html(response);
        });
      }
    });
  });