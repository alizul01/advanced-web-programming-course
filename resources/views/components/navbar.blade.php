<div class="flex flex-row gap-10">
    <a href="/" class="nav-link {{ request()->is('/') ? 'text-red-600' : '' }}"> Home </a>
    <a href="/products" class="nav-link {{ request()->is('products*') ? 'text-red-600' : '' }}"> Products </a>
    <a href="/news" class="nav-link {{ request()->is('news*') ? 'text-red-600' : '' }}"> News </a>
    <a href="/program" class="nav-link {{ request()->is('program*') ? 'text-red-600' : '' }}"> Program </a>
    <a href="/about" class="nav-link {{ request()->is('about*') ? 'text-red-600' : '' }}"> About Us </a>
    <a href="/contact" class="nav-link {{ request()->is('contact*') ? 'text-red-600' : '' }}"> Contact </a>
    @if(Auth::user()->role == 'admin')
        <a href="/admin" class="nav-link {{ request()->is('admin*') ? 'text-red-600' : '' }}"> Admin </a>
    @endif
</div>
