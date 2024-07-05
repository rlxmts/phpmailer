$(document).ready(function() {
    $('#formulario').on('submit', function(event) {
        event.preventDefault(); // Impede o envio normal do formulário
        $('#bt-form').text('Enviando e-mail...');

        $.ajax({
            url: 'email.php',
            method: 'post',
            data: $(this).serialize(),
            success: function(response) {
                $('#resposta').html(response); // Exibe a resposta na div #response
                $('#formulario')[0].reset(); // Reseta o formulário
            },
            error: function(xhr, status, error) {
                $('#resposta').html('Ocorreu um erro: ' + error);
            }
        });
    });
});

