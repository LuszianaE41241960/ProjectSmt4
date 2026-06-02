<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Menu</span>
                </li>

                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- Profile -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="profile.html">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>

                <!-- Riwayat Hidup -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                        <i class="mdi mdi-file-document"></i>
                        <span class="hide-menu">Riwayat Hidup</span>
                    </a>

                    <ul class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ url('pendidikan') }}" class="sidebar-link">
                                <i class="mdi mdi-school"></i>
                                <span class="hide-menu">Pendidikan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ url('pengalaman_kerja') }}" class="sidebar-link">
                                <i class="mdi mdi-briefcase"></i>
                                <span class="hide-menu">Pengalaman Kerja</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                @if (Route::has('logout'))
                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="sidebar-link waves-effect waves-dark"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mdi mdi-logout"></i>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </form>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>