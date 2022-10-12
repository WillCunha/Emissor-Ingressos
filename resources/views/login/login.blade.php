@extends('components.layout_login')

@section('content')

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                                    <p class="text-center h5 fw-bold mb-5 mx-1 mx-md-4 mt-4" id="errorMSG">Ocorreu um erro.</p>

                                    <form class="mx-1 mx-md-4" id="formEntrar" action='#' method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="fieldCPF" name="fieldCPF" class="form-control" />
                                                <label class="form-label" for="fieldCPF" >CPF</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="fieldSenha" name="fieldSenha" class="form-control" />
                                                <label class="form-label" for="fieldSenha" >Senha</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" id="btnEntrar"
                                                class="btn btn-primary btn-lg">Continuar</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        $("#formEntrar").submit(function(e) {
            e.preventDefault();
                const dadosLogin = new FormData(this);
                $("#btnEntrar").text("Aguarde...");
                $.ajax({
                    url: '{{ route('logar') }}',
                    method: 'post',
                    data: dadosLogin,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(dadosLogin)
                        if (res.status == 200) {
                            window.location.replace('{{ route('dashboard') }}'),
                            $("#alertaCheck").css("display", "none");
                            $("#btnCadastrar").text("Continuar");
                        } else if(res.status == 404){
                            $("#errorMSG").text("CPF e/ou senha incorreto(s).");
                            $("#errorMSG").css("display", "block");
                            $("#btnEntrar").text("Continuar");
                        }
                        console.log(res);
                    }
                })

        });
    </script>

@endsection
