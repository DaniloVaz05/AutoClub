// script.js
document.addEventListener("DOMContentLoaded", function() {
    // Pré-loader
    const preloader = document.getElementById('preloader');
    setTimeout(() => {
        preloader.style.display = 'none';
    }, 2000); // Tempo de exibição do pré-loader

    const form = document.getElementById("desgasteForm");
    const progressBar = document.getElementById("progress");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const tempo = parseInt(document.getElementById("tempo").value);
        const marca = document.getElementById("marca").value;
        const tipo = document.getElementById("tipo").value;

        const desgaste = (tempo / 60) * 100; // Considerando 12 meses como 100%

        // Atualiza a barra de progresso
        progressBar.style.width = `${desgaste}%`;
        progressBar.innerText = `${desgaste.toFixed(2)}%`;

        // Alerta se o desgaste é perigoso
        if (desgaste > 80) {
            alert(`Atenção! O pneu da marca ${marca} (${tipo}) atingiu ${desgaste.toFixed(2)}%, o que é considerado perigoso!`);
        }
    });

    // Formulário de feedback
    const feedbackForm = document.getElementById("feedbackForm");
    feedbackForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const feedbackName = document.getElementById("feedbackName").value;
        const feedbackMessage = document.getElementById("feedbackMessage").value;
        alert(`Obrigado pelo seu feedback, ${feedbackName}! Sua mensagem foi recebida.`);
        feedbackForm.reset();
    });
});
