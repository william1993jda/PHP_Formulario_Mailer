function deleteData(str) {

    let id = str;
    $.ajax({
        type: "GET",
        url: "deletar.php",
        data:"id="+id,
        beforeSend: function () {
            $("#seila").html(
                "<span style='color: red;' id='carregando'>"+
                "Excluindo..."+
                "</span>"+
                "<img style='width: 40px' src='../img/Spinner-1s-200px.svg'>"
            );
        },

        success: function (msg) {
            $("#dados").html(msg);
        }
    });
}
$("#deletando").click(function () {
    $(".alert").css('display', 'block');
    id($("#deletando").val());
});

$(document).ready(function(){
    $("#palavra").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function buscar (palavra) {
    let page = 'buscando.php';
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: page,
        beforeSend: function () {
            $("#dados").html(
                "<span id='carregando'>" +
                "Pesquisando" +
                "<img style='width: 35px; padding-top: 5px;' src='../img/Ellipsis-1.6s-200px.gif'>" +
                "</span>"
                +"<img id='preloader' src=\"../img/Magnify-1s-200px.svg\" />"
            );
        },
        data: {palavra: palavra},
        success: function (msg) {
            $("#dados").html(msg);
        }
    });
}


$("#buscar").click(function () {
    buscar($("#palavra").val())
});

/*Exibe hora certa*/

var myVar = setInterval(myTimer ,1000);

function myTimer() {
    var d = new Date(), displayDate;
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        displayDate = d.toLocaleTimeString('pt-BR');
    } else {
        displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'America/Sao_Paulo'});
    }
    document.getElementById("demo").innerHTML = displayDate;

}


/* Confirmar senha */
$("#form").submit(function() {
    let senha = $("#senha").val();
    let confirmarSenha = $("#confirmarSenha").val();

    if (senha != confirmarSenha){
        $('#exampleModalCenter').modal('toggle').addClass('bounceIn');
        console.log("Senha-> " + senha);
        console.log("Confirmar senha-> " + confirmarSenha);
        return false;
    }
    // e.preventDefault();//evito o submit do form ao apetar o enter..
});

$("#form-editar").submit(function() {
    let senha = $("#senha").val();
    let confirmarSenha = $("#confirmarSenha").val();

    if (senha != confirmarSenha){
        $('#exampleModalCenter').modal('toggle').addClass('bounceIn');
        console.log("Senha-> " + senha);
        console.log("Confirmar senha-> " + confirmarSenha);
        return false;
    }
    // e.preventDefault();//evito o submit do form ao apetar o enter..
});

$(document).ready(function() {
    $("#interna").validate({
        rules: {
            Nome: {
                required: true,
                maxlength: 50,
                minlength: 5,
                minWords: 2
            },
            Email: {
                required: true,
                email: true
            },
            Fone: {
                required: true,
                number: true,
                maxlength: 12,
                minlength: 8
            },
            Assunto: {
                required: true
            },
            Mensagem: {
                required: true
            }
        }
    });
});

$(document).ready(function () {

    $("#form").validate({

        rules: {
            nome: {
                required: true,
                maxlength: 50,
                minlength: 5,
                minWords: 2
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                maxlength: 12,
                minlength: 3
            },
            confirmarSenha: {
                required: true,
                maxlength: 12,
                minlength: 3
            },
        }
    });

    $("#form").submit(function () {
        let nome  = $("#nome").val();
        let email = $("#email").val();
        let senha = $("#senha").val();
        let confirmarSenha = $("#confirmarSenha").val();

        if (nome == "") {
            $('#exampleModalCenter').modal('toggle');
            $('#modalCadastro').text('Preencha o campo nome!');
            return false;
        }
        if (email == "") {
            $('#exampleModalCenter').modal('toggle');
            $('#modalCadastro').text('Preencha o campo E-mail!');
            return false;
        }
        if (senha == "") {
            $('#exampleModalCenter').modal('toggle');
            $('#modalCadastro').text('Preencha o campo senha!');
            return false;
        }
        if (confirmarSenha == "") {
            $('#exampleModalCenter').modal('toggle');
            $('#modalCadastro').text('Preencha o campo confirmar senha!');
            return false;
        }
    });
});

$(document).ready(function () {

    $("#form-editar").validate({

        rules: {
            nome: {
                required: true,
                maxlength: 50,
                minlength: 5,
                minWords: 2
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                maxlength: 12,
                minlength: 6
            }
        }
    });

    $("#form-editar").submit(function () {
        let nome  = $("#nome").val();
        let email = $("#email").val();
        let senha = $("#senha").val();

        if (nome == ""){
            alert('O campo nome precisa ser preenchido!');
            return false;
        }
        if (email == ""){
            alert('O campo E-mail precisa ser preenchido!');
            return false;
        }
        if (senha == ""){
            alert('O campo Senha precisa ser preenchido!');
            return false;
        }
    });
});

// function validarEmail(){
//     let email = document.querySelector('#Email');
//     let error = document.querySelector('#error-email');
//
//     if(!email.checkValidity()){
//         // error.innerHTML = "Email inválido.";
//         document.getElementById("Email").style.borderColor = "red";
//         document.getElementById("Email").style.backgroundColor = "rgba(255,0,0,0.1)";
//     }
// }

$(document).ready(function() {
    $('#login-alert').hide(); //Esconde o elemento com id errolog
    $('#login-form').submit(function() { //Ao submeter formulário

        let email = $('#Email').val(); //Pega valor do campo email
        let senha = $('#Senha').val(); //Pega valor do campo senha

        if (email == '' || senha == '') {

            $('#exampleModalCenter').modal('toggle').css('background-color', 'rgb(255, 0, 0)');
            // $('#exampleModalCenter').css('background-color', 'red');
            // alert('Por favor, preencha os dados corretamente!');
            return false;
        }

        $.ajax({ //Função AJAX
            url: "login.php", //Arquivo php
            type: "post", //Método de envio
            data: "email=" + email + "&senha=" + senha,	//Dados

            success: function (result) { //Sucesso no AJAX
                if (result === 1) {
                    location.href = 'Formulario.php';	//Redireciona
                } else {
                    $('#exampleModalCenter').modal('toggle').css('background-color', 'rgb(255, 0, 0)');
                    $('#modalErro').text('Digita direito doente!');
                    // $('#login-alert').show(); //Informa o erro
                }
            }
        });
    });

    return false; //Evita que a página seja atualizada
});

function redefinirMsg(){
    let error = document.querySelector('#error-email');
    if (error.innerHTML = "Email inválido."){
        error.innerHTML = "";
    }
}

function envia() {
    let nome = document.getElementById("Nome").value;
    if(nome == '') {
        alert("Preencha o campo Nome!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    let email = document.getElementById("Email").value;
    if(email == '') {
        alert("Preencha o campo de Email!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    let assunto = document.getElementById("Assunto").value;
    if(assunto == '') {
        alert("Preencha o campo Assunto!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    let fone = document.getElementById("Fone").value;
    if(fone == '') {
        alert("Preencha o campo Telefone!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    let msg = document.getElementById("mensagem").value;
    if(msg == '') {
        alert("Preencha o campo de Mensagem!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }
}