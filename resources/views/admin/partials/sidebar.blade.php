<div class="flex flex-col justify-between items-start py-4 w-full ">
    <ul class="flex flex-col w-full items-start justify-start gap-4">
        <li class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active-link @endif">
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-link @if(Route::currentRouteName() == 'admin.user') active-link @endif">
            <a href="{{ route('admin.user') }}">
                User
            </a>
        </li>
        <li class="nav-link @if(Route::currentRouteName() == 'admin.products') active-link @endif">
            <a href="{{ route('admin.products') }}">
                Products
            </a>
        </li>
        <li class="nav-link @if(Route::currentRouteName() == 'admin.program') active-link @endif">
            <a href="{{ route('admin.program') }}">
                Program
            </a>
        </li>
        <li class="nav-link @if(Route::currentRouteName() == 'admin.news') active-link @endif">
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
