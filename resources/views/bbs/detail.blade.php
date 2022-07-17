<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Album example · Bootstrap v5.0</title>

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
                    <div class="form-floating">
                        <div class="col-4 form-floating">
                            <input name="name" type="text" class="form-control" id="name" style="height: 30px">
                            <label for="floatingInput">名前</label><br>
                        </div>
                        <div class="col-4 form-floating">
                            <input name="email" type="email" class="form-control" id="email" style="height: 30px">
                            <label for="floatingInput">email</label><br>
                        </div>
                        <div class="col-10 form-floating">
                       
                            <textarea name="content" class="form-control" id="textarea" rows="3" cols="10" style="height: 250px"></textarea>
                        </div><br>
                        <input name="studyPostId" type="hidden" value ="{{$id}}">
                        <button class="btn btn-primary" type="submit">
                            書き込む
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>

<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
