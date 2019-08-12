
            <div id="header" class="sticky clearfix">
                         <!-- Top Bar -->
            <div id="topBar" class="dark">
                <div class="container">

                    <!-- right -->
                    <ul class="top-links list-inline pull-right">
                    <div class="social-icons pull-right hidden-xs">
                      @if(!empty( $reseaux->facebook))
                        <a href="http://{{$reseaux->facebook}}" class="social-icon social-icon-sm social-icon-transparent social-facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        @endif
                        @if(!empty( $reseaux->twitter))
                        <a href="http://{{ $reseaux->twitter}}" class="social-icon social-icon-sm social-icon-transparent social-twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        @endif
                        @if(!empty( $reseaux->googleplus))
                        <a href="http://{{ $reseaux->googleplus}}" class="social-icon social-icon-sm social-icon-transparent social-gplus" data-toggle="tooltip" data-placement="bottom" title="Google Plus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                        @endif
                        @if(!empty( $reseaux->linkedin))
                        <a href="http://{{ $reseaux->linkedin}}" class="social-icon social-icon-sm social-icon-transparent social-linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                        @endif
                    </div>
                    </ul>

                    <!-- left -->
                    <ul class="top-links list-inline">
                        <li><a href="/contact"><i class="fa fa-envelope-o"></i>Contact</a></li>
                        <li>
                            <a  href="/about"><i class="fa fa-institution"></i>Qui sommes-nous</a>
                        </li>
                        <li>
                            @if(Auth::check())
                            Bonjour {{ Auth::user()->name }}
                            @else
                            <a  href="{{route('formateur.dashboard')}}"><i class="fa fa-user hidden-xs"></i>Connexion</a>
                            @endif
                        </li>
                    </ul>

                </div>
            </div>
            <!-- /Top Bar -->

                <!-- SEARCH HEADER -->
                <div class="search-box over-header">
                    <a id="closeSearch" href="#" class="glyphicon glyphicon-remove"></a>
                    {!! Form::open(['method' => 'POST', 'url' => route('postsearch'), 'class' => 'form', 'id' =>'form']) !!}
                        <input type="text" name="search" class="form-control" placeholder="SEARCH" />
                    {!! Form::close() !!}
                </div>
                <!-- /SEARCH HEADER -->

                <!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- connecter -->
						<ul class="pull-right nav nav-pills nav-second-main">


							<li class="search">
                                <a href="javascript:;">
                                    <i class="fa fa-search"></i>
                                </a>
							</li>

						</ul>
						<!-- /connecter -->

						<!-- Logo -->
						<a class="logo pull-left" href="/">
							<img src="/assets/images/logo_dark.png" alt="" />
						</a>

						<!--
							Top Nav

						-->
					<div class="navbar-collapse pull-right nav-main-collapse collapse" >
						<nav class="nav-main">
                        <ul id="topMain" class="nav nav-pills nav-main">
                            <li>
                                <a href="/">
                                    <i class="glyphicon glyphicon-home"
                                    @if (current_page('/'))
                                      style='color: #ff6200; font-size: 1.2em;'
                                    @else
                                      style='color: #1F262D; font-size: 1.2em;'
                                    @endif>

                                    </i>
                                </a>
                            </li>
                            <li >
                                <a href="/formations"
                                @if (current_page('formations'))
                                  style='color: #ff6200'
                                @endif>
                                    Formations
                                </a>

                                <ul class="dropdown-menu">
                                @foreach($categories as $categorie)
                                            <li class="dropdown lowercase">
                                                <a href="{{ route('categorie', $categorie->slug)}}">
                                                    {{$categorie->titre_categorie}}
                                                </a>
                                               <!--
                                                <ul class="dropdown-menu">
                                                    <li><a href="index-corporate-1.html"></a></li>
                                                </ul>
                                                -->
                                            </li>
                                @endforeach
                                </ul>

                            </li>
                            <li>
                                <a href="/formateurs"
                                @if (current_page('formateurs'))
                                  style='color: #ff6200'
                                @endif
                                 >
                                    Formateurs
                                </a>
                            </li>
                            <li >
                                <a href="/blog"
                                @if (current_page('blog'))
                                  style='color: #ff6200'
                                @endif
                                >
                                    Actualités
                                </a>
                            </li>
                            <li >
                                <a href="/calendrier"
                                @if (current_page('calendrier'))
                                  style='color: #ff6200'
                                @endif>
                                    Calendrier
                                </a>
                            </li>
                            <li >
                                <a href="/Pre-inscription"
                                @if (current_page('Pre-inscription'))
                                  style='color: #ff6200'
                                @endif>
                                    Pré-inscription
                                </a>
                            </li>
                        </ul>
                    </nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->
            </div>
