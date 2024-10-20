<?php

/** Açıklamalar:

    main_admin_path: admin dosyasının ana yolu. Bundna sonra dosyalar ayrışıyor. Ama bu yol değişirse diuye değişken olarak ayarlandı
    view: o url geldiğinde hangi konuma gideceğini göstewriyor. null ise ilk post aktif mi diye kontrol eidlir. aktif değilse 404 olur. aktif ise post_values deki redirect'e bakılır. O da null ya da yoksa 404'e düşer.
    en alttakiler: üstün alt url dir. örneğin admin/blog listeleme sayfası, admin/bloge/create blog oluşturma sayfası gibi

    auth: bunun için giriş yapmak gerekiyor mu diye kontrol eder. 0 ise giriş yapıp yapmadığı önemli değil, 1 ise giriş yapmış olmalı, -1 ise giriş YAPMAMIŞ olmalı. Varsayılan 1 dir. Alt alta sub domain varsa. Her zaman en alttaki auth varsayılır. Üstekiler kaile alınmaz.
    auth_view: Giriş yapma ya da yapmama kuralına uymazsa gideceği ekrandır.

    get: get'in kabul edilip edilmeyeceğidir. Varsayılan 1 dir.

    post: postun kabul edilip edilmeyeceğidir. Varsayılan 0 dır.
    post_values: post geldiğinde gideceği sayfa, yapılacak işlemler vs...

    ajax: ajax'ın kabul edilip edilmeyeceğidir. Varsayılan 0 dır.
    ajax_values: ajax geldiğinde gideceği sayfa yapılacak işlemler vs...

 */
$main_admin_path = 'admin.';
return [
    'admin' =>  [
        'view' => ['type' => 'index', 'page' => $main_admin_path . 'index'],
        'auth' => 1,

        'login' => [
            'view'  => [
                'type' => 'login',
                'page' => $main_admin_path . 'login',
            ],

            'auth' => -1,
        ],


        'deneme' => [
            'view'  => [
                'type' => 'list',
                'page' => $main_admin_path . 'deneme',
            ],
            'kol' => [
                'view'  => [
                    'type' => 'list',
                    'page' => $main_admin_path . 'deneme',
                ],
                'admil' => [
                    'view'  => [
                        'type' => 'list',
                        'page' => $main_admin_path . 'deneme',
                    ],

                    'dam' => [
                        'view'  => [
                            'type' => 'list',
                            'page' => $main_admin_path . 'deneme',
                        ],
                        'auth' => 0,

                    ],
                ],

            ],
        ],

    ],
];
