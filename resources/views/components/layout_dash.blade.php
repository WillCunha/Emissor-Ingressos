<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WF | Dashboard</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="{{ url('storage/imagens/eventos/favicon-512px.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });
    </script>
    <link rel="stylesheet" href="{{ url(mix('css/style.css')) }}" />

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="{{ url('storage/imagens/eventos/Logotop.png') }}" width="85"
                alt=""> </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (Route::current()->getName() === 'inicio' ? 'active' : '') }}" aria-current="page" href="{{ route('inicio') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::current()->getName() === 'dashboard' ? 'active' : '' ) }}" aria-current="page" href="{{ route('dashboard') }}" >Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"  data-bs-toggle="modal" data-bs-target="#criarevento">Novo Evento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"  data-bs-toggle="modal" data-bs-target="#criaringresso">Criar ingresso</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>

</html>
