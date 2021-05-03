
Vue.config.devtools = true;
var app = new Vue({
  el: '#root',
  data: {
    disks: [],
    infoIndex: '',
    info: false,
    artists: [],
    artistChosen: '',
  },
  mounted() {
    axios
    .get('http://localhost/php-ajax-dischi/call.php')
    .then((response) => {
      let result = response.data;

      this.disks = this.sortedResult(result);

      for (var i = 0; i < response.data.length; i++) {
        let artist = response.data[i].author;
        if (!(this.artists.includes(artist))) {
          this.artists.push(artist);
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
