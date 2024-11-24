<?php

/** Açıklamalar:

    main_admin_path: admin dosyasının ana yolu. Bundna sonra dosyalar ayrışıyor. Ama bu yol değişirse diuye değişken olarak ayarlandı
    view: o url geldiğinde hangi konuma gideceğini göstewriyor. null ise ilk post aktif mi diye kontrol eidlir. aktif değilse 404 olur. aktif ise post_values deki redirect'e bakılır. O da null ya da yoksa 404'e düşer.
    en alttakiler: üstün alt url dir. örneğin admin/blog listeleme sayfası, admin/bloge/create blog oluşturma sayfası gibi

    auth: bunun için giriş yapmak gerekiyor mu diye kontrol eder. 0 ise giriş yapıp yapmadığı önemli değil, 1 ise giriş yapmış olmalı, -1 ise giriş YAPMAMIŞ olmalı. Varsayılan 1 dir. Alt alta sub domain varsa. Her zaman en alttaki auth varsayılır. Üstekiler kaile alınmaz.
    auth_view: Giriş yapma ya da yapmama kuralına uymazsa gideceği ekrandır.

    get: get'in kabul edilip edilmeyeceğidir. Varsayılan 1 dir.

    post: Post işlemleri, null ise post kabul edilmiyor demektir.

    ajax: ajax'ın kabul edilip edilmeyeceğidir. Varsayılan 0 dır.
    ajax_values: ajax geldiğinde gideceği sayfa yapılacak işlemler vs...

    authorization: Yetki kontrolü. 0: Herhangi bir yetkiye gerek yok. 1: Sadece superUser girebilir, 2: Auth yetkisine göre girebilir.

 */
