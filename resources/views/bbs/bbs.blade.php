<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>BBS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">



    <!-- Bootstrap core CSS -->
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
        

        .categori-color {
            background-color: #CCFFCC;
            padding: 10px;
            margin: 10px;
            /* letter-spacing: 2.5px; */
            white-space: pre-line
        }

        body {
            background-image: url("{{ asset('img/bak.jpg')}}")

        }

        .text1 {
            font-size: 70px;
            font-family: monospace;
            font-weight: bolder;
            color: #000000;
            text-shadow:3px 3px 2px #CCFFCC;
        }
        .text2 {
            font-size: 20px;
            font-family: Impact,Charcoal;
            font-weight: bolder;
            color: #000000;
            text-shadow:3px 3px 2px #FFFFAA;
        }

        .blocktext {
            align-items: center
}




    .navbar-light .navbar-toggler {
    border-color: rgba(0,0,0,0);
}


.nav-style {
    font-size: 20px;
    font-family: monospace;
    font-weight: bolder;
    color: #000000;
    text-shadow:3px 3px 2px #000000;
}

a {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
  text-decoration-color: #111111;
}

.pagenation {
  display: flex;
  justify-content: center;
    
}

@media (min-width: 768px) {
        
}
    
    </style>


</head>

<body>
<header>
      <!-- ナビゲーションバー -->
      <nav class="navbar navbar-light">
<div class="nav-style">
<div class="center">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: white" href="#">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent" >
    <img src="{{ asset('img/log.png')}}" alt="" width="40" height="30"  class="d-inline-block align-text-top">dogサイト</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" style="color: white" href="/toppage">Home</a>
        </li>
      
         <li class="nav-item">
          <a class="nav-link" href="/bbs" style="color: white">掲示板</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/diary" style="color: white">日記</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact" style="color: white">問い合わせ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  style="color: white" href="{{ route('logout') }}"
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
        <div class="row">
        <div class="text-center">
        　<div class="text1">
            🐾ワンちゃんねる🐾
            </div>
    </div>
            <div class="row">
            <!-- <div class="text2">
                カテゴリの一覧
            </div>
                <nav class="categori-color1">
                    <ul class="nav flex-column m-0 p-3">
                        @foreach($categoryArray as $category)
                            <li class="nav-item mb-2">
                                <a href="/bbs/{{$category['id']}}">{{$category["category_name"]}}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav> -->
                <div class="text2">
                掲示板スレ一覧
               </div>
                <div class="categori-color">
                @foreach($studyPostArray as $studyPost)
                    <a href="/bbs/detail/{{$studyPost['id']}}">{{$studyPost["title"]}}</a>
                @endforeach
            </div>
                <div class="col-xs-8">
                    @foreach($studyPostArray as $studyPost)

                        @foreach($studyPost->studyPostReplyArray as $studyPostReply)
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6 float-right">
                                                    {{$loop->index + 1}} 名前：{{$studyPostReply["name"]}} 投稿日時：{{$studyPostReply["created_at"]}}
                                                    @if($loop->index == 0)
                                                     <!-- スレ単位 の削除 -->
                                                    <form method="post" action="{{route('deletePost')}}">
                                                        @csrf
                                                        <input type="hidden" name="deletePostId" value="{{$studyPost["id"]}}">
                                                        <button class="btn-sm btn-primary" type="submit">
                                                            全削除
                                                        </button>
                                                    </form>
                                                    @else
                                                        <form method="post" action="{{route('deletePostReply')}}">
                                                            @csrf
                                                            <input type="hidden" name="deletePostReplyId" value="{{$studyPostReply["id"]}}">
                                                            <button class="btn-sm btn-primary" type="submit">
                                                                削除
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-body">
                                            {{$studyPostReply["content"]}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            新しく投稿する
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('bbsRegister')}}">
                        @csrf
                        <input type="hidden" name="categoryId" value="{{$categoryId}}">
                        <div class="col-8 form-floating">
                        <div class="mb-3">
                            <label for="subject">名前:</label> 
                            <input name="name" type="text" class="form-control" id="name"  style="height: 30px" placeholder="例：テスト 太郎" required="required">
                        </div>
                        
                        </div>
                        <div class="col-8 form-floating">
                        <div class="mb-3">
                            <label for="subject">メールアドレス:</label> 
                            <input name="email" type="email" class="form-control" id="email"  style="height: 30px" placeholder="例：example@test.jp">
                        </div>
                        </div>
                        <div class="col-8 form-floating">
                        <div class="mb-3">
                            <label for="subject">タイトル:</label> 
                            <input name="title" type="text" class="form-control" id="title"  style="height: 30px" placeholder="タイトル" required="required">
                        </div>
                        </div>
                        <label for="subject">本文:</label> 
                        <div class="col-11 form-floating">
                            <textarea name="content" class="form-control" id="textarea" rows="10" cols="10" style="height: 250px" placeholder="本文" required="required"></textarea><br>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            書き込む
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="pagenation">
{{$studyPostArray->links('vendor.pagination.bootstrap-4')}}
</div>
</main>


<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
