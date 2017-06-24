function letras(valor)
{
	var letraN = '';
	var arreglo = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ abcdefghijklmnñopqrstuvwxyz1234567890-/¿?.=""%*+;_';
	for (var i=0;i<valor.value.length;i++)
	{
		if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
		{
			letraN = letraN + valor.value.substr(i,1);
		}
	}
	if(valor.value != letraN) {
		valor.value = letraN;
	}
}
function login(valor)
{
	var letraN = '';
	var arreglo = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz_';
	for (var i=0;i<valor.value.length;i++)
	{
		if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
		{
			letraN = letraN + valor.value.substr(i,1);
		}
	}
	if(valor.value != letraN) {
		valor.value = letraN;
	}
}
function expediente(valor)
{
	var letraN = '';
	var arreglo = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz1234567890-._';
	for (var i=0;i<valor.value.length;i++)
	{
		if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
		{
			letraN = letraN + valor.value.substr(i,1);
		}
                else
                {
                    alert("Carácter Inválido para el nro. de expediente");
                }
	}
	if(valor.value != letraN) {
		valor.value = letraN;
	}
}
function monto(valor)
{
	var letraN = '';
	var arreglo = '0123456789.';
	for (var i=0;i<valor.value.length;i++)
	{
		if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
		{
			letraN = letraN + valor.value.substr(i,1);
		}
	}
	if(valor.value != letraN) {
		valor.value = letraN;
	}
}
function telefonos(valor)
{
	var letraN = '';
	var arreglo = '0123456789';
	for (var i=0;i<valor.value.length;i++)
	{
		if (arreglo.indexOf(valor.value.substr(i,1)) != -1)
		{
			letraN = letraN + valor.value.substr(i,1);
		}
	}
	if(valor.value != letraN) {
		valor.value = letraN;
	}
}
function cuentaCaracter(valor)
{    
    var maximo=1000;
    var mensaje="El asunto";
    if (valor.value.length > maximo)
    {
        valor.value = valor.value.substring(0, maximo);
        alert('IMPORTANTE:\n'+mensaje+' no puede exceder los '+maximo+' caracteres.');
    }
    else
    {
        document.getElementById('contarasunto').value = maximo - valor.value.length;
    }
}
function cuentaDescripcionObjeto(valor)
{
    var maximo=250;
    var mensaje="La descripcion";
    if (valor.value.length > maximo)
    {
        valor.value = valor.value.substring(0, maximo);
        alert('IMPORTANTE:\n'+mensaje+' no puede exceder los '+maximo+' caracteres.');
    }
    else
    {
        document.getElementById('objetos_contardescripcion').value = maximo - valor.value.length;
    }
}
function cuentaCaracterObsCierre(valor)
{
    var maximo=500;
    var mensaje="Las observaciones";
    if (valor.value.length > maximo)
    {
        valor.value = valor.value.substring(0, maximo);
        alert('IMPORTANTE:\n'+mensaje+' no puede exceder los '+maximo+' caracteres.');
    }
    else
    {
        document.getElementById('contarobscierre').value = maximo - valor.value.length;
    }
}
var remplaza = /\+/gi;
var url = window.location.href;
url = unescape(url);
url = url.replace(remplaza, " ");
url = url.toUpperCase();
function obtener_valor(variable)
{
    var variable_may = variable.toUpperCase();
    var variable_pos = url.indexOf(variable_may);

    if (variable_pos != -1)
    {
        var pos_separador = url.indexOf("&", variable_pos);

    if (pos_separador != -1)
    {
        return url.substring(variable_pos + variable_may.length + 1, pos_separador);
    } else
    {
        return url.substring(variable_pos + variable_may.length + 1, url.length);
    }
    } else
    {
        return "NO_ENCONTRADO";
    }
}
