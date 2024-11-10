document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("desgasteForm");
    const progressBar = document.getElementById("progress");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const quilometragem = parseInt(document.getElementById("quilometragem").value);
        const marca = document.getElementById("marca").value;
        const tipo = document.getElementById("tipo").value;

        // Validar quilometragem
        if (quilometragem < 0) {
            alert("A quilometragem não pode ser negativa!");
            return;
        }

        const vidaUtil = 50000;
        let desgaste = (quilometragem / vidaUtil) * 100;

        if (desgaste < 1 && quilometragem > 0) {
            desgaste = 1;
        }

        if (desgaste > 100) {
            desgaste = 100;
        }

        progressBar.style.width = `${desgaste}%`;
        progressBar.innerText = `${desgaste.toFixed(2)}%`;

        // Aplicar as cores de acordo com o desgaste
        if (desgaste < 50) {
            progressBar.style.backgroundColor = 'green'; // Baixo desgaste
        } else if (desgaste < 80) {
            progressBar.style.backgroundColor = 'yellow'; // Desgaste moderado
        } else {
            progressBar.style.backgroundColor = 'red'; // Alto desgaste
        }

        if (desgaste > 80) {
            alert(`Atenção! O pneu da marca ${marca} (${tipo}) atingiu ${desgaste.toFixed(2)}%, o que é considerado perigoso!`);
        }
    });

    const feedbackForm = document.getElementById("feedbackForm");
    feedbackForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const feedbackName = document.getElementById("feedbackName").value;
        const feedbackMessage = document.getElementById("feedbackMessage").value;

        const confirmationMessage = document.createElement('p');
        confirmationMessage.textContent = `Obrigado pelo seu feedback, ${feedbackName}!`;
        confirmationMessage.style.color = 'green';
        feedbackForm.appendChild(confirmationMessage);

        feedbackForm.reset();
    });
});
