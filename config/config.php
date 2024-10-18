<?php

/** Açıklamalar:

    main_admin_path: admin dosyasının ana yolu. Bundna sonra dosyalar ayrışıyor. Ama bu yol değişirse diuye değişken olarak ayarlandı
    view: o url geldiğinde hangi konuma gideceğini göstewriyor. null ise ilk post aktif mi diye kontrol eidlir. aktif değilse 404 olur. aktif ise post_values deki redirect'e bakılır. O da null ya da yoksa 404'e düşer.
    en alttakiler: üstün alt url dir. örneğin admin/blog listeleme sayfası, admin/bloge/create blog oluşturma sayfası gibi

    auth: bunun için giriş yapmak gerekiyor mu diye kontrol eder. 0 ise giriş yapıp yapmadığı önemli değil, 1 ise giriş yapmış olmalı, -1 ise giriş YAPMAMIŞ olmalı. Varsayılan 1 dir. Alt alta sub domain varsa. Her zaman en üstteki auth varsayılır. Alttakiler kaile alınmaz.
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
        'deneme' => [
            'view'  => [
                'type' => 'list',
                'page' => $main_admin_path . 'deneme',
            ],
        ],

        'index' => [
            'view'  => [
                'type' => 'list',
                'page' => $main_admin_path . 'index',
            ],
        ],

        'settings' => [
            'view'  => [
                'type' => 'list',
                'page' => $main_admin_path . 'settings',
            ],
            'auth'  =>  -1,
        ],

        'layouts' => [
            'view' => null,
            'auth' => 1,

            'footer' => [
                'view'  => [
                    'type' => 'list',
                    'page' => $main_admin_path . 'layouts.footer',
                ],
            ],

            'header' => [
                'view'  => [
                    'type' => 'list',
                    'page' => $main_admin_path . 'layouts.header',
                ],
            ],

            'main' => [
                'view'  => [
                    'type' => 'list',
                    'page' => $main_admin_path . 'layouts.main',
                ],
            ],

            'sidebar' => [
                'view'  => [
                    'type' => 'list',
                    'page' => $main_admin_path . 'layouts.sidebar',
                ],
            ],
        ],

    ],
];
