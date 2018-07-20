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
            Mensagem:{
                required: true
            }
        }
    });
});

// function validarEmail(){
//     var email = document.querySelector('#Email');
//     var error = document.querySelector('#error-email');
//
//     if(!email.checkValidity()){
//         // error.innerHTML = "Email inválido.";
//         document.getElementById("Email").style.borderColor = "red";
//         document.getElementById("Email").style.backgroundColor = "rgba(255,0,0,0.1)";
//     }
// }

function redefinirMsg(){
    var error = document.querySelector('#error-email');
    if (error.innerHTML = "Email inválido."){
        error.innerHTML = "";
    }
}

function envia() {
    var nome = document.getElementById("Nome").value;
    if(nome == '') {
        alert("Preencha o campo Nome!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    var email = document.getElementById("Email").value;
    if(email == '') {
        alert("Preencha o campo de Email!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    var assunto = document.getElementById("Assunto").value;
    if(assunto == '') {
        alert("Preencha o campo Assunto!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    var fone = document.getElementById("Fone").value;
    if(fone == '') {
        alert("Preencha o campo Telefone!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }

    var msg = document.getElementById("mensagem").value;
    if(msg == '') {
        alert("Preencha o campo de Mensagem!");
        // setTimeout(location.href = "Formulario.php");
        return false;
    }else {
        document.getElementById("interna").submit();
    }
}