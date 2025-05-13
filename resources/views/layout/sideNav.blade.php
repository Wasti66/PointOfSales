@include('component.dashboard.head')
    <!-- lodar -->
    @include('component.loder.loder')
    
    
    <div class="align-items-stretch d-flex w-100">
            
        <!-- dashboard logo and sidebar -->
        <aside class="bg-dark transition-all-35 js-sidebar" id="sidebar">
            <!-- contant for sidebar -->
            <div class="h-100 px-2 py-4">
                <!-- dashboard logo -->
                <div>
                    <h3 class="text-white">Logo</h3>
                </div>
                <!-- side nav link -->
                @include('component.dashboard.side-nav')   
            </div>
        </aside>

        <!-- header -->
        <div class="min-vh-100 w-100 d-flex flex-column overflow-hidden bg-body-secondary transition-all-35">
            <!-- top nav -->
            @include('component.dashboard.top-nav')
            <!-- main contant -->
            <main class="px-3 py-2 content">
                @yield('contant')
            </main>

        </div>

    </div>

    @include('component.dashboard.footer')