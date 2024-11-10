/* document.addEventListener('DOMContentLoaded', function () {
    // Mostrar/Ocultar Senha
    const senhaInput = document.getElementById('senha');

    document.getElementById('toggleSenha').addEventListener('click', function () {
        const tipo = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
        senhaInput.setAttribute('type', tipo);
        this.classList.toggle('fa-eye-slash'); // Muda o ícone
        this.classList.toggle('fa-eye');
    });

    // Função para verificar erros nos inputs
    function validateInputs() {
        let isValid = true;

        // Limpa os estilos de erro
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.classList.remove('input-error');
        });

        // Verifica se os campos obrigatórios estão vazios
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                input.classList.add('input-error');
                isValid = false;
            }
        });

        return isValid;
    }
   
    // Evento de submissão do formulário
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio do formulário para processar os dados

        if (!validateInputs()) {
            return; // Se a validação falhar, não prossegue
        }

        // Captura os dados do formulário
        const login = document.getElementById('login').value;
        const senha = document.getElementById('senha').value;

        // Recupera os dados do Local Storage
        const usuario = JSON.parse(localStorage.getItem('usuario'));

        // Verifica se o usuário existe e se a senha está correta
     if (usuario && usuario.login === login && usuario.senha === senha) {
            alert('Login realizado com sucesso!');
            // Redireciona para a página principal ou outra página
            window.location.href = '../homeV2/home_logado.html';
        } else {
            alert('Login ou senha incorretos!');
        }
    });

    // Limpar campos do formulário
    document.getElementById('limparCampos').addEventListener('click', function () {
        form.reset();
    });
});
 */