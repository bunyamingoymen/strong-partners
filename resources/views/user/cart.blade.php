@extends('user.layouts.main')
@section('user_index_body')
    @php
        $price_without_vat = 0;
        $vat = 0;
        $total_price = 0;
        $cargo_price = 0;
    @endphp
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
                                    <th></th>
                                    <th>{{ lang_db('Product Name', 2) }}</th>
                                    <th>{{ lang_db('Price', 2) }}</th>
                                    <th>{{ lang_db('Piece(s)', 2) }}</th>
                                    <th>{{ lang_db('Total', 2) }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    @php
                                        if ($cart->priceType == 'TRY') {
                                            $priceSymbol = '₺';
                                        } elseif ($cart->priceType == 'EUR') {
                                            $priceSymbol = '€';
                                        } else {
                                            $priceSymbol = '$';
                                        }

                                        $stock =
                                            (int) $cart->product_count > $cart->product_count
                                                ? $cart->product_count
                                                : $cart->product_count;
                                        $price_without_vat += (int) $cart->price_without_vat * $stock;
                                        $vat += ((int) $cart->price - (int) $cart->price_without_vat) * $stock;
                                        $total_price += (int) $cart->price * $stock;
                                        $cargo_price += (int) $cart->cargo_price * $stock;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input product-checkbox"
                                                    id="product1">
                                                <label class="custom-control-label" for="product1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ $cart->image ? asset($cart->image) : '' }}" alt="product-img"
                                                class="cart-product-img">
                                        </td>
                                        <td>{{ $cart->title ?? '' }}</td>
                                        <td>{{ $priceSymbol }} {{ $cart->price ?? '' }}</td>
                                        <td>
                                            <div class="input-group" style="width: 120px;">
                                                <div class="input-group-prepend">
                                                    <a class="btn btn-primary"
                                                        href= '{{ route('user.addCart') }}?product_code={{ $cart->product_code }}&minus=1'>-</a>
                                                </div>
                                                <input type="text" class="form-control text-center"
                                                    value="{{ $cart->product_count > $cart->product_count ? $cart->product_count : $cart->product_count }}">
                                                <div class="input-group-append">
                                                    <a class="btn btn-primary"
                                                        href= '{{ route('user.addCart') }}?product_code={{ $cart->product_code }}'>+</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $priceSymbol }} {{ $cart->price ? (int) $cart->price * $stock : '' }}</td>
                                        <td>
                                            <a href="{{ route('user.addCart') }}?product_code={{ $cart->product_code }}&remove_all=1"
                                                class="text-danger"><i class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{ lang_db('Order Summary', 2) }}</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>{{ lang_db('Price', 2) }} :</td>
                                    <td>{{ $priceSymbol ?? '₺' }} {{ $price_without_vat }}</td>
                                </tr>
                                <tr>
                                    <td>{{ lang_db('VAT', 2) }} :</td>
                                    <td>{{ $priceSymbol ?? '₺' }} {{ $vat }}</td>
                                </tr>
                                <tr>
                                    <td>{{ lang_db('Cargo Price', 2) }}:</td>
                                    <td>{{ $priceSymbol ?? '₺' }} {{ $cargo_price }}</td>
                                </tr>
                                <tr>
                                    <th>{{ lang_db('Total Price', 2) }} :</th>
                                    <th>{{ $priceSymbol ?? '₺' }} {{ $cargo_price + $total_price }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('user.checkout') }}" class="btn btn-primary">
                            {{ lang_db('Complete Order', 2) }}
                        </a>
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
