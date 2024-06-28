<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="{{ asset('assets/js/color-modes.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Classificação Brasileirão</title>
    <link rel="icon" href="images/icone.png" type="icone.png/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .cell-top-four {
            background-color: hsl(217, 72%, 45%, 0.5) !important;
            color: #fff;
        }
        .cell-middle-two {
            background-color: rgba(208, 112, 38, 0.5) !important;
            color: #fff;
        }
        .cell-middle-seven {
            background-color: hsla(136, 72%, 43%, 0.5) !important;
            color: #fff;
        }
        .cell-bottom-four {
            background-color: hsl(6, 80%, 46%, 0.5) !important;
            color: #fff;
        }
        .color-box {
            width: 15px;
            height: 15px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        .highlight {
            background-color: rgba(255, 255, 20, 0.493) !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('blog.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar"></div>
    </header>
    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" style="text-align: center">
            <div class="col-lg-12 px-0">
                <h1 class="display-4 fst-italic">Classificação Brasileirão Serie A</h1>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-12">
                <article class="blog-post">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th colspan="2">TIMES</th>
                                    <th>PONTOS</th>
                                    <th>JOGOS</th>
                                    <th>VITORIAS</th>
                                    <th>EMPATES</th>
                                    <th>DERROTAS</th>
                                    <th>GP</th>
                                    <th>GC</th>
                                    <th>SG</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $index => $row)
                                    @if ($index != 0)
                                        <tr id="team-{{ $index }}" data-time="{{ trim($row[1]) }}" onclick="selectTeam('{{ $index }}', '{{ trim($row[1]) }}')">
                                            <td class="@if ($index >= 1 && $index <= 4) cell-top-four
                                            @elseif($index >= 5 && $index <= 6)
                                                cell-middle-two
                                            @elseif($index >= 7 && $index <= 12)
                                                cell-middle-seven       
                                            @elseif($index > 16) cell-bottom-four @endif @if (isset($teamName) && $teamName == trim($row[1])) highlight @endif">
                                                {{ $index }}
                                            </td>
                                            <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif"><img src="images/{{ trim($row[1]) }}.png"
                                                style="height: 25px; vertical-align: middle; margin-right: 5px;"></td>
                                            <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif" style="text-align: start;">
                                                @if (trim($row[1]) == 'Sao Paulo')
                                                    São Paulo
                                                @elseif(trim($row[1]) == 'Cuiaba')
                                                    Cuiabá
                                                @elseif(trim($row[1]) == 'Atletico-MG')
                                                    Atlético-MG
                                                @elseif(trim($row[1]) == 'Atletico-GO')
                                                    Atlético-GO
                                                @elseif(trim($row[1]) == 'Vitoria')
                                                    Vitória
                                                @elseif(trim($row[1]) == 'Gremio')
                                                    Grêmio
                                                @elseif(trim($row[1]) == 'Criciuma')
                                                    Criciúma
                                                @else
                                                    {{ trim($row[1]) }}
                                                @endif
                                            </td>
                                            @foreach ($row as $cell_index => $cell)
                                                @if ($cell_index != 1)
                                                    <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif">{{ $cell }}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot class="table-dark">
                                <tr>
                                    <td colspan="3">
                                        <div class="color-box" style="background-color:#2161c7"></div>
                                        Libertadores
                                    </td>
                                    <td colspan="3">
                                        <div class="color-box" style="background-color:#d07026"></div>
                                        Libertadores
                                    </td>
                                    <td colspan="3">
                                        <div class="color-box" style="background-color:#1fbe4a"></div>
                                        SulAmericana
                                    </td>
                                    <td colspan="4">
                                        <div class="color-box" style="background-color:#d42a18"></div>
                                        Rebaixamento
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </article>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function atualizarData() {
            var dataElemento = document.getElementById('data-atual');
            var dataAtual = new Date();
            var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                'Outubro', 'Novembro', 'Dezembro'
            ];
            var mesNome = meses[dataAtual.getMonth()];
            var dia = dataAtual.getDate();
            var ano = dataAtual.getFullYear();
            var dataFormatada = mesNome + ' ' + dia + ', ' + ano;

            dataElemento.textContent = dataFormatada;
        }

        atualizarData();
        setInterval(atualizarData, 3 * 60 * 60 * 1000);

        function selectTeam(index, teamName) {
            // Remove destaque de todas as linhas
            document.querySelectorAll('.highlight').forEach(el => el.classList.remove('highlight'));

            // Adiciona destaque na linha selecionada
            document.querySelectorAll('#team-' + index + ' td').forEach(el => el.classList.add('highlight'));

            // Substituir espaços por sublinhados na URL
            const teamNameUrl = teamName.replace(/\s+/g, '_');
            const url = new URL(window.location);
            url.pathname = '/' + teamNameUrl;
            window.history.pushState({}, '', url);

            // Enviar requisição AJAX
            fetch('/selecionar-time', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ team: index, teamName: teamName })
            })
            .then(response => response.json())
            .then(data => {
                // Processar a resposta, se necessário
                console.log(data);
            });
        }
    </script>
</body>

</html>
