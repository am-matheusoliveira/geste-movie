
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