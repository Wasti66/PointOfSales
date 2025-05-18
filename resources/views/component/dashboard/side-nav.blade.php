<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link text-white d-flex align-items-center poppins-medium fw-normal" href="{{ url('/dashboard') }}">
            <i class="fa-solid fa-house me-2"></i>
            <span class="mt-1">Dashboard</span>
        </a>                           
    </li>
    <li class="nav-item">
        <a class="nav-link text-white d-flex align-items-center poppins-medium fw-normal" href="{{ url('/userProfile') }}">
            <i class="fa-regular fa-user me-2"></i>
            <span class="mt-1">User Profile</span>
        </a>                           
    </li>
    <li class="nav-item">
        <a class="nav-link text-white d-flex align-items-center poppins-medium fw-normal" href="{{ url('/setting') }}">
            <i class="fa-solid fa-gear me-2"></i>
            <span>Setting</span>
        </a>                           
    </li>
    <li class="nav-item">
        <a class="nav-link text-white d-flex align-items-center poppins-medium fw-normal" href="{{ url('/logOut') }}">
            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
            <span>LogOut</span>
        </a>                           
    </li>
</ul>