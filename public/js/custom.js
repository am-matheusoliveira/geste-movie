
// MASCARA DE DATA PADRÃO BR
$(".mask_date").mask("00/00/0000");

// CONFIGURAÇÃO DO SELECT - DIRETOR
$('#movie_id_director').select2({
    theme: 'bootstrap-5',
    dropdownParent: $("#staticBackdropInsertUpdate"),
    "language": {
        "noResults": function(){
            return "Nenhum registro encontrado!";
                    
        }
    }
});

// CONFIGURAÇÃO DO SELECT - GÊNERO
$('#gm-id-genre').select2({
    theme: 'bootstrap-5',
    dropdownParent: $("#staticBackdropInsertUpdateGenre"),
    "language": {
        "noResults": function(){
            return "Nenhum registro encontrado!";
                    
        }
    }
});

// CONFIGURAÇÃO DO SELECT - ATORES
$('#am-id-actor').select2({
    theme: 'bootstrap-5',    
    "language": {
        "noResults": function(){
            return "Nenhum registro encontrado!";
                    
        }
    }
});

// CONFIGURAÇÃO DO SELECT - ATORES
$('#id_genre_filter').select2({
    theme: 'bootstrap-5',    
    "language": {
        "noResults": function(){
            return "Nenhum registro encontrado!";
                    
        }
    }
});

// LOGOUT SISTEMA

// CAPTURANDO OS ELEMENTOS PELO SEUS IDs
const classBtnLogout = document.querySelectorAll('.classBtnLogout');
const logoutForm = document.getElementById('logoutForm');

// VERIFICA SE OS ELEMENTOS classBtnLogout & logoutForm EXISTEM NO DOM
if (classBtnLogout && logoutForm) {
    // MÉTODO forEach PARA ADICIONAR O ENVENTO DE CLICK NOS BOTÕES
    classBtnLogout.forEach((btnLogout) =>{
        // ESCUTADOR DE EVENDOS - CLICK
        btnLogout.addEventListener('click', (event) => {
            // CANCELANDO O ENVIO DE EVENTOS
            event.preventDefault();

            // ENVIANDO O FORMULÁRIO DE LOGOUT
            logoutForm.submit();
        });
    });
}

// INPUT - [REMEMBER ME]

// Selecionando o checkbox pelo ID
const inputRememberMe = document.getElementById('inputRememberMe');

// Selecionando o elemento que será ocultado/exibido
const messageInputRememberMe = document.getElementById('messageInputRememberMe');

// Verifica se os elementos inputRememberMe e messageInputRememberMe existem no DOM
if (inputRememberMe && messageInputRememberMe) {
    // Adicionando um evento de clique no checkbox
    inputRememberMe.addEventListener('click', () => {        
      // Alternar a classe 'invisible' no elemento alvo
      messageInputRememberMe.classList.toggle('d-none');
    });
}

/* Função para validar os campos do Formulário */
(function () {
    'use strict'
    
    const forms = document.querySelectorAll('.requires-validation');

    Array.from(forms).forEach(function (form){

        form.addEventListener('submit', function (event){
            if (!form.checkValidity()){
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})()