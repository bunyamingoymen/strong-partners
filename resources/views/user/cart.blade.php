@extends('user.layouts.main')
@section('user_index_body')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="selectAll"
                                                onclick="toggleAll()">
                                            <label class="custom-control-label" for="selectAll">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Ürün</th>
                                    <th>Ürün Adı</th>
                                    <th>Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input product-checkbox"
                                                id="product1">
                                            <label class="custom-control-label" for="product1">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="assets/images/product-1.jpg" alt="product-img" class="cart-product-img">
                                    </td>
                                    <td>Ürün Adı 1</td>
                                    <td>₺299.00</td>
                                    <td>
                                        <div class="input-group" style="width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" type="button">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>₺299.00</td>
                                    <td>
                                        <a href="javascript:void(0);" class="text-danger"><i
                                                class="mdi mdi-trash-can font-size-18"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input product-checkbox"
                                                id="product2">
                                            <label class="custom-control-label" for="product2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="assets/images/product-2.jpg" alt="product-img" class="cart-product-img">
                                    </td>
                                    <td>Ürün Adı 2</td>
                                    <td>₺399.00</td>
                                    <td>
                                        <div class="input-group" style="width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" type="button">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>₺798.00</td>
                                    <td>
                                        <a href="javascript:void(0);" class="text-danger"><i
                                                class="mdi mdi-trash-can font-size-18"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Sipariş Özeti</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Ara Toplam :</td>
                                    <td>₺1,097.00</td>
                                </tr>
                                <tr>
                                    <td>KDV :</td>
                                    <td>₺197.46</td>
                                </tr>
                                <tr>
                                    <th>Toplam :</th>
                                    <th>₺1,294.46</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary">
                            Seçili Ürünleri Satın Al
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleAll() {
            const mainCheckbox = document.getElementById('selectAll');
            const productCheckboxes = document.getElementsByClassName('product-checkbox');

            Array.from(productCheckboxes).forEach(checkbox => {
                checkbox.checked = mainCheckbox.checked;
            });
        }
    </script>
@endsection
