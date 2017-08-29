<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Myfriendser') }}</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
</head>
<body>

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
             {{-- message du home --}}

 <div class="hidden-xs col-sm-5 col-md-6 col-lg-8 pull-left info-text">
 <!--Connectez-vous à vos amis — et d'autres personnes fascinantes. Recevez des mises à jour instantanées sur les choses qui vous intéressent. Et rejardez les événements se dérouler, en temps réel, sous tous les angles.
-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <!--img src="images/1.jpg" alt="..."--> 
    Retrouver des styles comme vous n'avez jamais vue <br>  

      <div class="carousel-caption">
      
      </div>
    </div>
    <div class="item">
      <!--img src="images/2.jpg" alt="..."-->
    Partagez vos expériences avec des gens dans tous les coins.
      <div class="carousel-caption">
      
      </div>
    </div>
     <div class="item">
      <!--img src="images/2.jpg" alt="..."-->
       Trouvez de l'inspiration qu'importe le style et <br> <br>
         Participez à nos nombreuses soirées à thème
      <div class="carousel-caption">
        
      </div>
    </div>
  </div>
  </a>

</div>
</div> 
             {{-- fin message du home --}}
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('/') }}" class="logo">
               {{--  <img src="{{ asset('images/guest_logo.png') }}" alt="" /> --}}
            </a>
        </div>

        <div class="col-md-6">


            <div class="tab_container">
                <input id="tab1" type="radio" name="tabs" {{ old('tab') != 'register' ? 'checked' : '' }} class="radio_hidden">
                <label for="tab1" class="head"><i class="fa fa-user"></i><span>Connexion</span></label>

                <input id="tab2" type="radio" name="tabs" {{ old('tab') == 'register' ? 'checked' : '' }} class="radio_hidden">
                <label for="tab2" class="head"><i class="fa fa-user-plus"></i><span>S'inscrire</span></label>

                <div class="contents">
                    <section id="content1" class="tab-content">

                        @include('auth.login2')

                    </section>

                    <section id="content2" class="tab-content">
                        @include('auth.register2')

                    </section>
                </div>
            </div>
        </div>

    </div>


    @include('widgets.footer')
</div>


<!-- Scripts -->
<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.backstretch/jquery.backstretch.js')}}"></script>
<script src="{{ asset('js/background.js')}}"></script>
</body>
</html>
