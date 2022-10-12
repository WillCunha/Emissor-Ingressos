setInterval( function(){
    var data = new Date.now()
    $('.boas-vindas').HTML('<p>' + data.toLocalString() + '<p/>');
    console.log(data.toLocalString());
}, 1000 );

$(function(){
    //Cadastra o evento no banco de dado
    $("#cria_evento").submit(function (e){
        e.preventDefault();
        const dados = new FormData(this);
        $("#add_evento_btn").text("Aguarde, gerando evento...");
        $.ajax({
            url: '/adicionar',
            method: 'post',
            data: dados,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status == 200){
                    $("#add_evento_btn").text("Gerar evento");
                    $("#cria_evento").hide();
                }
            }

        })
    })
});

$(function(){
    //Cadastra o evento no banco de dado
    $("#cria_ingresso").submit(function (e){
        e.preventDefault();
        const dados = new FormData(this);
        $("#add_ingresso_btn").text("Aguarde...");
        $.ajax({
            url: '/gera-ingresso',
            method: 'post',
            data: dados,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status == 200){
                    $("#add_ingresso_btn").text("Gerar");
                    $("#criaringresso").hide();
                }
            }

        })
    })
});

