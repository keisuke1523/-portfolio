<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ログイン</title>
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
        h2 {
     
    
     letter-spacing: 5px;

    
     
  
    }

        .nav-link {
            text-align:  left;
            font-size: 18px;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

</head>

<body class="text-center">
<main class="form-signin">
    @if (session('errorMessage'))
        <div class="alert alert-success">
            @foreach(session('errorMessage') as $message)
                <p>
                    {{$message}}
                </p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="http://localhost/login">
        @csrf
        <img class="mb-4" src="{{ asset('img/log.png') }}" alt="" width="80" height="80">
        <h2 class="h2 mb-3 fw-normal">ログイン</h2>メールアドレスとパスワードを入力して下さい。<br><br>
        
        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">メールアドレス</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">パスワード</label><br>
        </div>
     
        <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button><br>
        <a class="nav-link" href="acount"><span style="text-decoration: underline">新規登録</a></span>
    </form>
</main>




</body>

</html>
