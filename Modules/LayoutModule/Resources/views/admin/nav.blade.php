<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">

                <a href="{{ route('admin.order.create') }}">
                    <i class="icon-layers"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">New Order</span>
                </a>

                <a href="{{ route('admin.orders') }}">
                    <i class="icon-layers"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">All Orders</span>
                </a>

                <a href="{{ route('admin.products') }}">
                    <i class="icon-layers"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Products</span>
                </a>

                <a href="{{ route('admin.customers') }}">
                    <i class="icon-layers"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Customers</span>
                </a>



            </li>

        </ul>
    </div>
</div>
