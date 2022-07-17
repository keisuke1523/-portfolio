<!DOCTYPE html>
<html>
   <head>
       <title>dogsite</title>
       <meta charset="utf-8">

      
 </head>
<style>

.bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    .content {
        top: 100px;
        text-align: right;

        margin-top: 20px;

    }
    .center {
        background-color: #e3f2fd;

    }
    .navbar .navbar-nav .nav-item > .nav-link {
    color: rgba(0,0,255,1);
}

.navbar .navbar-nav .nav-item .active > .nav-link  {
    color: rgba(0,0,255,1);
}

.card-text  {
  font-family: monospace;
  font-weight: bolder;
  color: 	#FF66FF	;
  text-shadow:3px 3px 2px #0099CC;
}

.footer-style {
  font-size: 35px;
}

.fadein {
  opacity : 0;
  transform : translate(0, 100px);
  transition : all 1s;
}

.fadein.active{
  opacity : 1;
  transform : translate(0, 0);
}


.fadein2 {
  opacity : 0;
  transform: translateX(-100px);
  transition : all 1s;
}

.fadein2.active2{
  opacity : 1;
  transform : translate(0, 0);
}

.fadein3 {
  opacity : 0;
  transform : translate(100px, 0);
  transition : all 1s;
}

.fadein3.active3{
  opacity : 1;
  transform : translate(0, 0);
}

@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');

.title {
  display: flex;
  overflow: hidden;
  color: #aa8f7b;
  font-family: 'Josefin Sans', sans-serif;
  font-size: 70px;
  color: #008000;
  text-shadow:3px 3px 2px #BBFFFF;
  justify-content: center;


}

.text-center {
  bottom: 50%;
  top:40%;
  position: relative;
  
}




/****** Base style. ******/


.top-faderight {
    animation-name: faderight;
    animation-duration: 1s;
    animation-iteration-count: 1;
}

.top-fadeleft {
    animation-name: fadeleft;
    animation-duration: 1s;
    animation-iteration-count: 1;
}

@keyframes faderight {
    from {
        opacity: 0;
        transform: translateX(-150px);
    }
    to {
        opacity: 1;
        transform: translateX(0px);
    }
}

