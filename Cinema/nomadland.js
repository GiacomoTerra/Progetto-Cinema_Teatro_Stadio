var app = new Vue({
    el: '#app',
    data: {
        product: 'Nomadland',
        description: 'film del 2020 scritto, diretto, co-prodotto e montato da Chloé Zhao, Adattamento cinematografico del libro della giornalista Jessica Bruder Nomadland, il film, con protagonista Frances McDormand, ha vinto il Golden Globe per il miglior film drammatico e per la miglior regista, oltre a tre Premi Oscar, rispettivamente per il miglior film, la miglior regia e la migliore attrice protagonista.',
        image: './assests/Nomadland.jpg',
        onSale: true,
        price: 9,
        total: 0,
        count: 0,
        
    },
    methods : {
        addToCount: function() {
            this.count +=1;
            this.total = this.price*count;
        }
    },
    computed: {
        image: function() {
            return this.image;
        }
    }
});

//function ControllaData