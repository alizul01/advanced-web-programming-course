<div class="flex flex-col justify-between items-start py-4 w-full ">
    <ul class="flex flex-col w-full items-start justify-start gap-4">
        <li class="nav-link">
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('admin.dashboard') }}">
                User
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('admin.dashboard') }}">
                Products
            </a>
        </li>
        <li class="nav-link">
            <a href="{{ route('admin.dashboard') }}">
                Program
            </a>
        </li>
    </ul>
    <div class="border-t border-gray-200 dark:border-gray-700 w-full items-start justify-start flex flex-col gap-4 pt-2 mt-2">
        <a href="{{route('home')}}" class="nav-link">
            Back
        </a>
    </div>
</div>

