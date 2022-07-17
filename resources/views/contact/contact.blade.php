<html>
   <head>
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
  h1 {


     letter-spacing: 10px;




    }

    .form-signin {

        text-align: left;
        letter-spacing: 5px;
        font-style: oblique;


    }












</style>

    <!-- Scripts -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">


<body class="text-center">
<div class="container">
<main class="form-signin">
    <div class="fs-1 mt-4 mb-4">
    <p>問い合わせフォーム</p>
    </div>
    <form action="{{route('sendMail')}}" method="post">
        @csrf
        <div class="form-group col-10 mb-1">
            <label for="subject">お名前:</label>
            <input name="name" type="text"  class="form-control" id="name" >

        </div>

        <div class="form-group col-10 mb-1">
            <label for="subject">フリガナ:</label>
            <input name="nameKana" type="text"  class="form-control" id="nameKana" >

        </div>


        <div class="form-group col-10 mb-1">
            <label for="subject">メールアドレス:</label>
            <input name="email" type="text"  class="form-control" id="email" >

        </div>

        <div class="form-group col-10 mb-1">
            <label for="subject">題名:</label>
            <input name="title" type="text"  class="form-control" id="title" >

        </div>


        <div class="form-group mt-3 col-12">
            <label for="subject">本文内容:</label>
            <textarea   name="content" class="form-control" id="new" value="{{old('describe')}}" rows="8" cols="50" ></textarea>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">送信</button>
    </form>
</main>

</div>





</body>
</html>



