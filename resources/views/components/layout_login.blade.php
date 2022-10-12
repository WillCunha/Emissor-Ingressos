<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ (Route::current()->getName() === 'login.page' ? 'Login | WF Software'  : 'Cadastro | WF Software' )}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
    #errorMSG{
        display: none;
        color: #f00;
        background-color: #ffb3b35e;
        padding: 10px;
        border-radius: 5px;
    }
    #alertaCheck{
        display: none;
        color: #f00;
        width: 100%;
        text-align: center;
    }
    </style>
</head>

<body>

    @yield('content')

</body>

</html>