@keyframes fadeleft {
    from {
        opacity: 0;
        transform: translateX(150px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

a {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
  text-decoration-color: #000000;
}

  /* Grid */

.grid {
    width: 94vw;
    margin: 0 auto 3vw;
    display: grid;
    gap: 2vw;
    grid-template-columns: repeat(2, 46vw);
    /* (94 - 2) / 2 */
    grid-template-rows: repeat(8, 46vw);
}

.grid-item {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    filter: grayscale(100%);
}



  
   .grid {
        width: 80vw;
        gap: 1vw;
        grid-template-columns: repeat(3, 26vw);
        /* (80 - 2) / 3 */
        grid-template-rows: repeat(5, 26vw);
    }


    .grid-item {
        transition: .3s;
    }

    .grid-item:hover {
        filter: grayscale(0);
        box-shadow: 0 0 2rem rgba(0, 0, 0, .5);
        transform: scale(1.1);
        z-index: 3;
        position: relative;
    }

    
/*LIGHTBOX LUMINOUS
================================================ */
.lum-lightbox.lum-open {
    z-index: 4;
}

.lum-lightbox-inner img {
    max-width: 120vw;
    max-height: 80vh;
}

 </style>

    <!-- Scripts -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.3.2/luminous-basic.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="{{ asset('bootstrap/dist/jq/jquery-3.6.0.min.js') }}"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  


<body class="text-center"  style="background-color: #e3f2fd">
<header>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<div class="center">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <img src="{{ asset('img/log.png')}}" alt="" width="40" height="30" class="d-inline-block align-text-top">dogサイト</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
      
         <li class="nav-item">
          <a class="nav-link" href="bbs">掲示板</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="diary">日記</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact">問い合わせ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
</header>

<secion>
<div class="card"  style="width: 82rem" >
  <img src="{{ asset('img/image.jpg')}}" class="card-img"  alt="...">
  <div class="card-img-overlay title">
  <div  class="text-center">
  <h1>飼い主同士で楽しく交流しよう！</h1>
   </div>
  </div>
</div>
</section>
<br><br>
<div>
<h2>飼い主同士の交流サイト<h2>
</div>
<br>
<section>
<div class=" row row-cols-1 row-cols-md-2  g-4">
  <div class="col">
    <div class="card"  style="width: 35rem"  >
      <img src="{{ asset('img/image2.png')}}"class="fadein" class="card-img-top" alt="...">
      <div class="fadein">
      <div class="card-body">
        <h3 class="dog-title">交流掲示板</h3>
        <h4 class="dog-text">飼い主同士で悩みなど情報共有できる場所</h4>
      </div>
   </div>
    </div>
  </div>

  <div class="col-6 col-pr-4">
  <div class="col">
    <div class="card" style="width: 35rem" >
      <img src="{{ asset('img/image3.png')}}"class="fadein" class="card-img-top" alt="...">
      <div class="fadein">
      <div class="card-body">
        <h3 class="card-title">成長日記</h3>
        <h4 class="dog-text">日々のワンちゃんの成長を記録</h4>
      </div>
     </div>
    </div>
  </div>
</div>

  <div class="col">
    <div class="card" style="width: 35rem">
      <img src="{{ asset('img/image4.png')}}" class="fadein"　class="card-img-top" alt="...">
      <div class="fadein">
      <div class="card-body">
        <h3 class="card-title">散歩スポット</h3>
        <h4 class="dog-text">オススメの散歩スポット情報</h4>
      </div>
     </div>
    </div>
  </div>

</section>
<br><br>
<hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 fadein2" style="width: 45rem">
                    <h2 class="text-success" ><br><br>日ごとに投稿が確認できる。<br>飼い主が抱えてる悩みもみんなで解決。</h2><br>
                    <h3>例えば、飼っているワンちゃんが水をなかなか飲まないなど、<br>オススメの餌の情報など飼い主同士が情報を共有できる掲示板です。</h3>
                </div>
                <div class="col-md-5 fadein3">
                <img src="{{ asset('img/image5.png')}}" class="img-fluid" alt="...">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2 fadein3">
                　　　<h2 class="text-success" ><br>ワンちゃんの成長の記録及び管理できる。</h2><br>
                    <h3>日々のワンちゃんの生活を日ごとに記録できます。<br>写真のアップロードもできるので可愛いワンちゃんの成長が<br>実感できます。</h3>
                </div>
                <div class="col-md-5 order-md-1 fadein2" style="width: 30rem" >
                <img src="{{ asset('img/image6.png')}}"  class="img-fluid" alt="...">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 fadein2"  style="width: 45rem">
                　　<h2 class="text-success" >オススメ散歩スポット一覧</h2><br>
                    <h3><br>ワンちゃんと楽しめる散歩スポットを掲載します。<br>もしオススメの散歩スポットがあれば掲示板に書き込み<br>お願いします。その都度サイトを更新していきます。</h3>
                </div>
                <div class="col-md-5 fadein3">
                <img src="{{ asset('img/image7.jpg')}}"  class="img-fluid" alt="...">
              </div>
            </div>
            <hr class="featurette-divider">
<section>
<div class="title-spot">
        <h2>オススメの散歩スポット一覧</h2><br>
      </div>
<main class="grid">
            <a class="grid-gallery" href="img/img2-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img2-400.jpg" srcset="img/img2-400.jpg 400w,
                        img/img2-800.jpg 800w" 
              alt="昭和記念公園<br>住所：〒190-0014 東京都立川市緑町３１７３<br>遊ぶには最適な場所です">
        </a>

        <a class="grid-gallery" href="img/img3-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img3-400.jpg" srcset="img/img3-400.jpg 400w,
                        img/img3-800.jpg 800w" 
               alt="葛西臨海公園<br>住所：〒134-0086 東京都江戸川区臨海町６丁目２<br>遊ぶには最適な場所です">
        </a>

        <a class="grid-gallery" href="img/img4-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img4-400.jpg" srcset="img/img4-400.jpg 400w,
                        img/img4-800.jpg 800w"
               alt="夢の島公園<br>住所：〒136-0081 東京都江東区夢の島２丁目１<br>遊ぶには最適な場所です">
        </a>

        <a class="grid-gallery" href="img/img4-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img4-400.jpg" srcset="img/img4-400.jpg 400w,
                        img/img4-800.jpg 800w" alt="Sainte Chapelle">
        </a>

        <a class="grid-gallery" href="img/img4-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img4-400.jpg" srcset="img/img4-400.jpg 400w,
                        img/img4-800.jpg 800w" alt="Sainte Chapelle">
        </a>

        <a class="grid-gallery" href="img/img4-1600.jpg" data-aos="fade-up">
            <img class="grid-item" src="img/img4-400.jpg" srcset="img/img4-400.jpg 400w,
                        img/img1-800.jpg 800w" alt="Sainte Chapelle">
        </a>

    </main>
</section>


<div class="footer-style">
<footer class="footer mt-auto py-3">
  <div class="container">
  <div id="footer-logo">
        <img src="{{ asset('img/log.png')}}"  width="40" height="30" alt="dogsite">
         dogsite
      </div>
      <div>
       <a class="text-muted small" href="toppage">Home</a>
        <a class="text-muted small"  href="bbs">掲示板</a>
        <a class="text-muted small"  href="diary">日記</a>
        <a class="text-muted small"  href="contact">問い合わせ</a>
     　 </div>
  <div>
    <span class="text-muted small">&copy;2022 dogsite, Inc. All Rights Reserved.</span>
  </div>
</footer>
</div>

<script>
//キャッチコピー(テキスト：アニメーション)
$('h1').animate({fontSize:'80px'}, 2000);

//画面アニメーション
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var position = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
              $(this).addClass('active');
            }
        });

        $('.fadein2').each(function(){
            var position = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
              $(this).addClass('active2');
            }
        });

        $('.fadein3').each(function(){
            var position = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
              $(this).addClass('active3');
            }
        });
    });
});


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.3.2/luminous.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="{{ asset('js/script.js')}}"></script>





<!-- 初回 -->



</body>


</html>
