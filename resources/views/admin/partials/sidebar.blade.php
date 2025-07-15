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

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Content Management -->
                <li class="nav-header text-uppercase text-xs text-muted mt-2">Content Management</li>

                <li class="nav-item">
                    <a href="{{ route('slider.index') }}"
                        class="nav-link {{ request()->is('admin/slider') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-sliders2-vertical"></i>
                        <p>Hero Slider</p>
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
                    <a href="{{ route('gallery.index') }}"
                        class="nav-link {{ request()->is('admin/gallery') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>Gallery</p>

                    </a>
                </li>

                <!-- Services & Team -->
                <li class="nav-header text-uppercase text-xs text-muted mt-2">Services & Team</li>

                <li class="nav-item">
                    <a href="{{ route('service.index') }}"
                        class="nav-link {{ request()->is('admin/service') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear-wide-connected"></i>
                        <p>Services</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('stuff.index') }}"
                        class="nav-link {{ request()->is('admin/stuff') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Our Team</p>
                    </a>
                </li>

                <!-- Clients Section -->
                @php
                    $isClientActive = request()->routeIs('testimonial.*') || request()->routeIs('brand.*');
                @endphp

                <li class="nav-item has-treeview {{ $isClientActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isClientActive ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-gear"></i>
                        <p>
                            Clients
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}"
                                class="nav-link {{ request()->is('admin/testimonial') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-chat-square-quote"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}"
                                class="nav-link {{ request()->is('admin/brand') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-building"></i>
                                <p>Brand Logos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Products Section -->
                @php
                    $isProductActive = request()->routeIs('product.*') || request()->routeIs('category.*');
                @endphp

                <li class="nav-item has-treeview {{ $isProductActive ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isProductActive ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}"
                                class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-box"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-diagram-3"></i>
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
