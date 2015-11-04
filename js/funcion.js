function validarUser(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
      //document.getElementById('user').style.borderColor="red";
      document.getElementById('user').className="userKo";
      document.getElementById('user').value="Incorrecto";
      return 1;
    }else {
      document.getElementById('user').className="userOk";
      //document.getElementById('user').style.borderColor="green";
      return 0;
    }
}

function validarPass(pass) {
  if(pass.length>3 && pass.length<11){
    document.getElementById('pass').className="userOk";
    //document.getElementById('pass').style.borderColor="green";
    return 0;
  }else{
    document.getElementById('pass').className="userKo";
    //document.getElementById('pass').style.borderColor="red";
    document.getElementById('pass').value="";
    return 1;
  }
}

function borrar(objeto){
  document.getElementById(objeto).clear();
}

function formatearForm(){
  document.getElementById('user').className="user";
  document.getElementById('pass').className="pass";
}
