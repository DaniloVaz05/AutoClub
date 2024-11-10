// Evento de clique para o botão "Enviar E-mail"
document.getElementById("sendEmailButton").addEventListener("click", function () {
    const email = document.getElementById("email").value;
    const nome = document.getElementById("nome").value;

    // Validação do e-mail
    if (!validateEmail(email)) {
        alert("Por favor, insira um e-mail válido.");
        return;
    }

    // Envia os dados do formulário ao backend usando fetch
    fetch('../includes/recuperar_senha.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${encodeURIComponent(email)}&nome=${encodeURIComponent(nome)}`
    })
    .then(response => response.text())
    .then(response => {
        if (response.includes('Um link de redefinição de senha foi enviado')) {
            showMessageBox('Um link de redefinição de senha foi enviado para o seu e-mail.');
        } else {
            alert(response); // Mostra o erro retornado pelo PHP
        }
    })
    .catch(error => {
        alert("Erro ao conectar com o servidor. Por favor, tente novamente.");
    });
});