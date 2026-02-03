<aside id="layout-sidebar"
    class="overlay overlay-open:translate-x-0 drawer drawer-start sm:w-75 inset-y-0 start-0 hidden h-full [--auto-close:lg] lg:z-50 lg:block lg:translate-x-0 lg:shadow-none"
    aria-label="Sidebar" tabindex="-1">
    <div class="drawer-body h-full  p-0">
        <div class="flex h-full max-h-full flex-col">
            <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 lg:hidden"
                aria-label="Close" data-overlay="#layout-sidebar">
                <span class="icon-[tabler--x] size-4.5"></span>
            </button>
            <div class="text-base-content flex items-center gap-4 px-4 py-6 m-2 border-b border-base-content/20">
                <div class="avatar">
                    <div class="size-17 rounded-full">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random"
                            alt="avatar" />
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-base-content text-lg font-semibold truncate">{{ auth()->user()->name }}</h3>
                    <p class="text-base-content/80 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="h-full overflow-y-auto">
                <ul class="accordion menu menu-sm gap-1 p-3">
                    <!-- Dashboard Menu Item -->
                    <li>
                        <a href="{{ route('dashboard') }}" @class(['inline-flex w-full items-center px-2', 'menu-active' => request()->routeIs('dashboard')])>
                            <span class="icon-[tabler--dashboard] size-4.5"></span>
                            <span class="grow">Dashboard</span>
                        </a>
                    </li>

                    <!-- Section Divider -->
                    <li
                        class="text-base-content/50 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
                        Pages
                    </li>

                    <!-- User Management Menu -->
                    <li @class(['accordion-item', 'active' => request()->routeIs('users.*')]) id="user-management">
                        <button
                            class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal"
                            aria-controls="user-management-collapse-user-management" aria-expanded="true">
                            <span class="icon-[tabler--users] size-4.5"></span>
                            <span class="grow">User Management</span>
                            <span
                                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                        </button>
                        <div id="user-management-collapse-user-management"
                            class="accordion-content mt-1 hidden w-full overflow-hidden transition-[height] duration-300"
                            aria-labelledby="account-settings" role="region" @if(request()->routeIs('users.*')) style="display: block;" @endif>
                            <ul class="space-y-1">
                                <li>
                                    <a href="{{ route('users.index') }}" @class(['inline-flex w-full items-center px-2', 'menu-active' => request()->routeIs('users.index')])>
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Profile Dropdown for Large Screens - Bottom -->
            <div class="px-4 py-3 mt-auto max-lg:hidden">
                <div class="dropdown dropdown-top relative inline-flex w-full">
                    <button id="sidebar-profile-dropdown" type="button" class="dropdown-toggle btn btn-soft btn-block justify-start" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        <span class="icon-[tabler--user-circle] size-5"></span>
                        <span>Account</span>
                        <span class="icon-[tabler--chevron-up] dropdown-open:rotate-180 ms-auto size-4 transition-transform"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 !max-w-[266px] hidden w-full space-y-0.5" role="menu"
                        aria-orientation="vertical" aria-labelledby="sidebar-profile-dropdown">
                        <li>
                            <a class="dropdown-item px-3" href="{{ route('settings.profile.edit') }}">
                                <span class="icon-[tabler--user] size-5"></span>
                                Edit profile
                            </a>
                        </li>
                        <li class="dropdown-footer p-2 pt-1">
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="btn btn-text btn-error btn-block h-11 justify-start px-3 font-normal">
                                    <span class="icon-[tabler--logout] size-5"></span>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>
