const input_msg = document.querySelector("#input_msg");
const card_body = document.querySelector("#card_body");

// let msgGeralEsq = card_body.children[0].lastElementChild.firstChild.data;
// console.log(msgGeral);

const criarMsg = ()=>{
    // Mensagem da esquerda

    const divEsqMsg = document.createElement('div');

    divEsqMsg.classList.add("d-flex");
    divEsqMsg.classList.add("justify-content-start");
    divEsqMsg.classList.add("mb-4");
    
    const divImgEsqMsg = document.createElement('div');

    divImgEsqMsg.classList.add("img_cont_msg");

    const imgEsqMsg = document.createElement('img');

    imgEsqMsg.classList.add("rounded-circle");
    imgEsqMsg.classList.add("user_img_msg");

    divImgEsqMsg.appendChild(imgEsqMsg);
    divEsqMsg.appendChild(divImgEsqMsg);

    const divMsg = document.createElement('div');

    divMsg.classList.add("msg_cotainer");

    divMsg.innerText = msg_usuario;

    const horaMsg = document.createElement('span');

    horaMsg.classList.add("msg_time");

    horaMsg.innerText = horaMsgEnviada;

    divMsg.appendChild(horaMsg);
    divEsqMsg.appendChild(divMsg);

    card_body.appendChild(divEsqMsg);

    // Mensagem da esquerda

    // Mensagem da direita

    const divDirMsg = document.createElement('div');

    divDirMsg.classList.add("d-flex");
    divDirMsg.classList.add("justify-content-end");
    divDirMsg.classList.add("mb-4");

    const dirMsgSend = document.createElement('div');

    dirMsgSend.classList.add("msg_cotainer_send");

    dirMsgSend.innerText = dirMsg_usuario;

    const horaDirMsg = document.createElement('span');

    horaDirMsg.classList.add("msg_time_send");

    horaDirMsg.innerText = horaDirMsgEnviada;

    dirMsgSend.appendChild(horaDirMsg);
    divDirMsg.appendChild(dirMsgSend);

    const divDirImg = document.createElement('div');

    divDirImg.classList.add("img_cont_msg");

    const imgDirMsg = document.createElement("img");

    imgDirMsg.classList.add("rounded-circle");
    imgDirMsg.classList.add("user_img_msg");

    imgDirMsg.src = foto_usuario_dir;

    divDirImg.appendChild(imgDirMsg);
    divDirMsg.appendChild(divDirImg);

    // Mensagem da direita
}