$main_admin_path = 'admin.';
$main_admin_route = 'admin_page';
return [
    'using_values' => ['view', 'type', 'title', 'auth', 'post', 'datas', 'required', 'error', 'success', 'with', 'data', 'message', 'redirect', 'sidebar', 'show'],

    'menu' => [
        'Menu' => ['title' => 'Menu'],
        'Product' => ['title' => 'Producs'],
        'Data' => ['title' => 'Datas'],
        'Settings' => ['title' => 'Settings'],
        'Management' => ['title' => 'Management'],
    ],

    'admin' =>  [
        'auth' => 1,
        'authorization' => 0,

        'title' => 'Home',

        'sidebar' => ['title' => 'Home', 'icon' => 'mdi mdi-view-dashboard',  'group' => 'Menu'], //admin kısmı zorunlu olarak gösteirldiğinden sidebar->show yoktur.

        'view' => [
            'type' => '\Admin\AdminController@showPage',
            'page' => $main_admin_path . 'index'
        ],

        'login' => [
            'auth' => -1,
            'authorization' => 0,

            'title' => 'Log In',

            'sidebar' => ['show' => false],

            'view'  => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'login',
            ],

            'post' => [
                'type'  => '\Admin\AdminController@login',

                'redirect' => [
                    'success' => [
                        'route' => $main_admin_route,
                        'values' => [],
                        'with' => [
                            'type' => 'success',
                            'message' => 'Successfully logged in',
                        ],
                    ],
                    'error' => [
                        'route' => $main_admin_route,
                        'values' => ['params' => 'login'],
                        'with' => [
                            'type' => 'error',
                            'message' => 'Username or password is incorrect',
                        ],
                    ],
                ]
            ],
        ],

        'logout' => [
            'auth' => 1,
            'authorization' => 0,

            'title' => 'Log Out',

            'sidebar' => ['show' => false],

            'view'  => [
                'type' => '\Admin\AdminController@logout',
                'page' => $main_admin_path . 'login',
            ],

        ],

        'product' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Producs',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarProducs',
                'show' => true,
                'title' => 'Producs',
                'group' => 'Product',
                'icon' => 'mdi mdi-cube-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.product.list'
            ],

            'post' =>   [
                'type' => '\Admin\ProductController@getData', //Ajax
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\ProductController@delete',
                    'page' => $main_admin_path . 'data.product.list',
                    'redirect' => [
                        'params' => 'product',
                    ]
                ],
            ],

            'edit' => [

                'title' => 'Product Create / Edit',

                'view' => [
                    'type' => '\Admin\ProductController@editPage',
                    'page' => $main_admin_path . 'data.product.edit',
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\ProductController@edit',
                    'redirect' => [
                        'params' => 'product',
                    ],
                ]
            ],


        ],

        //TODO
        'order' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Orders',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarOrders',
                'show' => true,
                'title' => 'Orders',
                'group' => 'Product',
                'icon' => 'mdi mdi-shopping',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.product.list'
            ],

            'post' =>   [
                'type' => '\Admin\ProductController@getData', //Ajax
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\ProductController@delete',
                    'page' => $main_admin_path . 'data.product.list',
                    'redirect' => [
                        'params' => 'product',
                    ]
                ],
            ],

            'edit' => [

                'title' => 'Product Create / Edit',

                'view' => [
                    'type' => '\Admin\ProductController@editPage',
                    'page' => $main_admin_path . 'data.product.edit',
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\ProductController@edit',
                    'redirect' => [
                        'params' => 'order',
                    ],
                ]
            ]

        ],

        //TODO
        'contact' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Contact',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarContact',
                'show' => true,
                'title' => 'Contact',
                'group' => 'Menu',
                'icon' => 'mdi mdi-account-box-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'contact.list'
            ],

            'post' =>   [
                'type' => '\Admin\AdminController@getData', //Ajax
                'datas' => [
                    'page_count' => [
                        'required' => true,
                        'data' => [],
                        'error' => [
                            'message' => '',
                        ]
                    ],
                    'items' => [
                        'required' => true,
                        'db' => []
                    ]
                ],

            ],

        ],

        'blog' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Blog',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarBlog',
                'show' => true,
                'title' => 'Blog',
                'group' => 'Data',
                'icon' => 'mdi mdi-note-outline',
            ],

            'view' => [
                'type' => '\Admin\PageController@listPage',
                'page' => $main_admin_path . 'data.page.list',
                'pageType' => 1,
            ],

            'post' =>   [
                'type' => '\Admin\PageController@getData', //Ajax
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\PageController@delete',
                    'page' => $main_admin_path . 'data.page.list',
                    'redirect' => [
                        'params' => 'blog',
                    ]
                ],
            ],

            'edit' => [
                'title' => 'Blog Create / Edit',
                'view' => [
                    'type' => '\Admin\PageController@editPage',
                    'page' => $main_admin_path . 'data.blog.edit',
                    'pageType' => 1,
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\PageController@edit',
                    'redirect' => [
                        'params' => 'blog',
                    ],
                ]
            ]

        ],

        'supplier' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Suppliers',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarSuppliers',
                'show' => true,
                'title' => 'Suppliers',
                'group' => 'Data',
                'icon' => 'mdi mdi-truck-fast',
            ],

            'view' => [
                'type' => '\Admin\PageController@listPage',
                'page' => $main_admin_path . 'data.page.list',
                'pageType' => 3,
            ],

            'post' =>   [
                'type' => '\Admin\PageController@getData', //Ajax
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\PageController@delete',
                    'page' => $main_admin_path . 'data.page.list',
                    'redirect' => [
                        'params' => 'supplier',
                    ]
                ],
            ],

            'edit' => [
                'title' => 'Supplier Create / Edit',
                'view' => [
                    'type' => '\Admin\PageController@editPage',
                    'page' => $main_admin_path . 'data.supplier.edit',
                    'pageType' => 3
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\PageController@edit',
                    'redirect' => [
                        'params' => 'supplier',
                    ],
                ]
            ]

        ],

        'page' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Pages',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarPages',
                'show' => true,
                'title' => 'Pages',
                'group' => 'Data',
                'icon' => 'mdi mdi-file-document-outline',
            ],

            'view' => [
                'type' => '\Admin\PageController@listPage',
                'page' => $main_admin_path . 'data.page.list',
                'pageType' => 2,
            ],

            'post' =>   [
                'type' => '\Admin\PageController@getData', //Ajax
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\PageController@delete',
                    'page' => $main_admin_path . 'data.page.list',
                    'redirect' => [
                        'params' => 'page',
                    ]
                ],
            ],

            'edit' => [
                'title' => 'Page Create / Edit',
                'view' => [
                    'type' => '\Admin\PageController@editPage',
                    'page' => $main_admin_path . 'data.page.edit',
                    'pageType' => 2,
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\PageController@edit',
                    'redirect' => [
                        'params' => 'page',
                    ],
                ]
            ]

        ],

        'category' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Categories',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarCategories',
                'show' => true,
                'title' => 'Categories',
                'group' => 'Data',
                'icon' => 'mdi mdi-folder-outline',
            ],

            'view' => [
                'type' => '\Admin\KeyValueController@editPage',
                'page' => $main_admin_path . 'data.category.category',
                'key' => ['categories', 'category_types'],
            ],

            'post' => [
                'type' => '\Admin\KeyValueController@edit',
                'redirect' => [
                    'params' => 'category',
                ]
            ],

            'delete' => [
                'view' => [
                    'type' => '\Admin\KeyValueController@delete',
                    'page' => $main_admin_path . 'data.category.category',
                    'key' => ['categories', 'category_types'],
                    'redirect' => [
                        'params' => 'category',
                    ]
                ],
            ],

        ],

        //TODO
        'other' => [
            'sidebar' => [
                'type' => 'multi',
                'id' => 'sidebarDataOther',
                'show_this' => false,
                'show' => true,
                'title' => 'Other',
                'group' => 'Data',
                'icon' => 'mdi mdi-dots-horizontal',
            ],

            'cargoCompanies' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Cargo Companies',

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDataOther',
                    'id' => 'sidebarCargoCompanies',
                    'show' => true,
                    'title' => 'Cargo Companies',
                    'group' => 'Data',
                    'icon' => '',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'data.other.cargo',
                    'key' => ['cargo_companies'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'other/cargoCompanies',
                    ]
                ],

                'delete' => [
                    'view' => [
                        'type' => '\Admin\KeyValueController@delete',
                        'page' => $main_admin_path . 'data.other.cargo',
                        'key' => ['cargo_companies'],
                        'redirect' => [
                            'params' => 'other/cargoCompanies',
                        ]
                    ],
                ],

            ],

            'iban' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'IBAN Informaitons',

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDataOther',
                    'id' => 'sidebarIBANInformaiton',
                    'show' => true,
                    'title' => 'IBAN Informaitons',
                    'group' => 'Data',
                    'icon' => '',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'data.other.iban',
                    'key' => ['iban_informations'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'other/iban',
                    ]
                ],

                'delete' => [
                    'view' => [
                        'type' => '\Admin\KeyValueController@delete',
                        'page' => $main_admin_path . 'data.other.iban',
                        'key' => ['iban_informations'],
                        'redirect' => [
                            'params' => 'other/iban',
                        ]
                    ],
                ],

            ],
            /*
            //TODO
            'customer' => [
                'auth' => 1,

                'title' => 'Customer References',

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDataOther',
                    'id' => 'sidebarCustomerReferences',
                    'show' => true,
                    'title' => 'Customer References',
                    'group' => 'Data',
                    'icon' => '',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'data.customer'
                ],

                'post' =>   [
                    'type' => '\Admin\AdminController@getData', //Ajax
                    'datas' => [
                        'page_count' => [
                            'required' => true,
                            'data' => [],
                            'error' => [
                                'message' => '',
                            ]
                        ],
                        'items' => [
                            'required' => true,
                            'db' => []
                        ]
                    ],

                ],

            ],
            */
        ],

        //TODO
        'member' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Members',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarMember',
                'show' => true,
                'title' => 'Members',
                'group' => 'Management',
                'icon' => 'mdi mdi-account-group',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'member.list'
            ],

            'post' =>   [
                'type' => '\Admin\AdminController@getData', //Ajax
                'datas' => [
                    'page_count' => [
                        'required' => true,
                        'data' => [],
                        'error' => [
                            'message' => '',
                        ]
                    ],
                    'items' => [
                        'required' => true,
                        'db' => []
                    ]
                ],

            ],

            'edit' => [

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'member.edit',
                    'datas' => [
                        'value' => [
                            'required' => false,
                            'data' => [
                                'required' => false,
                                'model' => 'App\Models\Main\AdminUser',
                                'returnValues' => ['item'],
                                'where' => ['id' => 'REQUEST["id"]'],
                                'create' => false
                            ],

                            'success' => [
                                'title' => '',
                            ],

                            'error' => [
                                'title' => '',
                            ],
                        ]
                    ],
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\AdminController@edit',
                    'datas' => [
                        'item' => [
                            'required' => false,
                            'db' => [],
                            'success' => [
                                'with' => [
                                    'type' => 'success',
                                    'message' => 'User updated successfully',
                                ],
                            ],
                            'error' => [
                                'with' => [
                                    'type' => 'success',
                                    'message' => 'User added successfully'
                                ],
                            ]
                        ]
                    ],

                    'redirect' => [
                        'success' => [
                            'route' => $main_admin_route,
                            'values' => ['params' => 'user'],
                        ],
                        'error' => [
                            'route' => $main_admin_route,
                            'values' => ['params' => 'user'],
                            'with' => [
                                'type' => 'error',
                                'message' => 'User added successfully'
                            ],
                        ],
                    ],
                ]
            ]

        ],

        'settings' => [
            'auth' => 1,

            //TODO
            'keyValue' => [
                'auth' => 1,
                'authorization' => 1,

                'title' => 'Users',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarkeyValue',
                    'show' => true,
                    'title' => 'Key Value',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-outline',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.keyvalue.list'
                ],

                'post' =>   [
                    'type' => '\Admin\KeyValueController@getData', //Ajax
                    'key' => '',
                ],

                'edit' => [

                    'sidebar' => ['show' => false],

                    'view' => [
                        'type' => '\Admin\KeyValueController@editPage',
                        'page' => $main_admin_path . 'setting.keyvalue.edit',
                        'key' => [],
                    ],

                    'post' => [
                        'type' => '\Admin\KeyValueController@edit',
                    ]
                ]

            ],

            'background' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Backgrounds',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarBackground',
                    'show' => true,
                    'title' => 'Backgrounds',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-image',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.background',
                    'key' => ['backgroudSettings', 'backgrouds'],
                ],

                'delete' => [
                    'view' => [
                        'type' => '\Admin\KeyValueController@delete',
                        'page' => $main_admin_path . 'setting.background',
                        'key' => ['backgroudSettings', 'backgrouds'],
                        'redirect' => [
                            'params' => 'settings/background',
                        ]
                    ],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/background',
                    ]
                ]
            ],

            'description' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Descriptions',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarDescription',
                    'show' => true,
                    'title' => 'Descriptions',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-comment-text',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.description',
                    'key' => ['site_title', 'site_description'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/description',
                    ]
                ]
            ],

            'faq' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'FAQ',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarFAQ',
                    'show' => true,
                    'title' => 'FAQ',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-help-circle',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.faq',
                    'key' => ['faq_questions'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/faq',
                    ]
                ],

                'delete' => [
                    'view' => [
                        'type' => '\Admin\KeyValueController@delete',
                        'page' => $main_admin_path . 'setting.faq',
                        'key' => ['faq_questions'],
                        'redirect' => [
                            'params' => 'settings/faq',
                        ]
                    ],
                ],
            ],

            'logo' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Logos',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarLogos',
                    'show' => true,
                    'title' => 'Logos',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-briefcase',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.logo',
                    'key' => ['logos'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/logo',
                    ]
                ]
            ],

            //TODO
            'menu' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Menus',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarMenus',
                    'show' => false,
                    'title' => 'Menus',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-menu',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.menu',
                    'key' => ['menus'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                ]
            ],

            'meta' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Meta Tags',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarMeta',
                    'show' => true,
                    'title' => 'Meta Tags',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-tag',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.meta',
                    'key' => ['meta'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/meta',
                    ]
                ],

                'delete' => [
                    'view' => [
                        'type' => '\Admin\KeyValueController@delete',
                        'page' => $main_admin_path . 'setting.meta',
                        'key' => ['meta'],
                        'redirect' => [
                            'params' => 'settings/meta',
                        ]
                    ],
                ],

                'admin' => [
                    'auth' => 1,
                    'authorization' => 1,

                    'title' => 'Admin Meta Tags',

                    'sidebar' => [
                        'type' => 'single',
                        'id' => 'sidebarAdminMeta',
                        'show' => true,
                        'title' => 'Admin Meta Tags',
                        'group' => 'Settings',
                        'icon' => 'mdi mdi-tag-text-outline',
                    ],

                    'view' => [
                        'type' => '\Admin\KeyValueController@editPage',
                        'page' => $main_admin_path . 'setting.admin_meta',
                        'key' => ['admin_meta'],
                    ],

                    'post' => [
                        'type' => '\Admin\KeyValueController@edit',
                        'redirect' => [
                            'params' => 'settings/meta/admin',
                        ]
                    ],

                    'delete' => [
                        'view' => [
                            'type' => '\Admin\KeyValueController@delete',
                            'page' => $main_admin_path . 'setting.admin_meta',
                            'key' => ['admin_meta'],
                            'redirect' => [
                                'params' => 'settings/meta/admin',
                            ]
                        ],
                    ],
                ]
            ],

            'paymentMethods' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Payment Methods',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarPaymentMethods',
                    'show' => true,
                    'title' => 'Payment Methods',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-credit-card',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.payment_methods',
                    'key' => ['payment_methods'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/paymentMethods',
                    ]
                ]
            ],

            'socialMedia' => [
                'auth' => 1,
                'authorization' => 2,

                'title' => 'Social Media Links',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarSocialMedia',
                    'show' => true,
                    'title' => 'Social Media Links',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-share',
                ],

                'view' => [
                    'type' => '\Admin\KeyValueController@editPage',
                    'page' => $main_admin_path . 'setting.social_media',
                    'key' => ['social_media'],
                ],

                'post' => [
                    'type' => '\Admin\KeyValueController@edit',
                    'redirect' => [
                        'params' => 'settings/socialMedia',
                    ]
                ]
            ],
        ],

        //TODO
        'user' => [
            'auth' => 1,
            'authorization' => 2,

            'title' => 'Users',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarUser',
                'show' => true,
                'title' => 'Users',
                'group' => 'Management',
                'icon' => 'mdi mdi-account',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'user.list'
            ],

            'post' =>   [
                'type' => '\Admin\AdminController@getData', //Ajax
                'datas' => [
                    'page_count' => [
                        'required' => true,
                        'data' => [],
                        'error' => [
                            'message' => '',
                        ]
                    ],
                    'items' => [
                        'required' => true,
                        'db' => []
                    ]
                ],

            ],

            'edit' => [

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'user.edit',
                    'datas' => [
                        'value' => [
                            'required' => false,
                            'data' => [
                                'required' => false,
                                'model' => 'App\Models\Main\AdminUser',
                                'returnValues' => ['item'],
                                'where' => ['id' => 'REQUEST["id"]'],
                                'create' => false
                            ],

                            'success' => [
                                'title' => '',
                            ],

                            'error' => [
                                'title' => '',
                            ],
                        ]
                    ],
                ],

                'sidebar' => ['show' => false,],

                'post' => [
                    'type' => '\Admin\AdminController@edit',
                    'datas' => [
                        'item' => [
                            'required' => false,
                            'db' => [],
                            'success' => [
                                'with' => [
                                    'type' => 'success',
                                    'message' => 'User updated successfully',
                                ],
                            ],
                            'error' => [
                                'with' => [
                                    'type' => 'success',
                                    'message' => 'User added successfully'
                                ],
                            ]
                        ]
                    ],

                    'redirect' => [
                        'success' => [
                            'route' => $main_admin_route,
                            'values' => ['params' => 'user'],
                        ],
                        'error' => [
                            'route' => $main_admin_route,
                            'values' => ['params' => 'user'],
                            'with' => [
                                'type' => 'error',
                                'message' => 'User added successfully'
                            ],
                        ],
                    ],
                ]
            ]

        ],
    ],
];
