document.addEventListener('DOMContentLoaded', function () {
    // Máscara para celular (11 dígitos)
    const celularInput = document.getElementById('celular');
    celularInput.addEventListener('input', function () {
        let celular = celularInput.value.replace(/\D/g, ''); // Remove tudo que não é número
        if (celular.length > 11) {
            celular = celular.slice(0, 11); // Limita a 11 dígitos
        }
        celular = celular.replace(/^(\d{2})(\d)/g, '($1) $2'); // Coloca parênteses em volta do DDD
        celular = celular.replace(/(\d{5})(\d{4})$/, '$1-$2'); // Coloca hífen entre o 5º e o 6º dígito
        celularInput.value = celular;
    });

    // Máscara para CPF e CNPJ
    const documentoInput = document.getElementById('documento');
    documentoInput.addEventListener('input', function () {
        let documento = documentoInput.value.replace(/\D/g, ''); // Remove tudo que não é número
        const tipoCadastro = document.getElementById('tipoCadastro').value;

        if (tipoCadastro === 'empresa') {
            // Máscara para CNPJ
            if (documento.length > 14) {
                documento = documento.slice(0, 14); // Limita a 14 dígitos
            }
            documento = documento.replace(/(\d{2})(\d)/, '$1.$2');
            documento = documento.replace(/(\d{3})(\d)/, '$1.$2');
            documento = documento.replace(/(\d{3})(\d{1,2})$/, '$1/$2');
            documento = documento.replace(/(\d{14})/, '$1-$2'); // Insere o hífen
        } else {
            // Máscara para CPF
            if (documento.length > 11) {
                documento = documento.slice(0, 11); // Limita a 11 dígitos
            }
            documento = documento.replace(/(\d{3})(\d)/, '$1.$2');
            documento = documento.replace(/(\d{3})(\d)/, '$1.$2');
            documento = documento.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        }

        documentoInput.value = documento;
    });

    // Validação de Email com REGEX
    const emailInput = document.getElementById('email');
    emailInput.addEventListener('input', function () {
        const email = emailInput.value;
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            emailInput.setCustomValidity('Por favor, insira um email válido.');
        } else {
            emailInput.setCustomValidity(''); // Limpa a mensagem de erro se o email for válido
        }
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

        // Verifica se as senhas são iguais
        const senhaInput = document.getElementById('senha');
        const confirmarSenhaInput = document.getElementById('confirmarSenha');
        if (senhaInput.value !== confirmarSenhaInput.value) {
            senhaInput.classList.add('input-error');
            confirmarSenhaInput.classList.add('input-error');
            isValid = false;
        }

        return isValid;
    }

    // Evento de submissão do formulário
    const form = document.getElementById('formCadastro');
    form.addEventListener('submit', function (event) {
        if (!validateInputs()) {
            event.preventDefault(); // Impede o envio do formulário se houver erros
        } else {
            // Captura os dados do formulário
            const nomeCompleto = document.getElementById('nomeCompleto').value;
            const documento = documentoInput.value; // CPF ou CNPJ
            const email = emailInput.value;
            const celular = celularInput.value;
            const dataNascimento = document.getElementById('dataNascimento').value;
            const genero = document.querySelector('input[name="genero"]:checked')?.value; // Captura o gênero selecionado
            const endereco = document.getElementById('endereco').value;
            const login = document.getElementById('login').value;
            const senha = document.getElementById('senha').value;

            // Cria um objeto com os dados do usuário
            const usuario = {
                nomeCompleto,
                documento,
                email,
                celular,
                dataNascimento,
                genero,
                endereco,
                login,
                senha
            };

            // Armazena os dados no Local Storage
            localStorage.setItem('usuario', JSON.stringify(usuario));

            // Exibe uma mensagem ou redireciona o usuário
            alert('Cadastro realizado com sucesso!');
        }
    });

    // Função para alternar visibilidade da senha
    function togglePasswordVisibility(toggleElement, inputElement) {
        toggleElement.addEventListener('click', function () {
            const type = inputElement.getAttribute('type') === 'password' ? 'text' : 'password';
            inputElement.setAttribute('type', type);
            toggleElement.classList.toggle('fa-eye-slash');
        });
    }

    const toggleSenha = document.getElementById('toggleSenha');
    const senhaInput = document.getElementById('senha');
    togglePasswordVisibility(toggleSenha, senhaInput);

    const toggleConfirmarSenha = document.getElementById('toggleConfirmarSenha');
    const confirmarSenhaInput = document.getElementById('confirmarSenha');
    togglePasswordVisibility(toggleConfirmarSenha, confirmarSenhaInput);

    // Limpar campos do formulário
    document.getElementById('limparCampos').addEventListener('click', function () {
        form.reset();
    });
});
