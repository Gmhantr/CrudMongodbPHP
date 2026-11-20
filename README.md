# Cadastro de Estudantes e Cursos

Projeto web para gerenciamento de estudantes e cursos, utilizando PHP, JavaScript, HTML, CSS e MongoDB.

## Requisitos para rodar o projeto

### Setup de ambiente

Para executar o projeto, é necessário ter instalado:

- [PHP](https://www.php.net/)
- [MongoDB](https://www.mongodb.com/)
- [MongoDB PHP Driver](https://www.php.net/docs.php)
- [Visual Studio Code](https://code.visualstudio.com/)
- Navegador web(google, firefox, opera, etc).

### Como rodar na minha máquina?

1. Clone o projeto:

   ```bash
   git clone URL_DO_REPOSITORIO
   ```

2. Entre na pasta do projeto:

   ```bash
   cd cadastro-php-mongodb
   ```

3. Certifique-se de que o MongoDB esteja em execução.

4. Verifique se a extensão MongoDB está habilitada no PHP.

5. Configure a conexão com o banco de dados no arquivo `php/connection.php`.

6. Inicie o servidor PHP:

   ```bash
   php -S localhost:8000
   ```

7. Acesse no navegador:

   - Cadastro de estudantes: `http://localhost:8000/pages/cadastro-estudante.html`
   - Cadastro de cursos: `http://localhost:8000/pages/cadastro-cursos.html`

Pronto! O projeto estará disponível localmente.

---

## Estrutura do projeto

O projeto está organizado em pastas para separar a interface, as operações do backend e os estilos.

```text
cadastro-php-mongodb/
│
├── pages/
│   ├── cadastro-cursos.html
│   └── cadastro-estudante.html
│
├── php/
│   ├── cursos/
│   │   ├── create.php
│   │   ├── get.php
│   │   ├── update.php
│   │   └── delete.php
│   │
│   ├── estudante/
│   │   ├── create.php
│   │   ├── get.php
│   │   ├── update.php
│   │   └── delete.php
│   │
│   └── connection.php
│
├── index.php
├── index.css
│
└── README.md
```

### Descrição das pastas e arquivos

- `./pages`: Contém as páginas HTML do sistema.
  - `cadastro-cursos.html`: Interface para cadastro e gerenciamento dos cursos.
  - `cadastro-estudante.html`: Interface para cadastro e gerenciamento dos estudantes.

- `./php`: Contém os arquivos PHP responsáveis pela comunicação com o banco de dados.
  - `connection.php`: Responsável por estabelecer a conexão com o MongoDB.

- `./php/cursos`: Contém as operações relacionadas aos cursos.
  - `create.php`: Cadastra um novo curso.
  - `get.php`: Consulta os cursos cadastrados.
  - `update.php`: Atualiza as informações de um curso.
  - `delete.php`: Exclui um curso.

- `./php/estudante`: Contém as operações relacionadas aos estudantes.
  - `create.php`: Cadastra um estudante, incluindo informações pessoais, endereço e cursos selecionados.
  - `get.php`: Consulta os estudantes cadastrados.
  - `update.php`: Atualiza as informações de um estudante.
  - `delete.php`: Exclui um estudante.

- `.index.css`: Toda a estilização CSS responsáveis pela aparência das páginas.
- `.index.php`: Pagina Principal, onde se encontra a escolha de cadastro.

---

## Entendendo a arquitetura do projeto

O projeto utiliza uma separação entre frontend e backend.

### Frontend

Desenvolvido com HTML, CSS e JavaScript.

É responsável pela interface que permite ao usuário:

- Cadastrar estudantes.
- Cadastrar cursos.
- Visualizar os registros.
- Editar informações.
- Excluir registros.
- Selecionar cursos durante o cadastro de estudantes.

### Backend

Desenvolvido em PHP.

É responsável por receber as requisições do frontend, processar os dados e executar as operações necessárias no MongoDB.

### Banco de dados

O projeto utiliza o MongoDB, um banco de dados NoSQL que trabalha com documentos.

Os dados dos estudantes e cursos são armazenados em coleções separadas.

---

## Como funciona o CRUD?

O sistema utiliza o conceito de CRUD, que representa as quatro operações fundamentais de manipulação de dados.

| Operação | Significado | Responsabilidade |
|---|---|---|
| Create | Criar | Cadastrar novos estudantes e cursos. |
| Read | Ler | Consultar os registros armazenados. |
| Update | Atualizar | Modificar informações existentes. |
| Delete | Excluir | Remover registros do banco de dados. |

Cada operação possui um arquivo PHP responsável por executar a ação correspondente.

---

## Comunicação entre JavaScript e PHP

A comunicação entre frontend e backend é realizada utilizando a função `fetch()` do JavaScript.

Ela permite realizar requisições HTTP aos arquivos PHP, possibilitando carregar e manipular informações sem precisar recarregar toda a página.

### Exemplo de consulta dos cursos

```javascript
async function carregarCursos() {
    const resposta = await fetch('../php/cursos/get.php');

    const cursos = await resposta.json();

    console.log(cursos);
}
```

Nesse exemplo:

1. O JavaScript realiza uma requisição ao arquivo `get.php`.
2. O PHP consulta os cursos no MongoDB.
3. Os dados são retornados em formato JSON.
4. O JavaScript recebe os dados e pode utilizá-los para montar os elementos da página.

---

## Relacionamento entre estudantes e cursos

Um estudante pode estar associado a um ou mais cursos.

Durante o cadastro, o sistema consulta os cursos disponíveis no banco de dados e apresenta as opções para seleção.

Os cursos selecionados são enviados ao PHP por meio do formulário.

No MongoDB, o estudante armazena os identificadores dos cursos associados a ele, utilizando `ObjectId`.

Essa abordagem permite relacionar estudantes e cursos sem precisar duplicar todas as informações dos cursos dentro do documento do estudante.

---

## Banco de dados MongoDB

O MongoDB é utilizado para armazenar os dados do sistema em documentos.

Os registros de estudantes e cursos são armazenados separadamente, e cada documento possui um identificador único (`ObjectId`).

A conexão com o banco de dados fica centralizada no arquivo:

```text
php/connection.php
```

Dessa forma, os demais arquivos PHP podem utilizar a conexão para realizar operações de consulta, cadastro, atualização e exclusão.

---

## Tecnologias utilizadas

- **HTML5:** Estrutura das páginas.
- **CSS3:** Estilização e organização visual.
- **JavaScript:** Manipulação da interface e comunicação com o backend.
- **PHP:** Processamento das requisições e operações do sistema.
- **MongoDB:** Armazenamento dos dados.
- **MongoDB PHP Driver:** Integração entre PHP e MongoDB.

---

Desenvolvido para fins de estudo e prática de desenvolvimento web, manipulação de dados e integração entre frontend, backend e banco de dados.
Feito com auxilio de IA demarcados dentro do código o autor.
