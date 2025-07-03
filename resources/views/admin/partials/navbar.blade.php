<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>

        </ul>

        <ul class="navbar-nav ms-auto">

            {{-- <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                </a>
            </li> --}}

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link d-flex justify-content-center align-items-center gap-1  dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <div class="avatar" style="
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background-color: #007bff;
                      color: white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: bold;
                ">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>


                    <span class="d-none d-md-inline">{{ Auth::user()->name }} </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow" style="width: 280px;">
                    <!-- User Header Section -->
                    <li class="user-header bg-primary p-3 text-center">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-circle mb-2"
                                style="width: 70px; height: 70px; background-color: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <span class="text-white fs-4 fw-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1))
                                    }}</span>
                            </div>
                            <h5 class="mb-1 text-white">{{ Auth::user()->name }}</h5>
                        </div>
                    </li>

                    <!-- Footer Section -->
                    <li class="user-footer d-flex justify-content-between p-3 bg-light">
                        <a href="{{route('profile.index')}}" class="btn btn-default btn-flat btn-sm px-3">
                            <i class="fas fa-user me-1"></i> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-default btn-flat btn-sm px-3">
                                <i class="fas fa-sign-out-alt me-1"></i> Sign out
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
