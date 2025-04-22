<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-card-list"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.categories.list') }}">
                        <i class="bi bi-circle"></i><span>List Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="bi bi-circle"></i><span>Create Category</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Categories Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#attributes-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Attributes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="attributes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.attributes.list') }}">
                        <i class="bi bi-circle"></i><span>List Attribute</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.attributes.create') }}">
                        <i class="bi bi-circle"></i><span>Create Attribute</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Attributes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#properties-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="properties-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.properties.list') }}">
                        <i class="bi bi-circle"></i><span>List property</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.properties.create') }}">
                        <i class="bi bi-circle"></i><span>Create property</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Properties Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.products.list') }}">
                        <i class="bi bi-circle"></i><span>List Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.create') }}">
                        <i class="bi bi-circle"></i><span>Create Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Products Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.orders.list') }}">
                        <i class="bi bi-circle"></i><span>List Orders</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Orders Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#news-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>News</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="news-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>List News</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Create News</span>
                    </a>
                </li>
            </ul>
        </li><!-- End News Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#purchases-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Purchases</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="purchases-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.purchases.list') }}">
                        <i class="bi bi-circle"></i><span>List Purchases</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Purchases Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.app.setting.index') }}">
                <i class="bi bi-gear"></i>
                <span>Setting</span>
            </a>
        </li><!-- End Setting Page Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" target="_blank" href="{{ route('home') }}">
                <i class="bi bi-house-check"></i>
                <span>Trang chủ</span>
            </a>
        </li><!-- End Home Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('auth.logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End Logout Page Nav -->

    </ul>

</aside>
