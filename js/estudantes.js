
const lista = document.getElementById('lista-estudantes');
const listaCursos = document.getElementById('lista-cursos');

let cursosMap = {};


// GET ESTUDANTES

async function carregarEstudantes() {

    const resposta = await fetch('../php/estudante/get.php');

    const estudantes = await resposta.json();

    lista.innerHTML = '';

    estudantes.forEach(estudante => {

        const card = document.createElement('div');

        const nomesCursos = estudante.cursos?.length
            ? estudante.cursos.map(curso => {
                const id = curso.$oid || curso;
                return cursosMap[id] || 'Curso não encontrado';
            }).join(', ')
            : 'Nenhum curso';

        card.innerHTML = `
            <h3>${estudante.name}</h3>

            <p>Email: ${estudante.email}</p>
            <p>Cursos: ${nomesCursos}</p>
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


// DELETE ESTUDANTE

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
    } else {
        alert('Erro ao excluir estudante!');
    }
}


// PUT ESTUDANTE

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
                name: nome,
                email: email,
                cpf: cpf,
                celular: celular
            })
        }
    );

    if (resposta.ok) {
        alert('Estudante atualizado!');
        carregarEstudantes();
    } else {
        alert('Erro ao atualizar estudante!');
    }
}


// checkbox cursos em estudantes

async function carregarCursos() {

    const resposta = await fetch('../php/cursos/get.php');

    const cursos = await resposta.json();

    listaCursos.innerHTML = '';

    cursosMap = {};

    if (cursos.length === 0) {
        listaCursos.textContent = 'Nenhum curso cadastrado.';
        return;
    }

    cursos.forEach(curso => {

        const id = curso._id.$oid;

        // Guardar ID e nome do curso
        cursosMap[id] = curso.name;

        const label = document.createElement('label');
        label.classList.add('curso-item');

        const checkbox = document.createElement('input');

        checkbox.type = 'checkbox';
        checkbox.name = 'cursos[]';
        checkbox.value = id;
        checkbox.required = true;

        const nome = document.createElement('span');
        nome.textContent = curso.name;

        label.appendChild(checkbox);
        label.appendChild(nome);

        listaCursos.appendChild(label);

    });

}


// INICIALIZAÇÃO

async function iniciar() {

    await carregarCursos();

    await carregarEstudantes();

}

iniciar();


// Gustavo Pacheco Delazari + IA
