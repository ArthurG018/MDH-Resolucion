var txtCodigo = document.getElementById("txt_codigo");
var txtNombre = document.getElementById("txt_nombre");
var txtAPaterno = document.getElementById("txt_apaterno");
var txtAMaterno = document.getElementById("txt_amaterno");
var txtDNI = document.getElementById("txt_dni");



// Considerando que estado es una variable de tipo bool
function CambiarEntradas(){

    var txtDireccion = document.getElementById("txt_direccion");
    var txtCelular = document.getElementById("txt_celular");
    var txtCorreo = document.getElementById("txt_email");
    var rbtnM = document.getElementById("rbtnM");
    var rbtnF = document.getElementById("rbtnF");
    var dateFechaNac = document.getElementById("date_FechaNac");

    var botonEditar = document.getElementById("btn_editar");

    if (botonEditar.textContent == 'Editar') {

        txtDireccion.removeAttribute('readonly');
        txtCelular.removeAttribute('readonly');
        txtCorreo.removeAttribute('readonly');
        rbtnM.removeAttribute('disabled');
        rbtnF.removeAttribute('disabled');
        dateFechaNac.removeAttribute('readonly');
     
        botonEditar.textContent = "Cancelar";

        document.getElementById("contenedor-submit").innerHTML = '<input id="btn_enviar" type="submit" value="Guardar">';


    } else {

        txtDireccion.setAttribute('readonly', 'readonly');
        txtCelular.setAttribute('readonly', 'readonly');
        txtCorreo.setAttribute('readonly', 'readonly');
        rbtnM.setAttribute('disabled', 'disabled');
        rbtnF.setAttribute('disabled', 'disabled');
        dateFechaNac.setAttribute('readonly', 'readonly');

        document.getElementById("contenedor-submit").innerHTML = '';

        botonEditar.textContent = "Editar";
    }
}

