// Função para carregar o boletim do localStorage
function carregarBoletim() {
    const boletim = JSON.parse(localStorage.getItem('boletim')) || [];
    const tabela = document.getElementById("tabelaBoletim").getElementsByTagName("tbody")[0];

    tabela.innerHTML = ''; // Limpa a tabela antes de repovoar

    boletim.forEach(item => {
        const novaLinha = tabela.insertRow();

        // Define a classe para o status com base na aprovação
        const statusClass = item.status === "Aprovado" ? "status-aprovado" : "status-reprovado";

        novaLinha.innerHTML = `
            <td>${item.nome}</td>
            <td>${item.materia}</td>
            <td>${item.turma}</td>
            <td>${item.notaFinal}</td>
            <td class="${statusClass}">${item.status}</td> <!-- Classe para o status -->
            <td><button class="delete-btn">Excluir</button></td>
        `;
    });
}

// Função para manipular o envio do formulário
document.getElementById("formNotas").addEventListener("submit", function(event) {
    event.preventDefault();

    // Coletando os dados do formulário
    const nome = document.getElementById("nome").value;
    const materia = document.getElementById("materia").value;
    const turma = document.getElementById("turma").value;
    const nota1 = parseFloat(document.getElementById("nota1").value);
    const nota2 = parseFloat(document.getElementById("nota2").value);
    const nota3 = parseFloat(document.getElementById("nota3").value);

    // Calculando o total das notas e o status
    const notaFinal = nota1 + nota2 + nota3;
    const status = notaFinal >= 15 ? "Aprovado" : "Reprovado";

    // Criando um objeto com os dados
    const novoRegistro = {
        nome,
        materia,
        turma,
        notaFinal: notaFinal.toFixed(2),
        status
    };

    // Recuperando o boletim do localStorage
    let boletim = JSON.parse(localStorage.getItem('boletim')) || [];

    // Adicionando o novo registro ao boletim
    boletim.push(novoRegistro);

    // Salvando os dados no localStorage
    localStorage.setItem('boletim', JSON.stringify(boletim));

    // Recarregar a tabela
    carregarBoletim();

    // Limpando os campos após o envio
    document.getElementById("formNotas").reset();
});

// Função para excluir registros
document.getElementById("tabelaBoletim").addEventListener("click", function(event) {
    if (event.target && event.target.matches("button.delete-btn")) {
        const linha = event.target.closest("tr");
        const nome = linha.cells[0].textContent;

        // Recuperando o boletim do localStorage
        let boletim = JSON.parse(localStorage.getItem('boletim')) || [];

        // Removendo o item com o nome correspondente
        boletim = boletim.filter(item => item.nome !== nome);

        // Salvando novamente no localStorage
        localStorage.setItem('boletim', JSON.stringify(boletim));

        // Removendo a linha da tabela
        linha.remove();
    }
});

// Carregar os registros do boletim ao inicializar a página
window.onload = carregarBoletim;
