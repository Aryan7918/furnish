<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminSidebar extends Component
{

    public $menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = [
            [
                'title' => 'Dashboard',
                'icon' => 'mdi mdi-grid-large',
                'route' => 'admin.dashboard',
                'submenu' => [],
            ],
            [
                'title' => 'Brands',
                'icon' => 'mdi mdi-tag',
                'route' => 'admin.brands.index',
                'submenu' => [],
            ],
            [
                'title' => 'Categories',
                'icon' => 'mdi mdi-tag',
                'route' => 'admin.categories.index',
                'submenu' => [],
            ],
            // [
            //     'title' => 'Products',
            //     'icon' => 'mdi mdi-tag',
            //     'route' => 'products.index',
            //     'submenu' => [],
            // ],
            // [
            //     'title' => 'Settings',
            //     'icon' => 'mdi-settings',
            //     'route' => null, // No direct link, it's a dropdown
            //     'submenu' => [
            //         ['title' => 'Site Settings', 'route' => 'admin.site-settings'],
            //         ['title' => 'Profile Settings', 'route' => 'admin.profile-settings'],
            //     ],
            // ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-sidebar');
    }
}
