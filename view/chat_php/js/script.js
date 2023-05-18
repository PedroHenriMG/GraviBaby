
/*
#########
	função responsável por abaixar a barra de rolagem do chat
#########
*/
function abaixarbarra(){
	var div = document.getElementById('chat');
	div.scrollTo(0, 1000);
}

/*
#########
	função ajax responsável por 
	renderizar em tempo real as
	ultimas mensagens enviadas no chat
#########
*/
function ajax(){
				var req = new XMLHttpRequest();
				req.onreadystatechange = function(){
					if (req.readyState == 4 && req.status == 200) {
							document.getElementById('chat').innerHTML = req.responseText;
					}
		}
	req.open('GET', '../src/php/chat.php', true);
	req.send();

}


/*
#########
	Utilidade responsável por
	executar a função Ajax toda vez
	que a página for carregada
#########
*/
window.onload = (event) => {
 	ajax();
};

$(function(){

	$('#btnEnviar').click(function(){
		
		if($('#msg').val() === '' || $('#nome').val() === ''){

			
		}else{
			var data = {
			nome: $('#nome').val(),
			mensagem: $('#msg').val()

			}

			$.post('http://localhost/CHAT-PHP/src/php/sendmessage.php', data);	

			$('#msg').val('');
		}
		
	});

});


//função que determina o tempo em que o chat será atualizado(1000 = 1 segundo)
setInterval(function(){ajax();}, 1000);