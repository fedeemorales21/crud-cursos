//materialize

M.AutoInit();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {
        format : "yyyy-mm-dd"
    });
 });






//Excel

function reporteExcel(){
    var texto="<table border='1'><tr>";
    var tabla = document.getElementById('tabla');

    for(let i = 0 ; i < tabla.rows.length ; i++){     
        texto+=tabla.rows[i].innerHTML+"</tr>";
        texto+="</tr>";
    }
     
    render = window.open('data:application/vnd.ms-excel,' + encodeURI(texto));

    return render;
}


//registro


var formulario1 = document.getElementById('formulario');
if (formulario1 != null) {
    document.getElementById('formulario').onsubmit = function validar() {

        let nombre,apellido,dni,telefono,email,pass,exp;
    
        exp=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    
        nombre=document.getElementById('nombre').value;
        apellido=document.getElementById('apellido').value;
        dni=document.getElementById('dni').value;
        telefono=document.getElementById('tel').value;
        email=document.getElementById('email').value;
        pass=document.getElementById('pass').value;
        
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
            alert("El campo constrase�a supera la cantidad de caracteres permitidos");
            return false;
        }
        else if (isNaN(telefono)|| isNaN(dni) ) {
            alert("El campo telefono y dni tienen que ser de valor num�rico");
            return false;
        }
        else if (!exp.test(email) ) {
            alert("El email es invalido");
            return false;
        }
    
    }
}

//login


var formlog = document.getElementById('flog')
if (formlog != null) {
    document.getElementById('flog').onsubmit = function validaLog() {

         let email = "",pass = "",exp= /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    
        email=document.getElementById('login').value;
        pass=document.getElementById('pw').value;
    
        let esValido = exp.test(email);
    
        if (email === "" || pass === ""){
            alert("Complete los campos");
            return false;
        }else if(!esValido){
            alert("El email es invalido");
            return false;
        }  
    }
}


//Agregar usuario 

var fadm_user = document.getElementById("fadm_user");
if (fadm_user != null) {

    document.getElementById('fadm_user').onsubmit = function validaUser() {
        let nombre,apellido,dni,telefono,email,pass,tipo,selec;

        exp=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

        nombre = document.getElementById('nombre').value;
        apellido = document.getElementById('apellido').value;
        dni = document.getElementById('dni').value;
        telefono = document.getElementById('tel').value;
        email = document.getElementById('email').value;
        pass = document.getElementById('pass').value;
        tipo = document.getElementById('tipo')
        selec = document.getElementById('tipo').selectedIndex;

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
            alert("El campo constrase�a supera la cantidad de caracteres permitidos");
            return false;
        }
        else if (isNaN(telefono)|| isNaN(dni) ) {
            alert("El campo telefono y dni tienen que ser de valor num�rico");
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
}

//Editar usuario 

var fedit_user = document.getElementById("fedit_user");
if (fedit_user != null) {

    fedit_user.onsubmit = function validaUser() {
        var nombre,apellido,dni,telefono,email,tipo,selec,exp;

        exp=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

        nombre = document.getElementById('nombre').value;
        apellido = document.getElementById('apellido').value;
        dni = document.getElementById('dni').value;
        telefono = document.getElementById('tel').value;
        email = document.getElementById('email').value;
       
        tipo = document.getElementById('tipo')
        selec = document.getElementById('tipo').selectedIndex;

        if (nombre === "" || apellido === "" || dni === "" || telefono === "" || email === "") {
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
}   

//Alta curso 

var faltac = document.getElementById("faltac");
if (faltac != null) {
    faltac.onsubmit = function validaCurso() {
        let nombre,desc,fecha,prof;
        nombre = document.getElementById('nombre').value;
        desc = document.getElementById('desc').value;
        fecha = document.getElementById('fecha').value;
        prof = document.getElementById('prof').value; 

        if (nombre === "" || desc === "" || fecha === "" || prof=="") {
            alert("Complete los campos");
            return false;
        }else  if (nombre.length >50 || desc.length >255 || prof.length >50) {
            alert("El campo nombre supera la cantidad de caracteres permitidos");
            return false;
        }
    }
}

//Editar curso

var feditc= document.getElementById("feditc");
if (feditc != null) {

    document.getElementById('feditc').onsubmit = function validaCurso() {
        let nombre,desc,fecha,prof;
        nombre = document.getElementById('nombre').value;
        desc = document.getElementById('desc').value;
        fecha = document.getElementById('fecha').value;
        prof = document.getElementById('prof').value; 

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
            alert("El campo profesor supera la cantidad de caracteres permitidos");
            return false;
        }
    }
}

//altapregunta y editar preg 
var faltap = document.getElementById('faltap')
    
    if(faltap != null){

        faltap.onsubmit = function validaPreg() {
            var desc,tipo,curso,tiposel,cursel
             
            desc = document.getElementById('desc').value;
            tipo = document.getElementById('tipo')
            tiposel=tipo.selectedIndex
            curso = document.getElementById('curso')
            cursel=curso.selectedIndex
            
        
            if (desc=="" ) {
                alert("Complete los campos");
                return false;
            }
            else if (tipo.options[tiposel].value ==" " ){ 
                alert ("Selecione un tipo") 
                return false 
            }else if (curso.options[cursel].value==" "){ 
                alert ("Selecione un curso") 
                return false 
            }

        }
    }


var feditp = document.getElementById('feditp')
    
    if(feditp != null){

        feditp.onsubmit = function validaPreg() {
            var desc
             
            desc = document.getElementById('desc').value;
           
            
        
            if (desc=="" ) {
                alert("Complete los campos");
                return false;
            }
            

        }
    }