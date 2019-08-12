<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>FormaLab | Se connecter</title>
        <meta name="description" content="" />
        <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

        <!-- WEB FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="/adm/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <!-- THEME CSS -->
        <link href="/adm/assets/css/essentials.css" rel="stylesheet" type="text/css" />
        <link href="/adm/assets/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/adm/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

    </head>
    <!--
        .boxed = boxed version
    -->
    <body>


        <div class="padding-15">

                    

            <div class="login-box">

                <div align="center">
                    <!-- Logo -->
                        <a align="center" href="/">
                            <img src="/assets/images/logo_dark.png" style="height: 70px; margin-bottom: 20px" alt="" />
                        </a>
                </div>

                <!-- login form -->
                <form role="form" method="POST" action="{{ route('formateur.login.submit') }}" class="sky-form boxed validate">
                {{ csrf_field() }}
                    <header><i class="fa fa-users"></i> Se connecter</header>

                    <!--
                    <div class="alert alert-danger noborder text-center weight-400 nomargin noradius">
                        Invalid Email or Password!
                    </div>

                    <div class="alert alert-warning noborder text-center weight-400 nomargin noradius">
                        Account Inactive!
                    </div>

                    <div class="alert alert-default noborder text-center weight-400 nomargin noradius">
                        <strong>Too many failures!</strong> <br />
                        Please wait: <span class="inlineCountdown" data-seconds="180"></span>
                    </div>
                    -->

                    <fieldset>  
                    
                        <section>
                            <label class="label">E-mail</label>
                            <label class="input">
                                <i class="icon-append fa fa-envelope"></i>
                                <input id="email" type="email" class="form-control required" name="email" value="{{ old('email') }}" required>
                                <span class="tooltip tooltip-top-right">Votre Address mail</span>
                            </label>
                        </section>
                        
                        <section>
                            <label class="label">Mot de Passe</label>
                            <label class="input">
                                <i class="icon-append fa fa-lock"></i>
                                <input id="password" type="password" class="form-control required" name="password" required>
                                <b class="tooltip tooltip-top-right">insérez votre mot de passe</b>
                            </label>
                            <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} checked><i></i>Se rappeler de moi</label>
                        </section>

                    </fieldset>

                    <footer>
                        <button type="submit" class="btn btn-primary pull-right">Se connecter</button>
                        <div class="forgot-password pull-left">
                        <br>
                            <a href="{{ url('/password/reset') }}">Mot de passe oublié?</a>
                        </div>
                    </footer>
                </form>
                <!-- /login form -->

                <hr />

                 <a align="center" href="/">< Accueil</a>

            </div>

        </div>

        <!-- JAVASCRIPT FILES -->
        <script type="text/javascript">var plugin_path = '/adm/assets/plugins/';</script>
        <script type="text/javascript" src="/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/assets/js/app.js"></script>
    </body>
</html>
