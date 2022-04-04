var app = new Vue({
    el: '#app',
    data: {
        product: 'Bohemian Simphony',
        description: 'The Queen Orchestra attraversa tutta la discografia dei Queen grazie alle potenti voci di Alessandra Ferrari, Roberta Orrù, Andrea Casali e Damiano Borgi, con gli arrangiamenti orchestrali di The Queen Orchestra, composta da archi, legni, ottoni e percussioni, diretta dal Maestro Luca Bagagli.',
        image: './img/queen.jpg',
        onSale: true,
        price: 30,
        data: "09/11/2021",
        time: "19;30"
    },
    methods : {},
    computed: {
        image: function() {
            return this.image;
        },

        date: function() {
            return this.day;
        }
        
    }
});

var $date = ["07/06/2021", "08/06/2021", "09/06/2021", "10/06/2021"]
var $cols = 16;
var $rows = 8;
jQuery(document).ready(function($) {
    $('#posti').append($('<p class= "text-center">Selezionare il posto:</p>'));
    for($i = 1; $i <= $rows; $i = $i+1) {
        $char = String.fromCharCode(64 + $i);
        if ($char == 'A' || $char == 'C' || $char == 'E' || $char == 'G') {
            for($j = 1; $j <= $cols; $j = $j+4) {
                $('#posti').append($('<span class= "col-3">' + 
                                                '<span>' +
                                                    '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px; segnaPosto(this)">' + 
                                                        '<input class="form-check-input" type="radio" name= "seats" id= "place" value= "' + $char + $j + '" onclick= "segnaPosto(this)"><br>' + $char + $j + 
                                                    '</div>' +
                                                '</span>' +
                                            '</span>'));
            }
            $('#posti').append($('<br>'));
        }
        else {
            for($k = 3; $k <= $cols; $k = $k+4) {
                $('#posti').append($('<span class= "col-3">' + 
                                                '<span>' +
                                                    '<div class= "check rounded" id= "place" style= "width: 50px; height: 50px; segnaPosto(this)">' + 
                                                        '<input class="form-check-input" type="radio" name= "seats" id= "place" value= "' + $char + $k + '" onclick= "segnaPosto(this)"><br>' + $char + $k + 
                                                    '</div>' +
                                                '</span>' +
                                            '</span>'));
            }
            $('#posti').append($('<br>'));
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
