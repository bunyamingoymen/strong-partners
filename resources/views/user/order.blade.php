@extends('user.layouts.main')
@section('user_index_body')
    <style>
        .order-product-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: -10px;
            border: 2px solid #fff;
        }

        .order-more-products {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f8f9fa;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-left: 5px;
            border: 2px solid #fff;
        }

        .order-details {
            display: none;
        }

        .order-row {
            cursor: pointer;
        }

        .order-row:hover {
            background-color: #f8f9fa;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Tarih</th>
                                    <th>Müşteri</th>
                                    <th>Ürünler</th>
                                    <th>Toplam</th>
                                    <th>Durum</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Örnek Sipariş 1 -->
                                <tr class="order-row" onclick="toggleOrderDetails(1)">
                                    <td>#SK2540</td>
                                    <td>07 Mart 2024</td>
                                    <td>Ahmet Yılmaz</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/product-1.jpg" class="order-product-image"
                                                alt="">
                                            <img src="assets/images/product-2.jpg" class="order-product-image"
                                                alt="">
                                            <img src="assets/images/product-3.jpg" class="order-product-image"
                                                alt="">
                                            <span class="order-more-products">+2</span>
                                        </div>
                                    </td>
                                    <td>₺1,475</td>
                                    <td><span class="badge badge-success">Tamamlandı</span></td>
                                    <td>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </td>
                                </tr>
                                <tr id="orderDetails1" class="order-details">
                                    <td colspan="7">
                                        <div class="p-3">
                                            <h5>Sipariş Detayları</h5>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <p><strong>Teslimat Adresi:</strong><br>
                                                        Ahmet Yılmaz<br>
                                                        Atatürk Mah. Cumhuriyet Cad.<br>
                                                        No:123 D:4<br>
                                                        İstanbul, Türkiye</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>Ürünler:</strong></p>
                                                    <ul class="list-unstyled">
                                                        <li>1x Ürün Adı 1 - ₺299</li>
                                                        <li>2x Ürün Adı 2 - ₺798</li>
                                                        <li>1x Ürün Adı 3 - ₺378</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Örnek Sipariş 2 -->
                                <tr class="order-row" onclick="toggleOrderDetails(2)">
                                    <td>#SK2541</td>
                                    <td>07 Mart 2024</td>
                                    <td>Mehmet Demir</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/product-2.jpg" class="order-product-image"
                                                alt="">
                                            <img src="assets/images/product-3.jpg" class="order-product-image"
                                                alt="">
                                            <span class="order-more-products">+1</span>
                                        </div>
                                    </td>
                                    <td>₺845</td>
                                    <td><span class="badge badge-warning">İşlemde</span></td>
                                    <td>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </td>
                                </tr>
                                <tr id="orderDetails2" class="order-details">
                                    <td colspan="7">
                                        <div class="p-3">
                                            <h5>Sipariş Detayları</h5>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <p><strong>Teslimat Adresi:</strong><br>
                                                        Mehmet Demir<br>
                                                        Gazi Mah. İstiklal Cad.<br>
                                                        No:45 D:2<br>
                                                        Ankara, Türkiye</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>Ürünler:</strong></p>
                                                    <ul class="list-unstyled">
                                                        <li>1x Ürün Adı 2 - ₺399</li>
                                                        <li>1x Ürün Adı 3 - ₺446</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleOrderDetails(orderId) {
            const detailsRow = document.getElementById('orderDetails' + orderId);
            const currentDisplay = detailsRow.style.display;
            detailsRow.style.display = currentDisplay === 'table-row' ? 'none' : 'table-row';
        }
    </script>
@endsection
