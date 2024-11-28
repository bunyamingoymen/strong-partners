@extends('user.layouts.main')
@section('user_index_body')
    <style>
        .payment-method-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method-card:hover {
            border-color: #556ee6;
        }

        .payment-method-card.selected {
            border-color: #556ee6;
            background-color: rgba(85, 110, 230, 0.1);
        }

        .address-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .address-card:hover {
            border-color: #556ee6;
        }

        .address-card.selected {
            border-color: #556ee6;
            background-color: rgba(85, 110, 230, 0.1);
        }

        .dropzone {
            border: 2px dashed #556ee6;
            background: #f8f9fa;
            border-radius: 6px;
            cursor: pointer;
            min-height: 150px;
            padding: 20px;
        }
    </style>

    <div class="row">
        <!-- Sol Taraf - Adres ve Ödeme -->
        <div class="col-lg-8">
            <!-- Adres Seçimi -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ lang_db('Delivery Address') }}</h4>
                    <div class="row">
                        @foreach ($addresses as $address)
                            <div class="col-md-6 mb-3">
                                <div class="card address-card selected">
                                    <div class="card-body">
                                        <div class="custom-control custom-radio mb-2">
                                            <input type="radio" id="address{{ $address->code }}" name="address"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="address{{ $address->code }}">
                                                <h5 class="font-size-14 mb-1">{{ $address->address_name }}</h5>
                                            </label>
                                        </div>
                                        <p class="text-muted mb-0">
                                            {{ $address->address }}<br>
                                            {{ $address->county }} / {{ $address->city }}<br>
                                            {{ $address->post_code }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Ödeme Yöntemi -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ lang_db('Payment Method', 2) }}</h4>

                    @foreach ($payment_methods as $item => $method)
                        @if ($method->value = 'Money Order')
                            <!-- Havale/EFT -->
                            <div class="card payment-method-card mb-3 {{ $item == 0 ? 'selected' : '' }}">
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="bankTransfer" name="paymentMethod"
                                            class="custom-control-input" {{ $item == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="bankTransfer">
                                            <i class="mdi mdi-bank-outline mr-2"></i>
                                            {{ lang_db('Money Order', 2) }}
                                        </label>
                                    </div>
                                    <div class="mt-4 d-none" id="bankTransferForm">
                                        @foreach ($iban_informations as $iban)
                                            <div class="alert alert-info">
                                                <h5 class="alert-heading">Banka Hesap Bilgileri</h5>
                                                <p class="mb-0">
                                                    {{ lang_db('Bank', 2) }}: {{ $iban->optional_1 }}<br>
                                                    {{ lang_db('Account owner', 2) }}: {{ $iban->optional_2 }}<br>
                                                    {{ lang_db('IBAN', 2) }}: {{ $iban->value }}
                                                </p>
                                            </div>
                                        @endforeach

                                        <div class="mt-4">
                                            <label>{{ lang_db('Upload Receipt', 2) }}</label>
                                            <div class="col-lg-12 row mt-3">
                                                <div>
                                                    <input type="file" class="custom-file-input" id="productDoc"
                                                        name="receipt">
                                                    <label class="custom-file-label" for="productDoc">
                                                        {{ lang_db('Choose files...', 2) }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($method->value = 'Credit Cart')
                            <!-- Kredi Kartı -->
                            <div class="card payment-method-card mb-3 {{ $item == 0 ? 'selected' : '' }}">
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="creditCard" name="paymentMethod"
                                            class="custom-control-input" {{ $item == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="creditCard">
                                            <i class="mdi mdi-credit-card-outline mr-2"></i>
                                            {{ lang_db('Credit Cart', 2) }}
                                        </label>
                                    </div>
                                    <div class="mt-4" id="creditCardForm">
                                        <div class="form-group">
                                            <label>{{ lang_db('Name', 2) }}</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ lang_db('Cart Number', 2) }}</label>
                                            <input type="text" class="form-control" placeholder="**** **** **** ****">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ lang_db('Expiration date', 2) }}</label>
                                                    <input type="text" class="form-control" placeholder="MM/YY">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ lang_db('CVV', 2) }}</label>
                                                    <input type="text" class="form-control" placeholder="***">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sağ Taraf - Sipariş Özeti -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sipariş Özeti</h4>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <tbody>
                                <tr>
                                    <td>Ara Toplam</td>
                                    <td class="text-right">1.250,00 TL</td>
                                </tr>
                                <tr>
                                    <td>KDV (%18)</td>
                                    <td class="text-right">225,00 TL</td>
                                </tr>
                                <tr>
                                    <td>Kargo</td>
                                    <td class="text-right">Ücretsiz</td>
                                </tr>
                                <tr class="bg-light">
                                    <th>Toplam</th>
                                    <th class="text-right">1.475,00 TL</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <button type="button" class="btn btn-primary btn-block" onclick="submitOrder()">
                            Siparişi Tamamla
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ route('assetFile', ['folder' => 'admin/libs/jquery', 'filename' => 'jquery.min.js']) }}"></script>

    <script>
        $(document).ready(function() {
            // Adres seçimi
            $('.address-card').click(function() {
                $('.address-card').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
            });

            // Ödeme yöntemi seçimi
            $('.payment-method-card').click(function() {
                $('.payment-method-card').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);

                // Form gösterme/gizleme
                $('#creditCardForm').addClass('d-none');
                $('#bankTransferForm').addClass('d-none');

                if ($(this).find('#creditCard').is(':checked')) {
                    $('#creditCardForm').removeClass('d-none');
                } else if ($(this).find('#bankTransfer').is(':checked')) {
                    $('#bankTransferForm').removeClass('d-none');
                }
            });

            // Dekont yükleme için Dropzone
            Dropzone.autoDiscover = false;
            new Dropzone("#receiptUpload", {
                url: "/upload-receipt",
                maxFiles: 1,
                acceptedFiles: "image/*,.pdf",
                maxFilesize: 5,
                dictDefaultMessage: "Dekont yüklemek için tıklayın veya sürükleyin"
            });
        });

        // Sipariş tamamlama
        function submitOrder() {
            // Sipariş tamamlama işlemleri
            alert('Siparişiniz başarıyla tamamlandı!');
        }
    </script>
@endsection
