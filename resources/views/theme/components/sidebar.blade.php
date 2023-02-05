<style>
    .light{
        color: #fff;
    }
</style>
<div class="vertical-menu" style="background-color: #5f27cd;" >

    <div data-simplebar class="h-100 text-light">

        <div class="navbar-brand-box">
            <a class="logo">
                <i class="mdi mdi-album"></i>
                <span class="text-light">
                    Simata
                </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            {{-- <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Admin</li> --}}

            @if (Auth::user()->role == 'admin')
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-light">Menu Admin</li>
                    <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span class="light" >Dashboard</span></a></li>
                    <li><a href="{{ url('/admin/mahasiswa') }}" class=" waves-effect"><i class="fas fa-user-graduate"></i><span class="light" >Mahasiswa</span></a></li>
                    <li><a href="{{ url('/admin/dosen') }}" class=" waves-effect"><i class="fas fa-user-tie"></i><span class="light" >Dosen</span></a></li>
                    <li><a href="{{ url('/admin/users') }}" class=" waves-effect"><i class="fas fa-users"></i><span class="light" >Users</span></a></li>
                </ul>
            @elseif(Auth::user()->role == 'dosen')
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title text-light">Menu Dosen</li>
                    <li><a href="{{ url('/dosen/dashboard') }}" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span class="light" >Dashboard</span></a></li>
                    <li><a href="{{ url('/dosen/tugas-akhir') }}" class="waves-effect"><i class="fas fa-file-code"></i><span class="light" >Tugas Akhir</span></a></li>
                    <li><a href="{{ url('/dosen/file-manager') }}" class="waves-effect"><i class="fas fa-folder-open"></i><span class="light" >File Manager</span></a></li>
                </ul>
            @endif

            <ul class="metismenu list-unstyled mt-3 text-center w-100" style="bottom: 10px; position:absolute " id="side-menu">
                <hr style="background-color: #273c75" >
            <li>
                <form action="{{ url('/logout') }}" method="post">
                @csrf
                    <button type="submit" class="btn waves-effect text-light" style="width: 95%;background-color:#222f3e"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></button>
                </form>
            </li>
            <ul>

            {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-diamond-stone"></i><span>UI Elements</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-spinners.html">Spinners</a></li>
                        <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                    </ul>
                </li> --}}

        </div>
        <!-- Sidebar -->
    </div>
</div>
