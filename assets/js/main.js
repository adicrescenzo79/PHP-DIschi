
Vue.config.devtools = true;
var app = new Vue({
  el: '#root',
  data: {
    disks: [],
    infoIndex: '',
    info: false,
    genres: [],
    genreChosen: '',
  },
  mounted() {
    axios
    .get('http://localhost/php-ajax-dischi/call.php')
    .then((response) => {
      // console.log(response.data);
      let result = response.data;

      this.disks = this.sortedResult(result);

      for (var i = 0; i < response.data.length; i++) {
        let genre = response.data[i].genre;
        if (!(this.genres.includes(genre))) {
          this.genres.push(genre);
        }
      };

    });
  },
  methods: {
    getInfo: function(i){
      this.infoIndex = i;
      this.info = true;
    },
    closeInfo: function(){
      this.infoIndex = '';
      this.info = false;
    },
    sortedResult: function(arr) {
      return arr.slice().sort(function(a, b) {
        return a.year - b.year;
      });
    }

  },
})
