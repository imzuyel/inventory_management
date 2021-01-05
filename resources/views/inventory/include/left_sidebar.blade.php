<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('/') }}backend/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="material-icons">input</i>Sign Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('base') ">
                <a href="/">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            {{-- Pos --}}
            <li class="@yield('pos') ">
                <a href="{{ route('pos.index') }}">
                    <i class="material-icons">shop_two</i>
                    <span>POS</span>
                </a>
            </li>
            {{--  Category  --}}
            <li class="@yield('category') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">subtitles</i>
                    <span>Category</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('category_add') ">
                        <a href="{{ route('category.create') }}">Add Category</a>
                    </li>
                    <li class="@yield('category_manage') ">
                        <a href="{{ route('category.index') }}">Manage Category</a>
                    </li>

                </ul>
            </li>
            {{--  Brand  --}}
            <li class="@yield('brand') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">games</i>
                    <span>brand</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('brand_add') ">
                        <a href="{{ route('brand.create') }}">Add brand</a>
                    </li>
                    <li class="@yield('brand_manage') ">
                        <a href="{{ route('brand.index') }}">Manage Bandr</a>
                    </li>

                </ul>
            </li>
            {{--  Product  --}}
            <li class="@yield('product') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">store</i>
                    <span>product</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('product_add') ">
                        <a href="{{ route('product.create') }}">Add product</a>
                    </li>
                    <li class="@yield('product_manage') ">
                        <a href="{{ route('product.index') }}">Manage Product</a>
                    </li>

                </ul>
            </li>
            {{-- Employee --}}
            <li class="@yield('employee')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">accessible</i>
                    <span>EMPLOYEE</span>
                </a>
                <ul class="ml-menu text-uppercase">
                    <li class="@yield('employee_add') ">
                        <a href="{{ route('employee.create') }}">Add Employee</a>
                    </li>
                    <li class="@yield('employee_manage') ">
                        <a href="{{ route('employee.index') }}">Manage Employee</a>
                    </li>
                </ul>
            </li>
            {{--  Salary  --}}
            <li class="@yield('salary') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">attach_money</i>
                    <span>salary</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('salary_advance') ">
                        <a href="{{ route('salary.create_advance') }}">Add Advance salary</a>
                    </li>
                    <li class="@yield('salary_manage_advance') ">
                        <a href="{{ route('salary.index_advance') }}">Manage Advance Salary</a>
                    </li>
                    <li class="@yield('salary_add') ">
                        <a href="{{ route('salary.create') }}">Add salary</a>
                    </li>
                    <li class="@yield('salary_manage') ">
                        <a href="{{ route('salary.index') }}">Manage Advance Salary</a>
                    </li>

                </ul>
            </li>
            {{--  Supplier  --}}
            <li class="@yield('supplier') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">account_circle</i>
                    <span>Supplier</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('supplier_add') ">
                        <a href="{{ route('supplier.create') }}">Add Supplier</a>
                    </li>
                    <li class="@yield('supplier_manage') ">
                        <a href="{{ route('supplier.index') }}">Manage Supplier</a>
                    </li>

                </ul>
            </li>
            {{--  Custommer  --}}
            <li class="@yield('custommer') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span>Custommer</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('custommer_add') ">
                        <a href="{{ route('custommer.create') }}">Add customer</a>
                    </li>
                    <li class="@yield('custommer_manage') ">
                        <a href="{{ route('custommer.index') }}">Manage customer</a>
                    </li>

                </ul>
            </li>
            {{--  Order  --}}
            <li class="@yield('order') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">input</i>
                    <span>order</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('order_pendding') ">
                        <a href="{{ route('order.pendding') }}">Pendding order</a>
                    </li>
                    <li class="@yield('order_manage') ">
                        <a href="{{ route('order.index') }}">Manage Order</a>
                    </li>

                </ul>
            </li>

            {{--  Cost  --}}
            <li class="@yield('cost') text-uppercase">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">monetization_on</i>
                    <span>cost</span>
                </a>
                <ul class="ml-menu">

                    <li class="@yield('cost_add') ">
                        <a href="{{ route('cost.create') }}">Add Cost</a>
                    </li>
                    <li class="@yield('cost_manage') ">
                        <a href="{{ route('cost.index') }}">Manage Cost</a>
                    </li>

                </ul>
            </li>


            <li class="header">DESING</li>
            {{--  Setting  --}}
            <li class="@yield('setting') text-uppercase">
                <a href="{{ route('setting.index') }}">
                    <i class="material-icons">settings</i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date('Y') }} <a href="http://zuyelrana.pythonanywhere.com/" target="blank">{{ $setting->company_name }} Design</a>.
        </div>
        <div class="version">
            <p>Email:  {{ $setting->company_email }}</p>
        </div>
    </div>
    <!-- #Footer -->
</aside>
