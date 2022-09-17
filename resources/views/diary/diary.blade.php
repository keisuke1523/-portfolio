<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>


    <!-- Bootstrap core CSS -->
   <!-- Scripts -->
   <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

      
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        

        body {
            background-image: url("{{ asset('img/image3.jpeg')}}")

        }

        .card-body {
            background-color: #EEEEEE
        }

        .card-header {
            background-color: #EEEEEE
        }
        

        .text {
            font-size: 40px;
            font-family: monospace;
            font-weight: bolder;
            color: #008000;
            text-shadow:3px 3px 2px #BBFFFF;
        }

        .nav-style {
    font-size: 20px;
    font-family: monospace;
    font-weight: bolder;
    color: #000000;
    text-shadow:3px 3px 2px #33CC66;
}


a {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
  text-decoration-color: #0000FF;
}

.pagenation {
  display: flex;
  justify-content: center;
    
}

@media (min-width: 768px) {

    a:hover {
  text-decoration: underline;
  text-decoration-color: #0000FF;
}

a {
  text-decoration: none;
}

}

    </style>




<body>

<header>
      <!-- ナビゲーションバー -->
      <nav class="navbar navbar-light">
<div class="nav-style">
<div class="center">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand"href="#">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent" >
    <img src="{{ asset('img/log.png')}}" alt="" width="40" height="30" class="d-inline-block align-text-top">dogサイト</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/toppage">Home</a>
        </li>
      
         <li class="nav-item">
          <a class="nav-link" href="/bbs" >掲示板</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/diary" >日記</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact" >問い合わせ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </li>   
   
    </div>
  </div>
</div>
</nav>


</header>

<main>

    <div class="album py-5">
        <div class="container">
            <div class="text-center  text-brak">
            <img class="mb-4" src="{{ asset('img/log6.jpeg') }}" alt="" width="170" height="90">
            <div class="text">
            <h1>成長日記</h1>
            </div>


           </div>
         </div>
         <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 ">

                                    新しく投稿する
                                </div>
                            </div>
                        </div>




                        <div class="card-body">
                            <form method="post" action="{{route('diaryRegister')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-8 form-floating">
                                <div class="mb-3">
                                    <input name="title" type="text" class="form-control" id="title" style="height: 30px" placeholder="タイトル" required="required">
                                    <br>
                                </div>
                                </div>
                                <div class="col-12 form-floating">
                                
                             <input type="file" name="imageFile" id="example">


                                    <textarea class="form-control"   name="content" id="content" rows="100" cols="10"  style="height: 300px" required="required"></textarea>
                                    <br><br>
                                    <div id="preview">
                                    </div>
                                </div>



                                <button class="btn btn-primary" type="submit">
                                    投稿する
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    
        <div class="container">
            @foreach($diarypostArray as $diarypost)
            @if($diarypost["user_id"] == Auth::id())
            
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{$diarypost["title"]}}
                                    </div>
                                    <div class="col-md-6 float-right">
                                        投稿日時：
                                        {{$diarypost["created_at"]->format('Y年m月d日h時m分')}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body1">
                                <p class="card-text">{{$diarypost["content"]}}</p>
                                @if($diarypost["image"])
                                <p><img width="250px" src="data:image/png;base64,{{$diarypost["image"]}}"></p>
                                @endif
                                
                            </div>
                      </div>
                 </div>
             </div>
                            
             <br><br>
             @endif             
            @endforeach
            
                            

        </div>
        <div class="pagenation">
         <!-- ページネーション-->
         {{$diarypostArray->links('vendor.pagination.bootstrap-4')}}
        </div>
    

</main>
<script>
    // 文字色変更
let content = document.getElementById('content');


let colorFore = document.getElementById('colorFore');
colorFore.value = "#000000";
colorFore.addEventListener('change', function(){
    content.style.color = this.value;
});
// 文字色変更ここまで



//画像添付

function previewFile(file) {
  // プレビュー画像を追加する要素
  const preview = document.getElementById('preview');

  // FileReaderオブジェクトを作成
  const reader = new FileReader();

  // ファイルが読み込まれたときに実行する
  reader.onload = function (e) {
    const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
    const img = document.createElement("img"); // img要素を作成
    img.src = imageUrl; // 画像のURLをimg要素にセット
    preview.appendChild(img); // #previewの中に追加
  }

  // いざファイルを読み込む
  reader.readAsDataURL(file);
}


// <input>でファイルが選択されたときの処理
const fileInput = document.getElementById('example');
const handleFileSelect = () => {
  const files = fileInput.files;
  for (let i = 0; i < files.length; i++) {
    previewFile(files[i]);
  }
}
fileInput.addEventListener('change', handleFileSelect);

</script>






</body>

</html>
