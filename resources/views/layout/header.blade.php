<header id="navbar">
    <div id="navbar-container" class="boxed">
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <img src="{{ asset('backend/img/logo.png')}}" alt="Global Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text">Global</span>
                </div>
            </a>
        </div>
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="ion-navicon"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links pull-right">
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right">
                            <img class="img-circle img-user media-object" src="{{ asset('backend/img/profile-photos/1.png')}}" alt="Profile Picture">
                        </span>
                        <div class="username hidden-xs">Dinesh Shah</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right panel-default dropdown-menu-md">
                        <ul class="head-list">
                            <li>
                                <a href="#">
                                    <i class="demo-pli-male icon-lg icon-fw"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge badge-danger pull-right">9</span>
                                    <i class="demo-pli-mail icon-lg icon-fw"></i> Messages
                                </a>
                            </li>
                        </ul>
                        <div class="pad-all text-right">
                            <a href="pages-login.html" class="btn btn-primary btn-block">
                                <i class="demo-pli-unlock"></i> Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>