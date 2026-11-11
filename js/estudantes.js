const lista = document.getElementById('lista-estudantes');

async function carregarEstudantes() {

    const resposta = await fetch('../php/estudante/get.php');

    const estudantes = await resposta.json();

    lista.innerHTML = '';

    estudantes.forEach(estudante => {

        const card = document.createElement('div');

        card.innerHTML = `
            <h3>${estudante.nome}</h3>
            <p>Email: ${estudante.email}</p>
            <p>CPF: ${estudante.cpf}</p>
            <p>Celular: ${estudante.celular}</p>

            <button onclick="editarEstudante('${estudante._id.$oid}')">
                Editar
            </button>

            <button onclick="excluirEstudante('${estudante._id.$oid}')">
                Excluir
            </button>

            <hr>
        `;

        lista.appendChild(card);
    });
}

async function excluirEstudante(id) {

    if (!confirm('Deseja realmente excluir este estudante?')) {
        return;
    }

    const resposta = await fetch(
        `../php/estudante/delete.php?id=${id}`,
        {
            method: 'DELETE'
        }
    );

    if (resposta.ok) {
        alert('Estudante excluído!');

        carregarEstudantes();
    }
}

async function editarEstudante(id) {

    const nome = prompt('Novo nome:');
    const email = prompt('Novo email:');
    const cpf = prompt('Novo CPF:');
    const celular = prompt('Novo celular:');

    if (!nome || !email || !cpf || !celular) {
        alert('Preencha todos os campos!');
        return;
    }

    const resposta = await fetch(
        `../php/estudante/update.php?id=${id}`,
        {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nome,
                email,
                cpf,
                celular,
                endereco: {}
            })
        }
    );

    if (resposta.ok) {
        alert('Estudante atualizado!');

        carregarEstudantes();
    }
}

carregarEstudantes();