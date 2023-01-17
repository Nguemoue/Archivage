<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('logo-admin.jpg') }}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">Utilisateur<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>Voir le profil</a>
                        <a href="#!"><i class="ti-settings"></i>Parametre</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>rechercher un fichier</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li @class(["active"=>Route::is('home')])>
                <a href="{{ route('home') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <ul class="pcoded-item pcoded-left-item">
            <li  @class(["pcoded-hasmenu","active"=>Route::is('sdda.*')])>
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b></b></span>
                    <span class="pcoded-mtext">DGPAT</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                
                <ul class="pcoded-submenu">
                    <li @class(["active"=>Route::is('sdda.index')])>
                        <a href="{{ route('sdda.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">SDDA</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li class=" ">
                        <a href="{{ route('sdda.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">...</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    
                </ul>
            </li>
        </ul>
        {{-- box pour les fichiers --}}
        {{-- <div class="pcoded-navigation-label">Fichier</div>

        <ul class="pcoded-item pcoded-left-item">
            <li  @class(["pcoded-hasmenu","active"=>Route::is('fichiers.*')])>
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>add</b></span>
                    <span class="pcoded-mtext">Gestion de fichier</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('fichiers.create') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Lister les Fichier</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('scan.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Scanner</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li @class(["active"=>Route::is('fichiers.create')])>
                        <a href="{{ route('fichiers.create') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Ajouter un fichier</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    
                </ul>
            </li>
        </ul> --}}
        <div class="pcoded-navigation-label">Typages</div>
        <ul class="pcoded-item pcoded-left-item">
            <li  @class(["pcoded-hasmenu","active"=>Route::is('type.*') || Route::is("soustype.*")])>
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i><b>add</b></span>
                    <span class="pcoded-mtext">Gestion </span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li @class(["active"=>Route::is('type.*')])>
                        <a href="{{ route('type.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"> types</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li @class(["active"=>Route::is('soustype.*')])>
                        <a href="{{ route('soustype.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"> sous types</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Dossiers</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="form-elements-component.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">courant</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Autres</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="bs-basic-table.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                    <span class="pcoded-mtext">Local</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Organisation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="chart-morris.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                    <span class="pcoded-mtext">Locale</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-map-alt"></i><b>M</b></span>
                    <span class="pcoded-mtext">Hisotrique</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Pages</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                    <span class="pcoded-mtext">Pages</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Imprimer les rapports</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="auth-sign-up.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">COmpte rendu</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
