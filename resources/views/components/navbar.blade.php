<div class="flex flex-row gap-10">
    @auth
        <a href="/" class="nav-link {{ request()->is('/') ? 'text-red-600' : '' }}"> Home </a>
        <a href="/products" class="nav-link {{ request()->is('products*') ? 'text-red-600' : '' }}"> Products </a>
        <a href="/news" class="nav-link {{ request()->is('news*') ? 'text-red-600' : '' }}"> News </a>
        <a href="/programs" class="nav-link {{ request()->is('programs*') ? 'text-red-600' : '' }}"> Programs </a>
        <a href="/about" class="nav-link {{ request()->is('about*') ? 'text-red-600' : '' }}"> About Us </a>
        <a href="/contact" class="nav-link {{ request()->is('contact*') ? 'text-red-600' : '' }}"> Contact </a>
    @else
        <a href="/login" class="nav-link {{ request()->is('login') ? 'text-red-600' : '' }}"> Login </a>
        <a href="/register" class="nav-link {{ request()->is('register') ? 'text-red-600' : '' }}"> Register </a>
    @endauth
</div>
