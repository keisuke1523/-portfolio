<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BBS detail</title>

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

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            background-image: url("{{ asset('img/bak.jpg')}}")
            
        }

        .return {
            display: flex;
            justify-content: center;
            font-size: 20px;
        }

        a:hover {
           text-decoration: underline;
           text-decoration-color: #111111;
        }
    </style>


</head>

<body>

<main>

    <div class="album py-5">
        <div class="container">
        
            @foreach($studyPostArray as $studyPost)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 float-right">
                                        {{$loop->index + 1}} 名前：{{$studyPost["name"]}} 投稿日時：{{$studyPost["created_at"]}}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body">
                                {{$studyPost["content"]}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <form method="post" action="{{route('bbsReplyRegister')}}">
                @csrf
            <div class="card card-body">
                 <div class="col-4 form-floating">
                        <div class="mb-3">
                            <label for="subject">名前:</label> 
                            <input name="name" type="text" class="form-control" id="name"  style="height: 30px" placeholder="例：テスト 太郎" required="required">
                        </div>
                        
                 </div>
                     <div class="col-4 form-floating">
                        <div class="mb-3">
                            <label for="subject">メールアドレス:</label> 
                            <input name="email" type="email" class="form-control" id="email"  style="height: 30px" placeholder="例：example@test.jp">
                        </div>
                     </div>
                        <div class="col-10 form-floating">
                       
                            <textarea name="content" class="form-control" id="textarea" rows="3" cols="10" style="height: 250px" required="required"></textarea>
                        </div><br>
                        <input name="studyPostId" type="hidden" value ="{{$id}}">
                        <button class="btn btn-primary" type="submit">
                          書き込む
                        </button>
                
                </div>
          
            </form>
        </div>
        

    </div>
    <div class="return">
    <a class="nav-link" href="/bbs" style="color: white">掲示板一覧へ戻る</a>
    </div>
</main>

<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
