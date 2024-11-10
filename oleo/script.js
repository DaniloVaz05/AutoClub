document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("oleoForm");
    const progressBar = document.getElementById("progress");
    const kmRestantesElement = document.getElementById("km_restantes");
    const recomendacao = document.getElementById("recomendacao");
    const historicoDiv = document.getElementById("historico");
    
    // Carregar histórico de trocas do localStorage
    const historico = JSON.parse(localStorage.getItem('historicoOleo')) || [];
    if (historico.length > 0) {
        historicoDiv.innerHTML = "<h4>Histórico de Trocas:</h4>";
        historico.forEach(item => {
            historicoDiv.innerHTML += `<p>Quilometragem: ${item.quilometragemOleo} km</p>`;
        });
    }

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const quilometragemOleo = parseInt(document.getElementById("quilometragem_oleo").value);
        const tipoOleo = document.getElementById("tipo_oleo").value;

        const vidaUtilOleo = {
            "sintetico": 10000,
            "semi-sintetico": 7500,
            "mineral": 5000
        };

        let nivelOleo = (quilometragemOleo / vidaUtilOleo[tipoOleo]) * 100;

        if (nivelOleo < 1 && quilometragemOleo > 0) {
            nivelOleo = 1;
        }

        if (nivelOleo > 100) {
            nivelOleo = 100;
        }

        progressBar.style.width = `${nivelOleo}%`;
        progressBar.innerText = `${nivelOleo.toFixed(2)}%`;

        //
    