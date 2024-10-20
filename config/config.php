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
    'admin' =>  [
        'view' => ['type' => '\Admin\AdminController@showPage', 'page' => $main_admin_path . 'index'],
        'auth' => 1,

        'login' => [
            'auth' => -1,
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

            'view' => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'user.list'
            ],

            'post' =>   [
                'type' => '\Admin\AdminController@getData', //Ajax
                'datas' => [
                    'page_count' => [
                        'required' => true,
                        'db' => [],
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
                        'item' => [
                            'required' => false,
                            'db' => [],
                        ]
                    ],
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


        'deneme' => [
            'view'  => [
                'type' => '\Admin\AdminController@showPage',
                'page' => $main_admin_path . 'deneme',
            ],
            'kol' => [
                'view'  => [
                    'type' => '\Admin\AdminController@showPage',
                    'page' => $main_admin_path . 'deneme',
                ],
                'admil' => [
                    'view'  => [
                        'type' => '\Admin\AdminController@showPage',
                        'page' => $main_admin_path . 'deneme',
                    ],

                    'dam' => [
                        'view'  => [
                            'type' => '\Admin\AdminController@showPage',
                            'page' => $main_admin_path . 'deneme',
                        ],
                        'auth' => 0,

                    ],
                ],

            ],
        ],

    ],
];
