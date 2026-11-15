
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #160d2e, #28134d, #402078);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 850px;
            text-align: center;
        }

        .titulo {
            margin-bottom: 45px;
            color: white;
        }

        .titulo h1 {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .titulo p {
            color: #c5b6df;
            font-size: 15px;
        }

        .opcoes {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 40px 25px;
            border-radius: 18px;
            text-decoration: none;
            color: #29213d;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
        }

        .icone {
            font-size: 45px;
            margin-bottom: 20px;
        }

        .card h2 {
            color: #5424a8;
            margin-bottom: 12px;
        }

        .card p {
            color: #81778f;
            font-size: 14px;
            line-height: 1.5;
        }

        .rodape {
            margin-top: 35px;
            color: #c5b6df;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .opcoes {
                grid-template-columns: 1fr;
            }

            .titulo h1 {
                font-size: 25px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="titulo">
            <h1>Sistema de Cadastro</h1>
            <p>Selecione o que deseja gerenciar</p>
        </div>

        <div class="opcoes">

            <a href="pages/estudante.html" class="card">

                <div class="icone">🎓</div>

                <h2>Estudantes</h2>

                <p>
                    Cadastrar, visualizar, editar e excluir
                    estudantes.
                </p>

            </a>

            <a href="pages/cursos.html" class="card">

                <div class="icone">📚</div>

                <h2>Cursos</h2>

                <p>
                    Cadastrar, visualizar, editar e excluir
                    cursos.
                </p>

            </a>

        </div>

        <div class="rodape">
            Sistema de Cadastro de Estudantes e Cursos
        </div>

    </div>

</body>

</html>
