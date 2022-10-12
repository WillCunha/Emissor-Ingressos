@extends('components.layout_dash')

@section('content')


    <div class="modal fade" id="criarevento" tabindex="-1" aria-labelledby="wfsoftware" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloDoModal">Gerar novo evento.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>
                <form action="#" method="POST" id="cria_evento" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg-auto">
                                <label for="titulo">Nome do evento</label>
                                <input type="text" name="titulo" id="titulo" placeholder="Titulo do evento"
                                    class="form-control" required>
                            </div>
                            <div class="col-lg-auto">
                                <label for="data">Data do evento</label>
                                <input type="text" name="data" id="data"
                                    placeholder="Informe a data e horário do evento (01/01//1995 12:00)"
                                    class="form-control" required>
                            </div>
                            <div class="my-2">
                                <label for="local">Local</label>
                                <input type="text" name="local" id="local" placeholder="Local do evento"
                                    class="form-control" required>
                            </div>
                            <div class="my-2">
                                <label for="descricao">Descrição do evento</label>
                                <textarea name="descricao" class="form-control" id="descricao" cols="30" rows="2"
                                    placeholder="Descreva o evento." required></textarea>
                            </div>
                            <hr />
                            <div class="my-2 div-ingressos">
                                <b>Ingressos:</b>
                                <br>
                                @if (isset($dadosIngressos))
                                    @foreach ($dadosIngressos as $ingressos)
                                        <p> {{ $ingressos->name }} </p>
                                        <div class="ingressos">
                                            <label for="valorIngresso[]">Valor Unitário: </label>
                                            <input type="text" name="valorIngresso[]" id="inputIngressos"
                                                value="{{ $ingressos->value }}" class="form-control">
                                            <label for="quantidadeMaxima[]">Quantidade Máxima: </label>
                                            <input type="number" name="quantidadeMaxima[]" id="inputIngressos"
                                                placeholder="01" class="form-control">
                                            <input type="text" name="idIngresso[]" id="inputIngressos"
                                                value="{{ $ingressos->id }}" class="form-control" hidden>
                                        </div>
                                        <hr />
                                    @endforeach
                                @endif
                            </div>
                            <div class="my-2">
                                <label for="imagem">Imagem do evento</label>
                                <input type="file" name="imagem" class="form-control" id="imagem">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="add_evento_btn">Gerar evento</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="criaringresso" tabindex="-1" aria-labelledby="wfsoftware" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloDoModal">Gerar novo ingresso.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"> </button>
                </div>
                <form action="#" method="POST" id="cria_ingresso" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg-auto">
                                <label for="nome_ingresso">Nome da entrada</label>
                                <input type="text" name="nome_ingresso" id="titulo"
                                    placeholder="Titulo do ingresso" class="form-control" required>
                            </div>
                            <div class="col-lg-auto">
                                <label for="valor_ingresso">Valor da entrada</label>
                                <input type="text" name="valor_ingresso" id="data"
                                    placeholder="Formato decimal (90.00)" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="add_ingresso_btn">Gerar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <body class="antialiased">
        @if (count($buscaDados) < 1)
            <p>Tem nada aqui não!</p>
        @else
            <div class="px-2">
                <div class="line first">
                    <div class="blocos corpo1">
                        <h4>TOTAL DE EVENTOS</h4>
                        <p>Numeros baseados no período previamente selecionado.</p>
                        <h1 style="text-align: center; font-size: 3.5rem;">{{ $buscaDados->count() }}</h1>
                        <hr>
                        <div class="contadores-eventos">
                            <div class="titulos-contadores">
                                <b>Ingressos pagos: </b>
                                <b>Ingressos gratuitos: </b>
                                <b class="total">Total de ingressos: </b>
                            </div>
                            <div class="numeros-contadores">
                                <?php $total = 0 ?>
                                @foreach ($buscaDados as $busca)
                                    <?php $total += $busca->quantidade ?>
                                @endforeach

                                <b>{{ $total }}</b>
                                <b>0</b>
                                <b class="total">{{ $total }}</b>
                            </div>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#criarevento">Criar evento</button>
                    </div>
                    <div class="blocos corpo2">
                        <h4>NÚMEROS DOS ÚLTIMOS EVENTOS</h4>
                        <p>Últimos 12 (doze) eventos realizados.
                        <div id="container" style="width: 100%;margin: 0 auto">
                        </div>
                    </div>
                </div>
                <div class="line second">
                    <div class="blocos corpo3">
                        <h4>CANAIS DE VENDAS</h4>
                        <p>Vendas realizadas presencialmente e virtualmente.</p>
                        <div id="resultadosCanais" style="width: 100%;margin: 0 auto">
                        </div>
                    </div>
                    <div class="blocos corpo4">
                        <h4>REDES SOCIAIS</h4>
                        <p>Participação de redes sociais em vendas.</p>
                        <div id="resultadosRedes" style="width: 100%;margin: 0 auto">
                        </div>
                    </div>
                </div>
            </div>

            <script language="JavaScript">
                function drawChart() {
                    // Define the chart to be drawn.
                    var data = google.visualization.arrayToDataTable([
                        ['evento', 'Quantidade'],
                        @foreach ($buscaDados as $busca)
                            <?= $evento = "['$busca->nomeEvento', $busca->quantidade]," ?>
                        @endforeach

                    ]);

                    var options = {
                        title: 'Ingressos (unitário):'
                    };

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.ColumnChart(document.getElementById('container'));
                    chart.draw(data, options);
                }
                google.charts.setOnLoadCallback(drawChart);
            </script>
            <script language="JavaScript">
                function drawChart() {
                    // Define the chart to be drawn.
                    var data = google.visualization.arrayToDataTable([
                        ['evento', 'Presencial', 'Virtual'],
                        ['Aloka', 410, 490],
                        ['MC Mirela', 327, 673],
                        ['Thati Zaki', 120, 410],
                        ['Open Bar', 420, 980],
                        ['Níver', 788, 742]
                    ]);

                    var options = {
                        title: 'Canais de vendas (unitários):'
                    };

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.ColumnChart(document.getElementById('resultadosCanais'));
                    chart.draw(data, options);
                }
                google.charts.setOnLoadCallback(drawChart);
            </script>
            <script language="JavaScript">
                function drawChart() {
                    // Define the chart to be drawn.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Redes Sociais: ');
                    data.addColumn('number', 'Porcentagem');
                    data.addRows([
                        ['Instagram', 45.0],
                        ['Facebook', 26.8],
                        ['Twitter', 12.8],
                        ['Google', 6.9],
                        ['Site Oficial', 8.5]
                    ]);

                    // Set chart options
                    var options = {
                        'title': 'Origem dos clientes que compraram.',
                        colors: ['#D110B2', '#3b5998', '#00acee', '#EE4435', '#000000']
                    };

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.PieChart(document.getElementById('resultadosRedes'));
                    chart.draw(data, options);
                }
                google.charts.setOnLoadCallback(drawChart);
            </script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ url(mix('js/main.js')) }}"></script>

    @endsection
