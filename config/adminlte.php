<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Rating System',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Rating</b> System',

    'logo_mini' => '<b>R</b>Sys',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'purple',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => null,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'text' => 'Home',
            'url'  => '/home',
            'icon' => 'home',
        ],
        [
            'text' => 'Competições',
            'url'  => '/person',
            'icon' => 'calendar-alt',
            'submenu' => [
                [
                    'text' => 'Nova Competição',
                    'icon' => 'plus-circle',
                    // 'url'  => '/person/new',
                ],
                [
                    'text' => 'Listar Competições',
                    'icon' => 'list-ul',
                    // 'url'  => '/person',
                ],
            ],
        ],
        'CADASTROS',
        [
            'text' => 'Pessoa',
            'url'  => '/person',
            'icon' => 'users',
            'submenu' => [
                [
                    'text' => 'Nova Pessoa',
                    'icon' => 'user-plus',
                    'url'  => '/person/new',
                ],
                [
                    'text' => 'Listar Pessoas',
                    'icon' => 'users',
                    'url'  => '/person',
                ],
            ],
        ],
        [
            'text' => 'Tipos de Rating',
            'url'  => '/person',
            'icon' => 'chess',
            'submenu' => [
                [
                    'text' => 'Novo Tipo de Rating',
                    'icon' => 'plus-circle',
                    'url'  => '/ratingtype/new',
                ],
                [
                    'text' => 'Listar Tipos de Rating',
                    'icon' => 'list-ul',
                    'url'  => '/ratingtype',
                ],
            ],
        ],
        [
            'text' => 'Modalidades',
            'url'  => '/person',
            'icon' => 'chess-rook',
            'submenu' => [
                [
                    'text' => 'Nova Modalidade',
                    'icon' => 'plus-circle',
                    'url'  => '/type/new',
                ],
                [
                    'text' => 'Listar Modalidades',
                    'icon' => 'list-ul',
                    'url'  => '/type',
                ],
            ],
        ],
        'CONFIGURAÇÕES',
            [
                'text' => 'Federação',
                'url'  => '/settings/federation',
                'icon' => 'cogs',
                'submenu' => [
                    [
                        'text' => 'Nova Federação   ',
                        'icon' => 'plus-circle',
                        'url'  => '/settings/federation/new',
                    ],
                    [
                        'text' => 'Listar Federações',
                        'icon' => 'list-ul',
                        'url'  => '/settings/federation',
                    ],
                ],
            ],
            [
                'text' => 'Localidade',
                'icon' => 'cogs',
                'submenu' => [
                    [
                        'text' => 'Cidade',
                        'icon' => 'cogs',
                        'url'  => '/settings/city',
                        'submenu' => [
                            [
                                'text' => 'Nova Cidade',
                                'icon' => 'plus-circle',
                                'url'  => '/settings/city/new',
                            ],
                            [
                                'text' => 'Listar Cidades',
                                'icon' => 'list-ul',
                                'url'  => '/settings/city',
                            ],
                        ],
                    ],
                    [
                        'text' => 'Estado',
                        'icon' => 'cogs',
                        'url'  => '/settings/state',
                        'submenu' => [
                            [
                                'text' => 'Novo Estado',
                                'icon' => 'plus-circle',
                                'url'  => '/settings/state/new',
                            ],
                            [
                                'text' => 'Listar Estados',
                                'icon' => 'list-ul',
                                'url'  => '/settings/state',
                            ],
                        ],
                    ],
                    [
                        'text' => 'País',
                        'icon' => 'cogs',
                        'url'  => '/settings/country',
                        'submenu' => [
                            [
                                'text' => 'Novo País',
                                'icon' => 'plus-circle',
                                'url'  => '/settings/country/new',
                            ],
                            [
                                'text' => 'Listar Países',
                                'icon' => 'list-ul',
                                'url'  => '/settings/country',
                            ],
                        ],
                    ],
                ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
