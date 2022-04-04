function validaForm() {
    $("#message_cap").empty();
    $("#message_tel").empty();
    $("#message_pwd").empty();

    var pw = $("#password").val();
    var res = true;
    
    if ($("#cap").val() != '') {
        
        var v = $("#cap").val();
        if (isNaN(v) || v.length != 5) {
            $("#message_cap").append("CAP inserito non valido!");
            res = false;
        }
    }
    
    if ($("#tel").val() != '') {
        var v = $("#tel").val();
        if (isNaN(v) || v.length < 9 || v.length > 16) {
            $("#message_tel").append("Numero di telefono inserito non valido!");
            res = false;
        }
    }
   
    if(pw != "") {   
        if(pw.length < 8 || !pw.match(/[a-z]/) || !pw.match(/[A-Z]/) || !pw.match(/\W/)) {
            $("#message_pwd").append("La password deve essere di almeno 8 caratteri, di cui almeno 1 lettera minuscola, 1 lettera maiuscola e 1 carattere speciale");
            res = false;
        }
    }

    if (res) {
        $("#message_cap").empty();
        $("#message_tel").empty();
        $("#message_pwd").empty();
        alert("Dati inseriti correttamente!")
        return res;
    }
    else {
        return res;
    }
}

jQuery(document).ready(function($) {
	$('#vax').each(function(){
		$(this).change(function(evt){
			var input = $(this);
			var file = input.prop('files')[0];
			var regex = "^(image/)(gif|(x-)?png|p?jpeg|)$";
            var pdf = "^(application/)(pdf)$";
			if( file && file.size < 2 * 1048576 && (file.type.search(regex) != -1 || file.type.search(pdf) != -1)) { // 2 MB (this size is in bytes)
				alert( 'Success!' );
			}else{
				alert( 'File non ammesso - Tipo: ' + file.type + '; dimensioni: ' + file.size );
				input.replaceWith( input.val('').clone(true) );
				evt.preventDefault();
			}
		})
	});
});

