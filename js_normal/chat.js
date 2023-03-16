


// let msgGeralEsq = card_body.children[0].lastElementChild.firstChild.data;
// console.log(msgGeral);



const criarMsg = ()=>{

    const card_body = document.querySelector("#card_body");
    const span_msg = document.querySelector("#span_msg");
    const lugarMsg = document.querySelector("#lugarMsg");
    const lugarImgMsg = document.querySelector("#lugarImgMsg");
    
    const msg_usuario = span_msg.innerText;
    const foto_usuario = lugarImgMsg.innerText;
    const direcao = lugarMsg.innerText;
    
    let data =  new Date();
    
    console.log(msg_usuario);
    console.log(foto_usuario);
    console.log(data.getHours());
    console.log(direcao);
    console.log(card_body);


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

    horaMsg.innerText = `${ data.getHours()}`;

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

    // window.location.href = "http://localhost/GraviBaby/view/Chat/index.php";
}

criarMsg();



