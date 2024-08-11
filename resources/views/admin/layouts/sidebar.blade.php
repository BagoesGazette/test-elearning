<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
            </span>
            <span class="logo-lg">
                <h4 class="mt-4">{{ config('app.name') }}</h4>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="40" class="me-2">
                <span class="text-white" style="font-size: 1.5rem; line-height: 22px;">{{ config('app.name') }}</span>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-sidebar">Dashboard</span>
                    </a>                    
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed 
                        {{ Request::routeIs('category.*', 'sub-category.*', 'course-category.*', 'course.*', 'watch-time.index') ? 'active' : '' }}" 
                        href="#sidebarMasterData" 
                        data-bs-toggle="collapse" 
                        role="button" 
                        aria-expanded="{{ Request::routeIs('category.*', 'sub-category.*', 'course-category.*', 'course.*', 'watch-time.index', 'mentor.index') ? 'true' : '' }}" 
                        aria-controls="sidebarMasterData">
                        <i class="bx bx-cube-alt"></i> 
                        <span data-key="t-sidebar">Master Data</span>
                    </a>
                    <div class="collapse menu-dropdown 
                        {{ Request::routeIs('category.*', 'sub-category.*', 'course-category.*', 'course.*', 'watch-time.index', 'mentor.index') ? 'show' : '' }}" 
                        id="sidebarMasterData">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" 
                                   class="nav-link {{ Request::routeIs('category.*') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Kategori</a>
                                <a href="{{ route('sub-category.index') }}" 
                                   class="nav-link {{ Request::routeIs('sub-category.*') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Sub Kategori</a>
                                <a href="{{ route('course-category.index') }}" 
                                   class="nav-link {{ Request::routeIs('course-category.*') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Kategori Kelas</a>
                                <a href="{{ route('course.index') }}" 
                                   class="nav-link {{ Request::routeIs('course.*') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Kelas</a>
                                <a href="{{ route('watch-time.index') }}" 
                                   class="nav-link {{ Request::routeIs('watch-time.index') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Riwayat Menonton</a>
                                <a href="{{ route('mentor.index') }}" 
                                   class="nav-link {{ Request::routeIs('mentor.index') ? 'active' : '' }}" 
                                   data-key="t-sweet-master">Mentor</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>