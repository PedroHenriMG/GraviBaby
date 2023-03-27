
export function criarMsg (span_msg,lugarMsg,lugarImgMsg){

    const card_body = document.querySelector("#card_body");
    
    
    const msg_usuario = span_msg;
    const foto_usuario = lugarImgMsg;
    const direcao = lugarMsg;
    
    let data =  new Date();
    
    // Mensagem da esquerda

    if(direcao == 1){

    const divEsqMsg = document.createElement('div');

    divEsqMsg.classList.add("d-flex");
    divEsqMsg.classList.add("justify-content-start");
    divEsqMsg.classList.add("mb-4");
    
    const divImgEsqMsg = document.createElement('div');

    divImgEsqMsg.classList.add("img_cont_msg");

    const imgEsqMsg = document.createElement('img');

    imgEsqMsg.classList.add("rounded-circle");
    imgEsqMsg.classList.add("user_img_msg");

    imgEsqMsg.src = `../${foto_usuario}`;

    divImgEsqMsg.appendChild(imgEsqMsg);
    divEsqMsg.appendChild(divImgEsqMsg);

    const divMsg = document.createElement('div');

    divMsg.classList.add("msg_cotainer");

    divMsg.innerText = msg_usuario;

    const horaMsg = document.createElement('span');

    horaMsg.classList.add("msg_time");

    horaMsg.innerText = `${ data.getHours()} : ${data.getMinutes()}`;

    divMsg.appendChild(horaMsg);
    divEsqMsg.appendChild(divMsg);

    card_body.appendChild(divEsqMsg);

    }

    // Mensagem da esquerda

    // Mensagem da direita

     else if(direcao == 0){

    const divDirMsg = document.createElement('div');

    divDirMsg.classList.add("d-flex");
    divDirMsg.classList.add("justify-content-end");
    divDirMsg.classList.add("mb-4");

    const dirMsgSend = document.createElement('div');

    dirMsgSend.classList.add("msg_cotainer_send");

    dirMsgSend.innerText = msg_usuario;

    const horaDirMsg = document.createElement('span');

    horaDirMsg.classList.add("msg_time_send");

    horaDirMsg.innerText =`${ data.getHours()} : ${data.getMinutes()}`;

    dirMsgSend.appendChild(horaDirMsg);
    divDirMsg.appendChild(dirMsgSend);

    const divDirImg = document.createElement('div');

    divDirImg.classList.add("img_cont_msg");

    const imgDirMsg = document.createElement("img");

    imgDirMsg.classList.add("rounded-circle");
    imgDirMsg.classList.add("user_img_msg");

    imgDirMsg.src = `../${foto_usuario}`;

    divDirImg.appendChild(imgDirMsg);
    divDirMsg.appendChild(divDirImg);
    card_body.appendChild(divDirMsg);

    }

    // Mensagem da direita

}

export function criarAmigos(){
    const tabela_amigos = document.querySelector(".active");

    const card_amigo = document.createElement('div');
    card_amigo.classList.add('d-flex');
    card_amigo.classList.add('bd-highlight');

    const img_amg = document.createElement('div');
    img_amg.classList.add('img_cont');

    const img = document.createElement('img');

}



const chamarMsg =()=>{
    const spanMsg = document.createElement('span');
    spanMsg.innerHTML = "<?php include_once('../../controller/loop_msg/parte1_loop.php') ?>";
    const local_msg = document.querySelector("#local_msg");
    local_msg.appendChild(spanMsg);
}

chamarMsg();







