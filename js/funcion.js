
//funcion que comprueba si el email introducido sigue las normas email
//recibe la variable email
function validarUser(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email.toLowerCase();) ){
      //en caso fallido, enrojece el cuadro texto con su class css
      document.getElementById('user').className="userKo";
      document.getElementById('pass').value="";
      return 1;
    }else {
      //en caso válido, enverdece el cuadro texto con su class css
      document.getElementById('user').className="userOk";
      return 0;
    }
}

//función que valida el password
function validarPass(pass) {
  //si el pass es entre 4 y 10
  if(pass.length>3 && pass.length<11){
    document.getElementById('pass').className="userOk";
    return 0;
  }else{
    document.getElementById('pass').className="userKo";
    document.getElementById('pass').value="";
    return 1;
  }
}

function borrar(objeto){
  document.getElementById(objeto).clear();
}

//función que vuelve los text a su estado original
function formatearForm(){
  document.getElementById('user').className="user";
  document.getElementById('pass').className="pass";
  document.getElementById('user').value="";
  document.getElementById('pass').value="";
}
