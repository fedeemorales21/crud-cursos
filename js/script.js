//materialize

M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {
        format : "yyyy-mm-dd"
    });
 });



document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {} );
  });



//Excel

function reporteExcel(){
    var texto="<table border='1'><tr>"
    var tabla = document.getElementById('tabla')

    for(let i = 0 ; i < tabla.rows.length ; i++){     
        texto+=tabla.rows[i].innerHTML+"</tr>"
        texto+="</tr>"
    }
     
    render = window.open('data:application/vnd.ms-excel,' + encodeURI(texto))

    return render
}


//registro

document.getElementById('formulario').addEventListener('submit',validar);

function validar() {
    let nombre,apellido,dni,telefono,email,pass,exp;

    exp="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";

    nombre=document.getElementsById('nombre').value;
    apellido=document.getElementsById('apellido').value;
    dni=document.getElementsById('dni').value;
    telefono=document.getElementsById('tel').value;
  	email=document.getElementsById('email').value;
    pass=document.getElementsById('pass').value;
    
    if (nombre === "" || apellido === "" || dni === "" || telefono === "" || email === ""  || pass === "") {
        alert("Complete los campos");
        return false;
    }
    else if (nombre.length >50) {
        alert("El campo nombre supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (apellido.length >50) {
        alert("El campo apellido supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (dni.length >8) {
        alert("El campo dni supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (telefono.length >15) {
        alert("El campo telefono supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (email.length >50) {
        alert("El campo email supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (pass.length >255) {
        alert("El campo constraseña supera la cantidad de caracteres permitidos");
        return false;
    }
    else if (isNaN(telefono)|| isNaN(dni) ) {
        alert("El campo telefono y dni tienen que ser de valor numérico");
        return false;
    }
    else if (!exp.test(email) ) {
        alert("El email es invalido");
        return false;
    }

}


//login

document.getElementById('flog').addEventListener('submit',validaLog);

function validaLog() {
    let email,pass,exp;

    exp="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";

    email=document.getElementById('login').value;
    pass=document.getElementById('pw').value;

    if (email === "" || pass === ""){
        alert("Complete los campos");
        return false;
    }else if(!exp.test(email)){
        alert("El email es invalido");
        return false;
    }
    
    
}

//adm_usuarios editar user
document.getElementById('fadm_user').addEventListener('submit',validaUser);

document.getElementById('fedit_user').addEventListener('submit',validaUser);

function validaUser() {
    let nombre,apellido,dni,telefono,email,pass,tipo,selec;

    exp="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";

    nombre = document.getElementsById('nombre').value;
    apellido = document.getElementsById('apellido').value;
    dni = document.getElementsById('dni').value;
    telefono = document.getElementsById('tel').value;
  	email = document.getElementsById('email').value;
    pass = document.getElementsById('pass').value;
    tipo = document.getElementsById('tipo')
    selec = document.getElementsById('tipo').selectedIndex;

    if (nombre === "" || apellido === "" || dni === "" || telefono === "" || email === ""  || pass === "" || tipo === "") {
        alert("Complete los campos");
        return false;
    }
    else if (nombre.length >50) {
        alert("El campo nombre supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (apellido.length >50) {
        alert("El campo apellido supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (dni.length >8) {
        alert("El campo dni supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (telefono.length >15) {
        alert("El campo telefono supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (email.length >50) {
        alert("El campo email supera la cantidad de caracteres permitidos");
        return false;
    } 
    else if (pass.length >255) {
        alert("El campo constraseña supera la cantidad de caracteres permitidos");
        return false;
    }
    else if (isNaN(telefono)|| isNaN(dni) ) {
        alert("El campo telefono y dni tienen que ser de valor numérico");
        return false;
    }
    else if (!exp.test(email) ) {
        alert("El email es invalido");
        return false;
    }else if (tipo.options[selec].value==""){ 
        alert ("Selecione un tipo") 
        return false 
    }

}

//altacurso y editarcurso

document.getElementById('faltac').addEventListener('submit',validaCurso);

document.getElementById('feditc').addEventListener('submit',validaCurso);

function validaCurso() {
    let nombre,desc,fecha,prof;
    nombre = document.getElementsById('nombre').value;
    desc = document.getElementsById('desc').value;
    fecha = document.getElementsById('fecha').value;
    prof = document.getElementsById('prof').value; 


    if (nombre === "" || desc === "" || fecha === "") {
        alert("Complete los campos");
        return false;
    }else  if (nombre.length >50 || desc.length >255) {
        alert("El campo nombre supera la cantidad de caracteres permitidos");
        return false;
    }else  if (prof==="") {
        alert("Complete los campos");
        return false;
    }else if (prof.length >50) {
        alert("El campo nombre supera la cantidad de caracteres permitidos");
        return false;
    }
}

//altapregunta y editar preg

document.getElementById('faltap').addEventListener('submit',validaCurso);

document.getElementById('feditp').addEventListener('submit',validaCurso);

function validaCurso() {
    let desc,tipo,tiposel,curso,cursel;

    desc = document.getElementsById('desc').value;
    tipo = document.getElementsById('tipo')
    tiposel = document.getElementsById('tipo').selectedIndex;
    curso = document.getElementsById('curso')
    cursel = document.getElementsById('curso').selectedIndex;


    if (desc === "" ) {
        alert("Complete los campos");
        return false;
    }if (tipo.options[tiposel].value==""){ 
        alert ("Selecione un tipo") 
        return false 
    }if (curso.options[cursel].value==""){ 
        alert ("Selecione un tipo") 
        return false 
    }
}
