<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>CATAC',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'adminCatac',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        
        [
            'text' => 'Home',
            'icon' => 'nav-icon fas fa-home',
            'url'  => 'home',
            
        ],
        
        ['header' => 'COMUNIDAD'],
        [
            'text' => 'Reseña Historica',
            'icon' => 'nav-icon fas fa-copy',
            'route' => 'admin.resena',
        ],
        [
            'text' => 'Vision y Mision',
            'icon' => 'nav-icon fas fa-list-ul',
            'route' => 'admin.misionvision',
        ],
        [
            'text' => 'Baners',
            'icon' => 'nav-icon fas fa-paper-plane',
            'route'  => 'admin.baners',
        ],
        [
            'text'    => 'Organos de Gobierno',
            'icon'    => 'nav-icon fas fa-sitemap',
            'submenu' => [
                [
                    'text' => 'Organo de Dirección',
                    'icon'    => 'nav-icon fas fa-sitemap',
                    'submenu' => [
                        [
                            'text' => 'Asamblea General',
                            'url'  => 'admin/organos_de_gobierno/direccion/asamblea_general',
                        ],
                    ],
                ],
                [
                    'text' => 'Organo de Administracion',
                    'icon'    => 'nav-icon fas fa-sitemap',
                    'submenu' => [
                        [
                            'text' => 'Directiva Comunal',
                            'url'  => 'admin/organos_de_gobierno/administracion/directiva_comunal',
                        ],
                    ],
                ],
                [
                    'text' => 'Organo de Ejecución',
                    'icon'    => 'nav-icon fas fa-sitemap',
                    'submenu' => [
                        [
                            'text' => 'Gerencia',
                            'url'  => 'admin/organos_de_gobierno/ejecucion/gerencia',
                        ],
                    ],
                ],
                [
                    'text' => 'Organo de Apoyo y Asesoria',
                    'icon'    => 'nav-icon fas fa-sitemap',
                    'submenu' => [
                        [
                            'text' => 'Organos de Apoyo',
                            'url'  => 'admin/organos_de_gobierno/apoyo_asesoria/apoyo',
                        ],
                        [
                            'text' => 'Organos de Asesoria',
                            'url'  => 'admin/organos_de_gobierno/apoyo_asesoria/asesoria',
                        ],
                        [
                            'text' => 'Comités Especializados',
                            'url'  => 'admin/organos_de_gobierno/apoyo_asesoria/comite',
                        ],
                    ],
                ],
                [
                    'text' => 'Organo de Linea',
                    'icon'    => 'nav-icon fas fa-sitemap',
                    'submenu' => [
                        [
                            'text' => 'Actividades Productivas',
                            'url'  => 'admin/organos_de_gobierno/linea/actividades/productiva',
                        ],
                        [
                            'text' => 'Actividades Empresariales',
                            'url'  => 'admin/organos_de_gobierno/linea/actividades/empresarial',
                        ],
                    ],
                ],
                
            ],
        ],  
        /*[
            'text' => 'Directorios',
            'icon' => 'nav-icon fas fa-users',
            'url'  => 'admin/settings',
        ],   */ 
        [
            'text' => 'Convocatoria',
            'icon' => 'nav-icon fas fa-envelope',
            'url'  => 'admin/settings',
        ],        

        ['header' => 'INSTRUMENTOS DE GESTION'],
        [
            'text'       => 'Gestionar Documentos',
            'icon'       => 'nav-icon fas fa-book',
            'icon_color' => 'cyan',
            'url'        => 'admin/instrumento_de_gestion',
        ],
        /*[
            'text'       => 'Reglamento',
            'icon'       => 'nav-icon fas fa-file-alt',
            'url'        => '#',
        ],
        [
            'text'       => 'ROF',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
        [
            'text'       => 'POI',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
        [
            'text'       => 'PREC',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
        [
            'text'       => 'Convenios',
            'icon'       => 'nav-icon fas fa-handshake',
            'url'        => '#',
        ],*/
        ['header' => 'SERVICIOS'],
        [
            'text'    => 'Servicentro',
            'icon'    => 'nav-icon fas fa-route',
            'submenu' => [
                [
                    'text' => 'Gasolinera',
                    'icon' => 'nav-icon fas fa-gas-pump',
                    'url'  => 'gestion/servicios/1',
                ],
                [
                    'text' => 'Minimarket',
                    'icon' => 'nav-icon fas fa-store',
                    'url'  => 'gestion/servicios/2',
                ], 
                [
                    'text' => 'Restaurant',
                    'icon' => 'nav-icon fas fa-utensils',
                    'url'  => 'gestion/servicios/3',
                ],
            ],
        ],
        [
            'text'    => 'Agropecuaria',
            'icon'    => 'nav-icon fas fa-sitemap',
            'submenu' => [
                [
                    'text' => 'Ganaderia',
                    'icon' => 'nav-icon fas fa-horse-head',
                    'url'  => 'gestion/servicios/4',
                ],
                [
                    'text' => 'Agricultura',
                    'icon' => 'nav-icon fas fa-tractor',
                    'url'  => 'gestion/servicios/5',
                ], 
            ],
        ],
        [
            'text' => 'Transporte',
            'icon' => 'nav-icon fas fa-car-side',
            'url'  => 'gestion/servicios/6',
        ],
        [
            'text' => 'Cantera',
            'icon' => 'nav-icon fas fa-snowplow',
            'url'  => 'gestion/servicios/7',
        ],
        [
            'text' => 'Agroveterinaria',
            'icon' => 'nav-icon fas fa-cat',
            'url'  => 'gestion/servicios/8',
        ], 
        [
            'text' => 'Turismo',
            'icon' => 'nav-icon fas fa-mountain',
            'url'  => 'gestion/servicios/9',
        ],
        [
            'text' => 'Forestacion',
            'icon' => 'nav-icon fas fa-tree',
            'url'  => 'gestion/servicios/10',
        ],
        ['header' => 'NOTICIAS Y EVENTOS'],
        [
            'text' => 'Noticias',
            'icon' => 'nav-icon fas fa-newspaper',
            'route'  => 'admin.noticia',
        ],
        [
            'text' => 'Eventos',
            'icon' => 'nav-icon fas fa-calendar-check',
            'route'  => 'admin.evento',
        ], 
        [
            'text' => 'Actividades',
            'icon' => 'nav-icon fas fa-sliders-h',
            'route'  => 'admin.actividad',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
