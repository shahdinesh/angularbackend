<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap">
                            <div class="pad-btm">
                                <img class="img-circle img-sm img-border" src="{{ asset('backend/img/profile-photos/1.png')}}" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <p class="mnp-name">Dinesh Shah</p>
                                <span class="mnp-desc">dinesh.shah@gmail.com</span>
                            </a>
                        </div>
                    </div>
                    <ul id="mainnav-menu" class="list-group">
			            <li class="list-header">Navigation</li>
                        {{ (new \App\Helpers\Sidebar)->plotSidebar() }}
					</ul>
                </div>
            </div>
        </div>
    </div>
</nav>
