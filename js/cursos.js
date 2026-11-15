
const lista = document.getElementById('lista-cursos');

async function carregarCursos() {

    const resposta = await fetch('../php/cursos/get.php');

    const cursos = await resposta.json();

    lista.innerHTML = '';

    cursos.forEach(curso => {

        const card = document.createElement('div');

        card.innerHTML = `
            <h3>${curso.name}</h3>

            <p>Código: ${curso.codigo}</p>
            <p>Descrição: ${curso.descricao}</p>
            <p>Carga Horária: ${curso.carga_horaria}</p>
            <p>Modalidade: ${curso.modalidade}</p>

            <button onclick="editarCurso('${curso._id.$oid}')">
                Editar
            </button>

            <button onclick="excluirCurso('${curso._id.$oid}')">
                Excluir
            </button>

            <hr>
        `;

        lista.appendChild(card);
    });
}

// DELETE
async function excluirCurso(id) {

    if (!confirm('Deseja realmente excluir este curso?')) {
        return;
    }

    const resposta = await fetch(
        `../php/cursos/delete.php?id=${id}`,
        {
            method: 'DELETE'
        }
    );

    if (resposta.ok) {
        alert('Curso excluído!');
        carregarCursos();
    } else {
        alert('Erro ao excluir curso!');
    }
}

// PUT
async function editarCurso(id) {

    const nome = prompt('Novo nome:');
    const codigo = prompt('Novo código:');
    const descricao = prompt('Nova descrição:');
    const carga_horaria = prompt('Nova carga horária:');
    const modalidade = prompt('Nova modalidade:');

    if (!nome || !codigo || !descricao || !carga_horaria || !modalidade) {
        alert('Preencha todos os campos!');
        return;
    }

    const resposta = await fetch(
        `../php/cursos/update.php?id=${id}`,
        {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                nome: nome,
                codigo: codigo,
                descricao: descricao,
                carga_horaria: carga_horaria,
                modalidade: modalidade
            })
        }
    );

    if (resposta.ok) {
        alert('Curso atualizado!');
        carregarCursos();
    } else {
        alert('Erro ao atualizar curso!');
    }
}

carregarCursos();
