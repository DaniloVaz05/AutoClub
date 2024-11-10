$(document).ready(function () {
    $('#cep').on('blur', function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep !== "") {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.getJSON(url, function (data) {
                if (!("erro" in data)) {
                    $('#logradouro').val(data.logradouro);
                    $('#bairro').val(data.bairro);
                    $('#complemento').val(data.complemento);
                    $('#cidade').val(data.localidade); // Adiciona cidade
                } else {
                    alert("CEP não encontrado.");
                }
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var cnpjInput = document.getElementById('cnpj');
    var cnpjMask = IMask(cnpjInput, {
        mask: '00.000.000/0000-00'
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var cepInput = document.getElementById('cep');
    var cepMask = IMask(cepInput, {
        mask: '00000-000'
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var cpfInput = document.getElementById('cpf');
    var cpfMask = IMask(cpfInput, {
        mask: '000.000.000-00'
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var telefoneInput = document.getElementById('telefone');
    var telefoneMask = IMask(telefoneInput, {
        mask: '(00)00000-0000'
    });
});