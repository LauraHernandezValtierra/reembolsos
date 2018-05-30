
			function cambiaClase(){
				//alert('lol');
				if(document.getElementById('validado').checked==true){
					//alert('im here');
						document.getElementById('aceptaD').className = 'divcolor2';
				}
				else{
					//alert('and here too');
					document.getElementById('aceptaD').className = 'divcolor1';
				}
			}
function showUser(str) {
	if (str=="") {
		document.getElementById("cmunicipio").innerHTML="";
		return;
	} 
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("cmunicipio").innerHTML=xmlhttp.responseText;
			}
	}
	
	xmlhttp.open("GET","php/municipios.php?edo="+str,true);
	xmlhttp.send();
}

$(document).ready(function(){
				$("#cestado").change(function () {

					//$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cestado option:selected").each(function () {
						edo = $(this).val();
						$.post("../funciones/municipios.php", { edo: edo }, function(data){
							$("#cmunicipio").html(data);
						});            
					});
				})
			});



			function showselect(str){
		var xmlhttp; 
		if (str=="")
		 {
		 document.getElementById("txtHint").innerHTML="";
		return;
		 }
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		 }
		else
		 {// code for IE6, IE5
		 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("cmunicipios").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../funciones/municipios.php?c="+str,true);
	xmlhttp.send();