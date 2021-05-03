<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/12bool.css">
    <link rel="stylesheet" href="./assets/css/master.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/7/71/Spotify.png" type="image/png">
    <title>Boolify Web</title>
  </head>
  <body class="">
    <div id="root">

      <div v-if="info" class="disk-info">
        <img :src="disks[infoIndex].poster" alt="">
        <div class="info">
          <h2 class="author">{{disks[infoIndex].author}}</h2>
          <h1 class="title">{{disks[infoIndex].title}}</h1>
          <h4 class="year">{{disks[infoIndex].year}}</h4>
          <h4 class="genre">{{disks[infoIndex].genre}}</h4>
          <i @click="closeInfo()" class="far fa-times-circle"></i>
        </div>
      </div>

      <div id="up">

        <aside class="text-capitalize">

          <div class="top">
            <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_RGB_White.png" alt="" class="big">
            <i class="fab fa-spotify"></i>

            <div class="menu">

              <a href="#" class="home">
                <div>
                  <svg viewBox="0 0 512 512" width="24" height="24" xmlns="http://www.w3.org/2000/svg"><path d="M448 463.746h-149.333v-149.333h-85.334v149.333h-149.333v-315.428l192-111.746 192 110.984v316.19z" fill="currentColor"></path></svg>
                </div>
                <span>home</span>
              </a>

              <a href="#" class="search">
                <div>
                  <svg viewBox="0 0 512 512" width="24" height="24" xmlns="http://www.w3.org/2000/svg"><path d="M349.714 347.937l93.714 109.969-16.254 13.969-93.969-109.969q-48.508 36.825-109.207 36.825-36.826 0-70.476-14.349t-57.905-38.603-38.603-57.905-14.349-70.476 14.349-70.476 38.603-57.905 57.905-38.603 70.476-14.349 70.476 14.349 57.905 38.603 38.603 57.905 14.349 70.476q0 37.841-14.73 71.619t-40.889 58.921zM224 377.397q43.428 0 80.254-21.461t58.286-58.286 21.461-80.254-21.461-80.254-58.286-58.285-80.254-21.46-80.254 21.46-58.285 58.285-21.46 80.254 21.46 80.254 58.285 58.286 80.254 21.461z" fill="currentColor" fill-rule="evenodd"></path></svg>
                </div>
                <span>cerca</span>
              </a>

              <a href="#" class="library">
                <div>
                  <svg viewBox="0 0 512 512" width="24" height="24" xmlns="http://www.w3.org/2000/svg"><path d="M291.301 81.778l166.349 373.587-19.301 8.635-166.349-373.587zM64 463.746v-384h21.334v384h-21.334zM192 463.746v-384h21.334v384h-21.334z" fill="currentColor"></path></svg>
                </div>
                <span>la tua libreria</span>
              </a>

            </div>
            <!-- SELECT -->
            <div class="playlist">
              <span class="text-uppercase">choose your artist</span>
                <select @change="search()" v-model="artistChosen" class="" name="">
                  <option value="">All Artists</option>
                  <option v-for="artist in artists" >{{artist}}</option>
                </select>

            </div>

          </div>

          <div class="bottom">
            <a href="#" class="install">
              <i class="far fa-arrow-alt-circle-down white"></i>
              <span>Installa app</span>
            </a>
            <div class="linea"></div>
            <a href="#" class="profile">
              <i class="far fa-user-circle"></i>
              <span class="white">John Doe</span>
            </a>
          </div>

        </aside>

        <main>
          <header>
            <a id="upgrade" class="text-uppercase">
              effettua l'upgrade
            </a>
          </header>

          <div id="central">

            <!-- <nav class="text-uppercase">
              <a @click="artistChosen = ''" href="#">ALL ARTISTS</a>
              <a @click="artistChosen = artist" v-for="artist in artists" href="#">{{artist}}</a>
            </nav> -->
            <!-- LISTA DISCHI -->
            <div id="recenti">
                  <div class="dischi">
                    <div
                      @click="getInfo(i)"
                      class="disco"
                      v-for="(disk, i) in disks">
                      <div class="play">
                        <img :src="disk.poster" alt="">
                        <div class="middle">
                          <i class="far fa-play-circle"></i>
                        </div>
                      </div>
                      <span class="title">{{disk.title}}</span>
                      <span class="subtitle">{{disk.author}}</span>
                    </div>
                  </div>
            </div>

          </div>
        </main>
      </div>

      <footer>

        <div class="song">
          <div class="cover">
            <img src="./assets/img/6.png" alt="">
            <a href="" class="info">
              <span class="white">Sinister</span>
              <span class="text-capitalize">Brano nome</span>
            </a>
          </div>
          <div class="like">
            <a href="#"><i class="far fa-heart"></i></a>
            <a href="#"><i class="far fa-folder"></i></a>
          </div>
        </div>

        <div class="player">
          <div class="commands white">
            <div class="left">
              <a class="white" href=""><i class="fas fa-random"></i></a>
              <a class="white" href=""><i class="fas fa-step-backward"></i></a>
            </div>
            <a class="white play" href=""><i class="far fa-play-circle"></i></a>
            <div class="right">
              <a class="white" href=""><i class="fas fa-step-forward"></i></a>
              <a class="white" href=""><i class="fas fa-redo-alt"></i></a>
            </div>
          </div>
          <div class="duration white">
            <span>0.25</span>
            <div class="bar">
              <div class="bar-left"></div>
              <div class="bar-right"></div>
              <div class="ball"></div>
            </div>
            <span>4.35</span>
          </div>
        </div>

        <div class="vol white">
          <a class="white" href=""><i class="fas fa-list-ul"></i></a>
          <a class="white" href=""><i class="fas fa-desktop"></i></a>
          <a class="white" href=""><i class="fas fa-volume-up"></i></a>
          <div class="range">
            <div class="bar">
              <div class="bar-left"></div>
              <div class="bar-right"></div>
              <div class="ball"></div>
            </div>
          </div>
        </div>

      </footer>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="./assets/js/main.js" charset="utf-8"></script>
  </body>
</html>
