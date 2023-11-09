<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--<a href="/" target="_blank" class="brand-link">
        <span class="brand-text font-weight-light">Go to web site</span>
    </a>--}}

    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="aaaaaaaa" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tshirt"></i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.color.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-palette"></i>
                    <p>Colors</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</aside>
