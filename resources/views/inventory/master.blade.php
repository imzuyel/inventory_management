<!DOCTYPE html>
<html>

    @include('inventory.include.head')

    <body class="theme-orange">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-otheme-orange">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        @guest
        @else
        <!-- Top Bar -->
        @include('inventory.include.top_bar')
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            @include('inventory.include.left_sidebar')
            <!-- #END# Left Sidebar -->

        </section>
        @endguest
        @yield('content')
        @include('inventory.include.js')

    </body>

</html>
