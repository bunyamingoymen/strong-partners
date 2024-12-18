@extends('index.layouts.main')
@section('index_body')
    @php
        $gallery_title = getCachedKeyValue(['key' => 'gallery_title', 'first' => true, 'refreshCache' => true]) ?? null;
        $gallery_description =
            getCachedKeyValue(['key' => 'gallery_description', 'first' => true, 'refreshCache' => true]) ?? null;

        $gallery_type = 'new'; //old da olabilir
    @endphp
    <style>
        /* Car Gallery Styles */
        .car-brand-filter {
            margin-bottom: 40px;
        }

        .btn-filter {
            background: transparent;
            border: 2px solid #eee;
            padding: 8px 20px;
            margin: 0 5px;
            border-radius: 30px;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-filter:hover,
        .btn-filter.active {
            background: #4facfe;
            border-color: #4facfe;
            color: #fff;
        }

        .car-box {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            opacity: 1;
            /* Eklendi */
        }

        .car-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .car-img {
            position: relative;
            overflow: hidden;
        }

        .car-img img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .car-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .car-box:hover .car-overlay {
            opacity: 1;
        }

        .car-overlay-buttons {
            text-align: center;
        }

        .car-overlay-buttons .btn {
            margin: 5px;
            padding: 8px 20px;
            font-size: 13px;
        }

        .car-details {
            padding: 20px;
            text-align: center;
        }

        .car-details h4 {
            margin: 0 0 15px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }

        .car-specs {
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .car-specs span {
            font-size: 13px;
            color: #666;
        }

        .car-specs i {
            margin-right: 5px;
            color: #4facfe;
        }

        .car-price {
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .car-price .price {
            font-size: 20px;
            font-weight: 600;
            color: #4facfe;
        }

        /* Responsive styles */
        @media (max-width: 767px) {
            .car-brand-filter .btn-filter {
                margin: 5px;
                padding: 6px 15px;
                font-size: 12px;
            }

            .car-specs {
                flex-direction: column;
            }

            .car-specs span {
                margin-bottom: 5px;
            }
        }

        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .brand-select {
            padding: 12px 24px;
            font-size: 16px;
            border: 2px solid #eee;
            border-radius: 30px;
            background-color: white;
            color: #333;
            cursor: pointer;
            min-width: 200px;
            outline: none;
            transition: all 0.3s ease;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
            padding-right: 40px;
        }

        .brand-select:hover,
        .brand-select:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 2px rgba(79, 172, 254, 0.1);
        }

        .brand-select option {
            padding: 12px;
        }

        @media (max-width: 767px) {
            .brand-select {
                width: 90%;
                max-width: 300px;
            }
        }
    </style>

    <div class="transition-none">
        <section class="title-hero-bg parallax-effect"
            style="background-image: url({{ asset('defaultFiles/title/title_1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center white-color">
                            <h1 class="raleway-font font-300">{{ lang_db($title, 1) }}</h1>
                            <div class="breadcrumb mt-20">
                                <!-- Breadcrumb Start -->
                                <ul>
                                    <li><a href="{{ route('index.index') }}">{{ lang_db('Home', 1) }}</a></li>
                                    <li>{{ lang_db($title, 1) }}</li>
                                </ul>
                                <!-- Breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <section class="car-gallery white-bg" id="cars">
        <div class="container">
            <div class="row">
                <div class="col-md-8 centerize-col text-center">
                    <div class="section-title">
                        <h2 class="raleway-font">{{ lang_db($gallery_title->value) }}</h2>
                        <p>{{ lang_db($gallery_description->value) }}</p>
                    </div>
                </div>
            </div>
            @if ($gallery_type == 'old')
                <!-- Car Brand Filter -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="car-brand-filter text-center mb-50">
                            <button class="btn btn-filter active" data-brand="all">{{ lang_db('All', 1) }}</button>
                            @foreach ($categories as $category)
                                <button class="btn btn-filter"
                                    data-brand="{{ $category->code }}">{{ lang_db($category->value, -1) }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @elseif ($gallery_type == 'new')
                <!-- Car Brand Filter -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="car-brand-filter text-center mb-50">
                            <div class="filter-container">
                                <select class="brand-select" id="brandFilter">
                                    <option value="all">{{ lang_db('All', 1) }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->code }}">{{ lang_db($category->value, -1) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endif




            <!-- Car Grid -->
            <div class="row car-grid">
                <!-- Mercedes -->
                @foreach ($galleries as $gallery)
                    @php
                        $url = $gallery->short_name ?? 'not-found';
                    @endphp
                    <div class="col-md-4 col-sm-6 car-item" data-brand="{{ $gallery->category }}">
                        <div class="car-box">
                            <div class="car-img">
                                <img src="{{ $gallery->image ? asset($gallery->image) : '' }}"
                                    alt="{{ $gallery->title }}">
                                <div class="car-overlay">
                                    <div class="car-overlay-buttons">
                                        <a href="{{ route('index.blog.detail', ['pageCode' => $url]) }}"
                                            {{ $gallery->open_different_page ? 'target="_blank"' : '' }}
                                            class="btn btn-light-outline btn-sm">{{ lang_db('Details', 1) }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="car-details">
                                <h4>
                                    <a {{ $gallery->open_different_page ? 'target="_blank"' : '' }}
                                        href="{{ route('index.blog.detail', ['pageCode' => $url]) }}">{{ $gallery->title }}</a>

                                </h4>
                                <div class="car-price">
                                    <span class="price">
                                        <a {{ $gallery->open_different_page ? 'target="_blank"' : '' }}
                                            href="{{ route('index.blog.detail', ['pageCode' => $url]) }}">{{ $gallery->sub_title }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @if ($gallery_type == 'old')
        <script>
            // Tüm filtre butonlarını seç
            const filterButtons = document.querySelectorAll('.btn-filter');
            // Tüm araç kartlarını seç
            const carItems = document.querySelectorAll('.car-item');

            // Her filtre butonuna tıklama olayı ekle
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Aktif class'ı tüm butonlardan kaldır
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Tıklanan butona active class'ı ekle
                    button.classList.add('active');

                    // Seçilen markayı al
                    const selectedBrand = button.getAttribute('data-brand');

                    // Her araç kartı için kontrol et
                    carItems.forEach(item => {
                        // Önce fade-out efekti uygula
                        item.style.opacity = '0';
                        item.style.transition = 'opacity 0.3s ease';

                        setTimeout(() => {
                            // Eğer "tüm markalar" seçildiyse veya araç kartının markası seçilen marka ile eşleşiyorsa
                            if (selectedBrand === 'all' || item.getAttribute('data-brand') ===
                                selectedBrand) {
                                item.style.display = 'block'; // Göster
                                // Kısa bir gecikme ile fade-in efekti uygula
                                setTimeout(() => {
                                    item.style.opacity = '1';
                                }, 50);
                            } else {
                                item.style.display = 'none'; // Gizle
                            }
                        }, 300); // Bu süre fade-out efektinin tamamlanmasını bekler
                    });
                });
            });

            // Sayfa yüklendiğinde tüm araçları görünür yap
            window.addEventListener('load', () => {
                carItems.forEach(item => {
                    item.style.opacity = '1';
                    item.style.transition = 'opacity 0.3s ease';
                });
            });
        </script>
    @elseif ($gallery_type == 'new')
        <script>
            // Select elementi ve araç kartlarını seç
            const brandFilter = document.getElementById('brandFilter');
            const carItems = document.querySelectorAll('.car-item');

            // Filtreleme fonksiyonu
            function filterCars(selectedBrand) {
                carItems.forEach(item => {
                    // Önce fade-out efekti uygula
                    item.style.opacity = '0';
                    item.style.transition = 'opacity 0.3s ease';

                    setTimeout(() => {
                        // Eğer "tüm markalar" seçildiyse veya araç kartının markası seçilen marka ile eşleşiyorsa
                        if (selectedBrand === 'all' || item.getAttribute('data-brand') === selectedBrand) {
                            item.style.display = 'block'; // Göster
                            // Kısa bir gecikme ile fade-in efekti uygula
                            setTimeout(() => {
                                item.style.opacity = '1';
                            }, 50);
                        } else {
                            item.style.display = 'none'; // Gizle
                        }
                    }, 300); // Bu süre fade-out efektinin tamamlanmasını bekler
                });
            }

            // Select elementine change event listener ekle
            brandFilter.addEventListener('change', (event) => {
                const selectedBrand = event.target.value;
                filterCars(selectedBrand);
            });

            // Sayfa yüklendiğinde tüm araçları görünür yap
            window.addEventListener('load', () => {
                carItems.forEach(item => {
                    item.style.opacity = '1';
                    item.style.transition = 'opacity 0.3s ease';
                });
            });
        </script>
    @endif
@endsection
