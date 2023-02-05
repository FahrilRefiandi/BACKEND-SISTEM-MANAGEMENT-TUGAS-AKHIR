<header id="page-topbar">
    <div class="navbar-header">

        <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item waves-effect"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ Avatar::getAvatar(Auth::user()->avatar,Auth::user()->username) }}" alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->username}}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        <span>Inbox</span>
                        <span>
                            <span class="badge badge-pill badge-info">3</span>
                        </span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        <span>Profile</span>
                        <span>
                            <span class="badge badge-pill badge-warning">1</span>
                        </span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        Settings
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="javascript:void(0)">
                        <span>Lock Account</span>
                    </a>

                    <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between"><span>Log Out</span></button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</header>
