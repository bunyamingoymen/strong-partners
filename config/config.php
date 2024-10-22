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

                'sidebar' => [
                    'type' => 'multi_alt',
                    'top_id' => 'sidebarUser',
                    'show' => false,
                    'title' => 'User Create',
                    'group' => 'Management',
                    'icon' => '',
                ],

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
                ],
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
                ],
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
