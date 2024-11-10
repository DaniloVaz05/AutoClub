document.getElementById('changeImageBtn').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const perfilImagem = document.querySelector('.perfil-imagem');
        perfilImagem.src = e.target.result; // Atualiza a imagem de perfil com a nova imagem
    };

    if (file) {
        reader.readAsDataURL(file); // Lê o arquivo como uma URL de dados
    }
});
