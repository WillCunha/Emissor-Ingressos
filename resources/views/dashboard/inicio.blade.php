@extends('components.layout_dash')
@section('content')

    <body class="antialiased">
        <div class="px-2">
            <div class="boas-vindas">
                <h2>Seja bem vindo, Will!</h2>
                <p class="horario">{{ now('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
        <div class="px-2">
            <div class="line first">
                <div class="blocos corpo_inicio">
                    <h4>TODOS OS EVENTOS:</h4>
                    <table>
                        <tr>
                            <th>STATUS</th>
                            <th>CÓDIGO</th>
                            <th>EVENTO</th>
                            <th>DATA</th>
                            <th>INGRESSOS</th>
                            <th>AÇÕES</th>
                        </tr>
                        @foreach ($eventos as $dadosEventos)
                            <tr>
                                <td>ATIVO</td>
                                <td>{{ $dadosEventos->id }}</td>
                                <td>{{ $dadosEventos->nomeEvento }}</td>
                                <td>{{ $dadosEventos->data }}</td>
                                <td>{{ $dadosEventos->quantidade }}</td>
                                <td>
                                    <a href="#">GERENCIAR</a>
                                    <a href="#">EDITAR</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

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
