<!DOCTYPE html>
    <html class="wide wow-animation" lang="en">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<head>
    <!-- Site Title-->
    <title>Campeonato Brasileiro</title>
    <style>
.cell-top-four {
    background-color: hsl(217, 72%, 45%, 0.5) !important; /* Cor mais clara de azul */
    color: #fff
}

.cell-middle-two {
    background-color: rgba(208, 112, 38, 0.5) !important; /* Cor mais clara de laranja */
    color: #fff
    
}

.cell-middle-seven {
    background-color: hsla(136, 72%, 43%, 0.5) !important; /* Cor mais clara de verde */
    color: #fff
}

.cell-bottom-four {
    background-color: hsl(6, 80%, 46%, 0.5) !important; /* Cor mais clara de vermelho */
    color: #fff
}

.color-box {
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
}
    </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center">
                <div>
                    <h1>Campeonato Brasileiro</h1>
                </div>
            <div class="table-custom-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
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
                        <tr>
                            <td class="@if($index >= 1 && $index <= 4)
                                cell-top-four
                            @elseif($index >= 5 && $index <= 6)
                                cell-middle-two
                            @elseif($index >= 7 && $index <= 12)
                                cell-middle-seven       
                            @elseif($index > 16) <!-- Ajuste conforme o total de times -->
                                cell-bottom-four
                            @endif" >{{ $index }}</td>
                            <!-- Incorporar a imagem ao lado do nome do time na mesma célula -->
                            <td style="text-align: start;">
                                <img src="images/{{ trim(strtolower($row[1])) }}.png" style="height: 25px; vertical-align: middle; margin-right: 5px;">
                                {{ $row[1] }} <!-- Nome do time -->
                            </td>
                            <!-- Loop através de outras células excluindo a primeira que contém o nome -->
                            @foreach ($row as $cell_index => $cell)
                            @if ($cell_index != 1) <!-- Pular o índice do nome do time para não duplicar -->
                                <td>{{ $cell }}</td>
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
                                Fase de grupos da Copa Libertadores
                            </td>
                        
                            <td colspan="3">
                                <div class="color-box" style="background-color:#d07026"></div>
                                Qualificatórias da Copa Libertadores
                            </td>
                       
                            <td colspan="3">
                                <div class="color-box" style="background-color:#1fbe4a"></div>
                                Fase de grupos da Copa Sul-Americana
                            </td>
                      
                            <td colspan="3">
                                <div class="color-box" style="background-color:#d42a18"></div>
                                Rebaixamento
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
