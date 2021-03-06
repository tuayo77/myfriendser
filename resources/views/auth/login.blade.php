@extends('layouts.app2')
@section('content')

<div class="row">
<div class="tab_container padding">
<div class="col-md-1"></div>
    <div class="col-md-5 contents">
    <div class="col-md-6 tab-content" id="content1">
        <form role="form" method="POST" action="{{ route('login') }}">
    <input type="hidden" value="login" name="tab" />
    {{ csrf_field() }}

    <h2 class="title">Bienvenue sur myfriendser</h2>



    <div class="row">
        <div class="form-group{{ old('tab') != 'register' && $errors->has('email') ? ' has-error' : '' }} col-md-12">
            <label for="email" class="control-label"> Address E-Mail</label>



            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="{{ old('email') }}" required>

            </div>
            @if (old('tab') != 'register' && $errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group{{ old('tab') != 'register' && $errors->has('password') ? ' has-error' : '' }} col-md-12">
            <label for="password" class="control-label">Mot de passe</label>

            <div  class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                <input id="password" type="password" placeholder="*********" class="form-control" name="password" required>


            </div>
            @if (old('tab') != 'register' && $errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group col-md-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox2" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="checkbox2">
                    Souviens-toi de moi
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-login">
                   Connexion
                </button>

                <div class="clearfix"></div>

                 <a class="btn btn-warning btn-xs" href="{{ route('password.request') }}">
                                   Mot de passe oublié ?
                                </a> 
            </div>
        </div>


      {{--   <div class="clearfix"></div>

        <div class="sub-title hidden">
            <hr />
            <span> OU </span>
        </div>


        <div class="form-group hidden">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-facebook">
                    <i class="fa fa-facebook-square"></i> Connecter avec Facebook
                </button>
            </div>
        </div>

 --}}

    </div>
</form>
    </div>
    </div>
    <div class="col-md-6">
    <div class="col-md-6">
        <form class="register" role="form" method="POST" action="{{ route('register') }}">
    <input type="hidden" value="register" name="tab" />
    {{ csrf_field() }}

    <h2>Connecter vous à des millions de personnes!</h2>

    <div class="row">
        <div class="form-group{{ old('tab') == 'register' && $errors->has('name') ? ' has-error' : '' }} col-md-12">
            <label for="name" class="control-label">Nom</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>

                    <input id="name" type="text" placeholder="John Doe" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                </div>

                @if (old('tab') == 'register' && $errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ old('tab') == 'register' && $errors->has('email') ? ' has-error' : '' }} col-md-12">
            <label for="email" class="control-label">Address E-Mail </label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>

                    <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="{{ old('email') }}" required>

                </div>
                @if (old('tab') == 'register' && $errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>


        </div>

        <div class="form-group{{ old('tab') == 'register' && $errors->has('username') ? ' has-error' : '' }} col-md-12">
            <label for="username" class="control-label">Pseudo</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i> </span>

                    <input id="username" type="text" class="form-control" placeholder="example" name="username" value="{{ old('username') }}" required>

                </div>
                @if (old('tab') == 'register' && $errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>


        </div>

        <div class="form-group{{ old('tab') == 'register' && $errors->has('password') ? ' has-error' : '' }} col-md-12">
            <label for="password" class="control-label">Mot de passe</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="password" type="password" placeholder="********" class="form-control" name="password" required>

                </div>
                @if (old('tab') == 'register' && $errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group  col-md-12">
            <label for="password-confirm" class="control-label">Confirmez le mot de passe</label>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                    <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
             <label for="password-confirm" class="control-label">
               En cliquant sur s'inscrire vous accepter les <a href="{{route('terms')}}" class="link"> termes et conditions </a> de MyFriendser 
               </label>
                <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-register">
                    S'inscrire
                </button>
            </div>
        </div>
    </div>
</form>
    </div>
    </div>
</div>
</div>
@stop