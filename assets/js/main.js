
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
    .get('https://flynn.boolean.careers/exercises/api/array/music')
    .then((response) => {
      let result = response.data.response;

      this.disks = this.sortedResult(result);

      for (var i = 0; i < response.data.response.length; i++) {
        let genre = response.data.response[i].genre;
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
