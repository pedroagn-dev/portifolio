const enviarBtn = document.getElementById("enviar-btn");

enviarBtn.addEventListener("click", function(event) {
    event.preventDefault();

    enviarBtn.classList.add("loading");
    enviarBtn.innerText = "Enviando...";

    setTimeout(function() {
        enviarBtn.classList.remove("loading");
        enviarBtn.classList.add("sent");
        enviarBtn.innerText = "Sucesso, contato enviado";

        setTimeout(function() {
            enviarBtn.classList.remove("sent");
            enviarBtn.innerText = "Enviar";
        }, 3000);
    }, 3000);
});

const toggleButton = document.querySelector('.toggle-button');
const body = document.querySelector('body');
const elementsToChange = document.querySelectorAll('.element-to-change');

toggleButton.addEventListener('click', function() {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        // Se o modo escuro estiver ativado
        for (let i = 0; i < elementsToChange.length; i++) {
            elementsToChange[i].style.backgroundColor = '#333';
            elementsToChange[i].style.color = '#fff';
        }
    } else {
        // Se o modo escuro estiver desativado
        for (let i = 0; i < elementsToChange.length; i++) {
            elementsToChange[i].style.backgroundColor = '#fff';
            elementsToChange[i].style.color = '#333';
        }
    }
});

$(document).ready(function() {
    $('#enviar-btn').click(function() {
        var nome = $('#nome').val();
        var email = $('#email').val();
        var mensagem = $('#mensagem').val();
        if(nome == '' || email == '' || mensagem == '') {
            alert('Por favor, preencha todos os campos.');
            return false;
        }
    });
});
