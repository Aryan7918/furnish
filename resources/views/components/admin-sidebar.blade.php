<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach ($menus as $menu)
            @if (empty($menu['submenu']))
                <!-- Single Level Menu Item -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($menu['route']) }}">
                        <i class="mdi {{ $menu['icon'] }} menu-icon"></i>
                        <span class="menu-title">{{ $menu['title'] }}</span>
                    </a>
                </li>
            @else
                <!-- Dropdown Menu Item -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#{{ Str::slug($menu['title']) }}"
                        aria-expanded="false" aria-controls="{{ Str::slug($menu['title']) }}">
                        <i class="mdi {{ $menu['icon'] }} menu-icon"></i>
                        <span class="menu-title">{{ $menu['title'] }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="{{ Str::slug($menu['title']) }}">
                        <ul class="nav flex-column sub-menu">
                            @foreach ($menu['submenu'] as $submenu)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route($submenu['route']) }}">{{ $submenu['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
