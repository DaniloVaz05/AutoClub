<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">
    <!-- biblioteca de máscara do javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  ---------------------------------------------------------------------------------------------------------------------------- -->
    <title>AutoClub | Cadastro</title>
    <script src="../js/mascaras.js"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid"
                    style="max-width: 80px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/home/home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre_nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./login.html">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container para os Botões de Acessibilidade -->
    <div class="accessibility-buttons">
        <!-- Modo Claro / Escuro -->
        <button id="mode-toggle" class="btn"><i class="fas fa-moon"></i></button>
        <!-- Aumentar Fonte -->
        <button id="increase-font" class="btn"><i class="fas fa-search-plus"></i></button>
        <!-- Diminuir Fonte -->
        <button id="decrease-font" class="btn"><i class="fas fa-search-minus"></i></button>
    </div>


    <div class="container">
        <section class="cadastro-section">
            <h2>Cadastro de Usuário</h2>
            <hr>
            <br>
            <form id="formCadastro" action="../includes/cadastrar_usuario.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="nome"
                        placeholder="Digite seu nome completo">
                </div>

                <div class="mb-3" id="nomeMaternoContainer">
                    <label for="nomeMaterno" class="form-label">Nome Materno</label>
                    <input type="text" class="form-control" name="nomeMaterno" id="nomeMaterno"
                        placeholder="Digite o nome materno">
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF">
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone"
                        placeholder="Digite seu telefone">
                </div>

                <div class="mb-3" id="dataNascimentoContainer">
                    <label for="dataNasc" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" name="dataNasc" id="dataNasc">
                </div>

                <div class="mb-3" id="sexoContainer">
                    <label class="form-label">Gênero</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="M">
                            <label class="form-check-label" for="sexoMasculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="sexoFeminino" value="F">
                            <label class="form-check-label" for="sexoFeminino">Feminino</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite seu CEP">
                </div>

                <div class="mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro"
                        placeholder="Rua/Avenida/Estrada">
                </div>

                <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Nº" oninput="mascaraTelefone(this)">
                </div>

                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite seu bairro">
                </div>

                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite sua cidade">
                </div>

                <div class="mb-3">
                    <label for="uf" class="form-label">UF</label>
                    <select class="form-select" name="uf" id="uf">
                        <option selected>Selecione um estado</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="******"
                            pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@$!%*?&]{6,12}$"
                            title="A senha deve conter de 6 a 12 caracteres, incluindo pelo menos uma letra maiúscula, um número e um caractere especial." required>
                        <span class="input-group-text">
                            <i id="toggleSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenha"
                            placeholder="******" required>
                        <span class="input-group-text">
                            <i id="toggleConfirmarSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-3" id="assinaturaContainer">
                    <label class="form-label">Assinatura <span id="tooltip">❓
                            <span id="tooltiptext">A assinatura é um procedimento obrigatório. Ao assinar conosco, você
                                contribui com um valor simbólico de R$10,00 por mês.</span>
                        </span>
                    </label>
                    <p class="text-start">Deseja assinar conosco?</p>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="assinatura" id="opcaoSim" value="1">
                            <label class="form-check-label" for="opcaoSim">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="assinatura" id="opcaoNao" value="0">
                            <label class="form-check-label" for="opcaoNao">Não</label>
                        </div>
                    </div>
                </div>

                <div class="acoes-cadastro">
                    <button type="submit" class="btn cadastrar" onclick="validateInputs();">Cadastrar</button>
                    <button type="button" class="btn limpar" id="limparCampos">Limpar</button>
                </div>
            </form>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        // Função para alternar a visibilidade da senha
        document.getElementById('toggleSenha').addEventListener('click', function() {
            const senhaInput = document.getElementById('senha');
            const senhaIcon = document.getElementById('toggleSenha');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                senhaIcon.classList.remove('fa-eye');
                senhaIcon.classList.add('fa-eye-slash');
            } else {
                senhaInput.type = 'password';
                senhaIcon.classList.remove('fa-eye-slash');
                senhaIcon.classList.add('fa-eye');
            }
        });

        // Função para alternar a visibilidade da confirmação de senha
        document.getElementById('toggleConfirmarSenha').addEventListener('click', function() {
            const confirmarSenhaInput = document.getElementById('confirmarSenha');
            const confirmarSenhaIcon = document.getElementById('toggleConfirmarSenha');

            if (confirmarSenhaInput.type === 'password') {
                confirmarSenhaInput.type = 'text';
                confirmarSenhaIcon.classList.remove('fa-eye');
                confirmarSenhaIcon.classList.add('fa-eye-slash');
            } else {
                confirmarSenhaInput.type = 'password';
                confirmarSenhaIcon.classList.remove('fa-eye-slash');
                confirmarSenhaIcon.classList.add('fa-eye');
            }
        });
    </script>


    <script>
        document.getElementById('limparCampos').addEventListener('click', function() {
            document.getElementById('formCadastro').reset();
            updateFormFields(); // Reset the fields on clear
        });

        document.getElementById('tipoCadastro').addEventListener('change', updateFormFields);

        function updateFormFields() {
            const tipo = document.getElementById('tipoCadastro').value;
            const nomeLabel = document.querySelector('label[for="nomeCompleto"]');
            const documentoLabel = document.querySelector('label[for="documento"]');
            const documentoInput = document.getElementById('documento');
            const emailInput = document.getElementById('email');
            const dataNascimentoContainer = document.getElementById('dataNascimentoContainer');
            const generoContainer = document.getElementById('generoContainer');

            if (tipo === 'empresa') {
                nomeLabel.innerText = 'Nome da Empresa';
                documentoLabel.innerText = 'CNPJ';
                documentoInput.placeholder = 'Digite seu CNPJ';
                emailInput.placeholder = 'Digite seu email profissional';
                dataNascimentoContainer.style.display = 'none';
                generoContainer.style.display = 'none';
                nomeMaternoContainer.style.display = 'none';
            } else {
                nomeLabel.innerText = 'Nome Completo';
                documentoLabel.innerText = 'CPF';
                documentoInput.placeholder = 'Digite seu CPF';
                emailInput.placeholder = 'Digite seu email';
                dataNascimentoContainer.style.display = 'block';
                generoContainer.style.display = 'block';
            }
        }

        // Initialize the form on load
        updateFormFields();
    </script>

    <script>
        document.getElementById('toggleSenha').addEventListener('click', function() {
            const senhaInput = document.getElementById('senha');
            const senhaIcon = document.getElementById('toggleSenha');

            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                senhaIcon.classList.remove('fa-eye');
                senhaIcon.classList.add('fa-eye-slash');
            } else {
                senhaInput.type = 'password';
                senhaIcon.classList.remove('fa-eye-slash');
                senhaIcon.classList.add('fa-eye');
            }
        });

        document.getElementById('toggleConfirmarSenha').addEventListener('click', function() {
            const confirmarSenhaInput = document.getElementById('confirmarSenha');
            const confirmarSenhaIcon = document.getElementById('toggleConfirmarSenha');

            if (confirmarSenhaInput.type === 'password') {
                confirmarSenhaInput.type = 'text';
                confirmarSenhaIcon.classList.remove('fa-eye');
                confirmarSenhaIcon.classList.add('fa-eye-slash');
            } else {
                confirmarSenhaInput.type = 'password';
                confirmarSenhaIcon.classList.remove('fa-eye-slash');
                confirmarSenhaIcon.classList.add('fa-eye');
            }
        });
    </script>

    <!-- JS modo escuro -->
    <script>
        document.getElementById('mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const currentMode = document.body.classList.contains('dark-mode') ? 'Escuro' : 'Claro';
        });
    </script>

    <!-- JS Aumentar e diminuir tamanho da fonte -->
    <script>
        let fontSize = 16;

        document.getElementById('increase-font').addEventListener('click', function() {
            fontSize += 2;
            document.body.style.fontSize = fontSize + 'px';
        });

        document.getElementById('decrease-font').addEventListener('click', function() {
            fontSize -= 2;
            document.body.style.fontSize = fontSize + 'px';
        });
    </script>

    <script src="cadastro.js"></script>
</body>

</html>