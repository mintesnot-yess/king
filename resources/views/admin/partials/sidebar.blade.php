<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" target="_blank" title="go to main site" class="brand-link">
            <!--begin::Brand Image-->
            <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">King Admin</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news.index') }}"
                        class="nav-link {{ request()->is('admin/news') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>News</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('testimonial.index') }}"
                        class="nav-link {{ request()->is('admin/testimonial') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Clients Testimonial</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link {{ request()->is('admin/slider') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-sliders"></i>
                        <p>Sliders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}"
                        class="nav-link {{ request()->is('admin/brand') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Company Logos</p>
                    </a>
                </li>


                @php
                    $isProductActive = request()->routeIs('product.*') || request()->routeIs('category.*');
                @endphp

                <li class="nav-item has-treeview {{ $isProductActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isProductActive ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}"
                                class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
