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

 */
$main_admin_path = 'admin.';
$main_admin_route = 'admin_page';
return [
    'using_values' => ['view', 'type', 'page', 'title', 'auth', 'post', 'datas', 'required', 'error', 'success', 'with', 'data', 'message', 'redirect', 'sidebar', 'show'],

    'menu' => [
        'Menu' => ['title' => 'Menu'],
        'Data' => ['title' => 'Datas'],
        'Settings' => ['title' => 'Settings'],
        'Management' => ['title' => 'Management'],
    ],

    'admin' =>  [
        'auth' => 1,

        'title' => 'Home',

        'sidebar' => ['title' => 'Home', 'icon' => 'mdi mdi-view-dashboard',  'group' => 'Menu'], //admin kısmı zorunlu olarak gösteirldiğinden sidebar->show yoktur.

        'view' => [
            'type' => '\Admin\AdminController@showPage',
            'page' => $main_admin_path . 'index'
        ],

        'login' => [
            'auth' => -1,

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

        'contact' => [
            'auth' => 1,

            'title' => 'Contact',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarContact',
                'show' => true,
                'title' => 'Contact',
                'group' => 'Menu',
                'icon' => 'mdi mdi-account-multiple-outline',
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

            'title' => 'Blog',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarBlog',
                'show' => true,
                'title' => 'Blog',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.blog.list'
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
                    'page' => $main_admin_path . 'data.blog.edit',
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

        'category' => [
            'auth' => 1,

            'title' => 'Categories',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarCategories',
                'show' => true,
                'title' => 'Categories',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.category.list'
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
                    'page' => $main_admin_path . 'data.category.edit',
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

        'page' => [
            'auth' => 1,

            'title' => 'Pages',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarPages',
                'show' => true,
                'title' => 'Pages',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.page.list'
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
                    'page' => $main_admin_path . 'data.page.edit',
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

        'product' => [
            'auth' => 1,

            'title' => 'Producs',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarProducs',
                'show' => true,
                'title' => 'Producs',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.product.list'
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
                    'page' => $main_admin_path . 'data.product.edit',
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

        'supplier' => [
            'auth' => 1,

            'title' => 'Suppliers',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarSuppliers',
                'show' => true,
                'title' => 'Suppliers',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'data.supplier.list'
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
                    'page' => $main_admin_path . 'data.supplier.edit',
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

        'other' => [
            'sidebar' => [
                'type' => 'multi',
                'id' => 'sidebarDataOther',
                'show_this' => false,
                'show' => true,
                'title' => 'Other',
                'group' => 'Data',
                'icon' => 'mdi mdi-account-multiple-outline',
            ],

            'cargoCompanies' => [
                'auth' => 1,

                'title' => 'Cargo Companies',

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDataOther',
                    'id' => 'sidebarCargoCompanies',
                    'show' => true,
                    'title' => 'Cargo Companies',
                    'group' => 'Data',
                    'icon' => 'mdi mdi-account-multiple-outline',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'data.cargo.list'
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
                        'page' => $main_admin_path . 'data.cargo.edit',
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

            'iban' => [
                'auth' => 1,

                'title' => 'IBAN Informaitons',

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDataOther',
                    'id' => 'sidebarIBANInformaiton',
                    'show' => true,
                    'title' => 'IBAN Informaitons',
                    'group' => 'Data',
                    'icon' => 'mdi mdi-account-multiple-outline',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'data.iban.list'
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
                        'page' => $main_admin_path . 'data.iban.edit',
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
                    'icon' => 'mdi mdi-account-multiple-outline',
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
        ],

        'member' => [
            'auth' => 1,

            'title' => 'Members',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarMember',
                'show' => true,
                'title' => 'Members',
                'group' => 'Management',
                'icon' => 'mdi mdi-account-multiple-outline',
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

            'keyValue' => [
                'auth' => 1,

                'title' => 'Users',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarkeyValue',
                    'show' => true,
                    'title' => 'Key Value',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-account-multiple-outline',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.keyvalue.list'
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
                        'page' => $main_admin_path . 'setting.keyvalue.edit',
                        'datas' => [],
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

            'background' => [
                'auth' => 1,

                'title' => 'Backgrounds',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarBackground',
                    'show' => true,
                    'title' => 'Backgrounds',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.background',
                    'datas' => [],
                ],
            ],

            'description' => [
                'auth' => 1,

                'title' => 'Descriptions',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarDescription',
                    'show' => true,
                    'title' => 'Descriptions',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.description',
                    'datas' => [],
                ],
            ],

            'faq' => [
                'auth' => 1,

                'title' => 'FAQ',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarFAQ',
                    'show' => true,
                    'title' => 'FAQ',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.faq',
                    'datas' => [],
                ],
            ],

            'logo' => [
                'auth' => 1,

                'title' => 'Logos',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarLogos',
                    'show' => true,
                    'title' => 'Logos',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.logo',
                    'datas' => [],
                ],
            ],

            'menu' => [
                'auth' => 1,

                'title' => 'Menus',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarMenus',
                    'show' => true,
                    'title' => 'Menus',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.menu',
                    'datas' => [],
                ],
            ],

            'meta' => [
                'auth' => 1,

                'title' => 'Meta Tags',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarMeta',
                    'show' => true,
                    'title' => 'Meta Tags',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.meta',
                    'datas' => [],
                ],

                'admin' => [
                    'auth' => 1,

                    'title' => 'Admin Meta Tags',

                    'sidebar' => [
                        'type' => 'single',
                        'id' => 'sidebarAdminMeta',
                        'show' => true,
                        'title' => 'Admin Meta Tags',
                        'group' => 'Settings',
                        'icon' => 'mdi mdi-key-star',
                    ],

                    'view' => [
                        'type' => '\Admin\AdminController@showPage',
                        'page' => $main_admin_path . 'setting.meta',
                        'datas' => [],
                    ],
                ]
            ],

            'paymentMethods' => [
                'auth' => 1,

                'title' => 'Menus',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarPaymentMethods',
                    'show' => true,
                    'title' => 'Payment Methods',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'setting.payment_methods',
                    'datas' => [],
                ],
            ],

            'socialMedia' => [
                'auth' => 1,

                'title' => 'Menus',

                'sidebar' => [
                    'type' => 'single',
                    'id' => 'sidebarSocialMedia',
                    'show' => true,
                    'title' => 'Social Media Links',
                    'group' => 'Settings',
                    'icon' => 'mdi mdi-key-star',
                ],

                'view' => [
                    'type' => '\Admin\AdminController@social_media',
                    'page' => $main_admin_path . 'setting.menu',
                    'datas' => [],
                ],
            ],
        ],

        'user' => [
            'auth' => 1,

            'title' => 'Users',

            'sidebar' => [
                'type' => 'single',
                'id' => 'sidebarUser',
                'show' => true,
                'title' => 'Users',
                'group' => 'Management',
                'icon' => 'mdi mdi-account-multiple-outline',
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

        'deneme' => [

            'sidebar' => [
                'type' => 'multi',
                'id' => 'sidebarDeneme',
                'show' => true,
                'title' => 'Users',
                'group' => 'Management',
                'icon' => 'fas fa-user',
            ],

            'view'  => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'deneme',
            ],

            'kol' => [
                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarDeneme',
                    'show' => true,
                    'title' => 'User Create',
                    'group' => 'Management',
                    'icon' => '',
                ],

                'view'  => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'deneme',
                ],

                'admil' => [

                    'sidebar' => [
                        'type' => 'multi_alt',
                        'top_id' => 'sidebarDeneme',
                        'show' => true,
                        'title' => 'User Create',
                        'group' => 'Management',
                        'icon' => '',
                    ],

                    'view'  => [
                        'type' => '\Admin\AdminController@showPage',
                        'page' => $main_admin_path . 'deneme',
                    ],


                    'dam' => [
                        'auth' => 0,

                        'sidebar' => [
                            'type' => 'multi_alt',
                            'top_id' => 'sidebarDeneme',
                            'show' => true,
                            'title' => 'User Create',
                            'group' => 'Management',
                            'icon' => '',
                        ],

                        'view'  => [
                            'type' => '\Admin\AdminController@showPage',
                            'page' => $main_admin_path . 'deneme',
                        ],

                    ],
                ],

            ],
        ],
    ],
];
