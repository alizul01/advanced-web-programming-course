<div class="flex flex-col justify-between items-start py-4 w-full ">
    <ul class="flex flex-col w-full items-start justify-start gap-4">
        <li class="nav-link @if(request()->is('admin') ? 'text-red-600' : '') active-link @endif">
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-link @if(request()->is('admin/user*') ? 'text-red-600' : '') active-link @endif">
            <a href="{{ route('admin.user') }}">
                User
            </a>
        </li>
        <li class="nav-link @if(request()->is('admin/products*') ? 'text-red-600' : '') active-link @endif">
            <a href="{{ route('admin.products') }}">
                Products
            </a>
        </li>
        <li class="nav-link @if(request()->is('admin/program*') ? 'text-red-600' : '') active-link @endif">
            <a href="{{ route('admin.program') }}">
                Program
            </a>
        </li>
        <li class="nav-link @if(request()->is('admin/news*') ? 'text-red-600' : '') active-link @endif">
            <a href="{{ route('admin.news') }}">
                News
            </a>
        </li>
    </ul>
    <div class="border-t border-gray-200 dark:border-gray-700 w-full items-start justify-start flex flex-col gap-4 pt-2 mt-2">
        <a href="{{route('home')}}" class="nav-link">
            Back
        </a>
    </div>
</div>

