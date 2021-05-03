
Vue.config.devtools = true;
var app = new Vue({
  el: '#root',
  data: {
    allDisks: [],
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

      this.allDisks = this.sortedResult(result);

      this.disks = this.allDisks;

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
    },
    search: function(){
      if (this.artistChosen) {
        axios
        .get(`http://localhost/php-ajax-dischi/search_artist.php?artist=${this.artistChosen}`)
        .then((response) => {
          let result = response.data;
          // console.log(result);
          this.disks = this.sortedResult(result);

        });
      } else {
        this.disks = this.allDisks;

      }
    }

  },
})
