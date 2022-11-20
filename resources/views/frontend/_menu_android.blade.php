<nav id="main-nav">
    <ul class="second-nav">
       <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="{{ route('produks') }}"><i class="fa fa-shopping-cart"></i> Produk</a></li>
       <li>
          <a href="#"><i class="icofont-login mr-2"></i> Login & Register</a>
          <ul>
             <li><a class="dropdown-item" href="{{ URL('/login') }}">Login</a></li>
             <li><a class="dropdown-item" href="{{ URL('/register_user') }}">Register</a></li>
          </ul>
       </li>
    </ul>
</nav>