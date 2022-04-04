function validaForm() {
    $("#message_pwd").empty();

    var pw = $("#password").val();
    var res = true;
    if(pw != "") {   
        if(pw.length < 8 || !pw.match(/[a-z]/) || !pw.match(/[A-Z]/) || !pw.match(/\W/)) {
            $("#message_pwd").append("La password deve essere di almeno 8 caratteri, di cui almeno 1 lettera minuscola, 1 lettera maiuscola e 1 carattere speciale");
            res = false;
        }
    }

    if (res) {
        $("#message_pwd").empty();
        alert("Dati inseriti correttamente!")
        return res;
    }
    else {
        return res;
    }
}


jQuery(document).ready(function($) {

    $('#settore').ready(function () {
        for ($l = 1; $l < 53; $l = $l+1) {
            if ($l < 6 && $l != 31) $('#settore').append($("<option />").val($l).text($l));
            if ($l > 9 && $l != 31) $('#settore').append($("<option />").val($l).text($l)); 
        }
    });

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
				input.replaceWith(input.val('').clone(true) );
				evt.preventDefault();
			}
		})
	});
});

var $rows = 8;
var $cols = 45;

$("#settore").change(function() {
    if ($("#settore").val() == '') {
        $('#zonaDinamica').empty();
        $('#sit').val(''); 
    }
    else if($('#zonaDinamica') == $('#zonaDinamica').empty()) {
        $('#sit').val('');
    }
    else {
        $('#zonaDinamica').append($('<p class= "text-center">Selezionare un posto</p>'));
        for($i = 1; $i <= $rows; $i = $i+1) {
            $char = String.fromCharCode(64 + $i);
            if ($i%2 == 0) {
                for($j = 3; $j <= $cols+2; $j = $j+4) {
                    if ($j > 35) {
                        $('#zonaDinamica').append($('<span id= "stairs" class= "col-1 text-center rounded-3" style= "visibility= hidden">' + 
                                                    '<span>' +
                                                        '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px;">' + 
                                                        '</div>' +
                                                    '</span>' +
                                                '</span>'));
                    }
                    else {
                        $('#zonaDinamica').append($('<span id= "seats" class= "col-1 text-center rounded-3">' + 
                                                    '<span>' +
                                                        '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px;">' + 
                                                            '<input class="form-check-input" type="radio" name= "place" id= "place" value= "' + $char + $j + '" onclick= "segnaPosto(this)"><br>' + $char + $j + 
                                                        '</div>' +
                                                    '</span>' +
                                                '</span>'));
                    }                    
                }
                $('#zonaDinamica').append($('</span>'));
            } else {
                for($j = 1; $j <= $cols; $j = $j+4) {
                    if ($j > 33) {
                        $('#zonaDinamica').append($('<span id= "stairs" class= "col-1 text-center rounded-3" style= "visibility= hidden">' + 
                                                    '<span>' +
                                                        '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px;">' + 
                                                        '</div>' +
                                                    '</span>' +
                                                '</span>'));
                    }
                    else {
                        $('#zonaDinamica').append($('<span id= "seats" class= "col-1 text-center rounded-3">' + 
                                                    '<span>' +
                                                        '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px;">' + 
                                                            '<input class="form-check-input" type="radio" name= "place" id= "place" value= "' + $char + $j + '" onclick= "segnaPosto(this)"><br>' + $char + $j + 
                                                        '</div>' +
                                                    '</span>' +
                                                '</span>'));
                    }                    
                }
                $('#zonaDinamica').append($('</span>'));
            }
        }
    }
});

function segnaPosto(x) {
    $cnt = 1;
    $(x).ready(function() {
        if ($cnt%2 != 0) {
            $('#sit').append($('#sit')).val(x.value).text(x.value);
        }
        $(x).click(function() {
            $cnt = $cnt+1;
            if ($cnt%2 != 0) {
                $('#sit').append($('#sit')).val(x.value).text(x.value);
            }
            else {
                $('#sit').append($('#sit')).val('').text('');
            }
        });
    });
}

var app = new Vue({
    el: '#app',
    data: {
        product: 'Italia - Turchia',
        description: 'Girone A - Partita inaugurale di UEFA Euro 2020. A Roma si gioca la prima partita del girone degli Azzurri guidati dal CT Roberto Mancini contro la Turchia degli "italiani" Demiral e Calhanoglu. Prima della gara si terrà la Cerimonia di Apertura della competizione.',
        image: './img/olimpico.png',
        onSale: true,
        price: 75,
        data: "11 Giugno 2021",
        ora: "21:00",
        stadium: "Stadio Olimpico, Roma",
        seats: 47*$rows*$cols
    },
    computed: {
        image: function() {
            return this.image;
        }
    }
});
