(function(){
    $("#input_pesquisa").on("keyup",(function(){
        var pesquisa = $(this).val();

        if(pesquisa =! ""){
            var dados ={
                pesquisa : pesquisa,
            }
            $.post("fazer_pesquisa.php",dados,function(retorna){
                $(".res_contacts").html(retorna);
            })
        }
    }))
});