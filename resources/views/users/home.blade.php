<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/users.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('home') ? 'active' : '' }}" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('benefit') ? 'active' : '' }}" href="#">Benefit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('paket') ? 'active' : '' }}" href="#">Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('kelas') ? 'active' : '' }}" href="#">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->routeIs('kontak-kami') ? 'active' : '' }}" href="#">Kontak Kami</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-ajukan-demo" href="#">Ajukan Demo</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-masuk" href="{{ route('login') }}">Masuk</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Tingkatkan Performa Bisnis Anda</h1>
            <p>Semua solusi untuk mempermudah Training dan Upskilling karyawan di perusahaan Anda</p>
            <a href="#" class="btn">Ajukan Demo</a>
        </div>
    </section>

    <section class="trusted-section">
      <div class="container-fluid">
          <h2>Telah Dipercaya oleh 10.000+ Profesional User dari</h2>
          <div class="row justify-content-center logos">
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-1.svg') }}" alt="IEG">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-2.svg') }}" alt="IEP">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-3.svg') }}" alt="SCTV">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-4.svg') }}" alt="Emtek">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-5.svg') }}" alt="SiCepat">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-6.svg') }}" alt="CloudHost">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-7.svg') }}" alt="ADirect">
              </div>
              <div class="col-auto">
                  <img src="{{ asset('assets/images/svg/image-8.svg') }}" alt="Volta">
              </div>
          </div>
      </div>
    </section>

    <div class="container py-5">
      <div class="text-center mb-4">
          <h2>Bagaimana Kelas Center Membantu Anda?</h2>
          <p>Kami menghadirkan platform pembelajaran yang komprehensif untuk memberdayakan karyawan Anda. Tingkatkan produktivitas dan efisiensi tim dengan Kelas Center.</p>
      </div>

      <ul class="nav nav-pills justify-content-center" id="first-pills-tab" role="tablist">
        @foreach ($category as $key => $item)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="first-pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#first-pills-{{ $key }}" type="button" role="tab" aria-controls="first-pills-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ $item->name }}
                </button>
            </li>
        @endforeach
      </ul>       
    
      <div class="tab-content" id="first-pills-tabContent">
          @foreach ($category as $key => $item)
              <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="first-pills-{{ $key }}" role="tabpanel" aria-labelledby="first-pills-{{ $key }}-tab">
                  <div class="content-section">
                      <div class="row">
                          <div class="col-6">
                              <h3>{{ $item->title }}</h3>
                              <p>
                                {!! $item->description !!}
                              </p>
      
                              @foreach ($item->subCategory as $row)
                                  <p class="section-paragraf d-flex align-items-start">
                                      <span class="ms-2 fw-bold">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#479F76" class="bi bi-check2" viewBox="0 0 16 16">
                                              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"
                                                    stroke="#479F76" stroke-width="0.5" fill="#479F76"/>
                                          </svg>
                                          {{ $row->title }}
                                      </span>
                                      <p>{{ $row->description }}</p>
                                  </p>
                              @endforeach
      
                          </div>
                          <div class="col-6">
                            <img src="{{ $item->image ? asset($item->image) : asset('assets/images/image-no-available.jpg') }}" class="img-fluid" alt="{{ $item->name }}">
                        </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>

      <div class="pricing-table">
        <h2 class="mb-5 text-center">Pilihan Paket Untuk Perusahaan di Kelas Center</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="pricing-card">
                  <div class="card-header d-flex align-items-center">
                    <img src="{{ asset('assets/images/svg/lamp.svg') }}" alt="" style="width: 36px; height: 36px;">
                    <span class="ms-2">Starter</span>
                  </div>
                  <p class="kalimat1">Kelebihan</p>
                  <ul>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        LMS + kelas by Kelas.Center
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Up to 5 users
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        No charge per user
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Up to 20 pilihan kelas
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Update pergantian kelas / 3 bulan</li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Sertifikat
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Konsultasi Gratis
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Dedicated assistant
                      </li>
                      <li>
                        <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                        Full support 7x24 jam
                      </li>
                  </ul>
                  <div class="dashed-line"></div>
                  <div class="card-price-old">Rp187.500</div>
                  <div class="card-price">Rp159.000<span>/bulan</span></div>
                  <button class="btn-pricing">Pilih Paket</button>
                </div>
            </div>

            <div class="col-md-4">
              <div class="pricing-card">
                <div class="card-header d-flex align-items-center">
                  <img src="{{ asset('assets/images/svg/home-basic.svg') }}" alt="" style="width: 36px; height: 36px;">
                  <span class="ms-2">Basic</span>
                </div>
                <p class="kalimat1">Kelebihan</p>
                <ul>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      LMS + kelas by Kelas.Center
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      6-49 Users
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      No charge per user
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Up to 50 pilihan kelas
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Update pergantian kelas / 3 bulan</li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Sertifikat
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Konsultasi Gratis
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Dedicated assistant
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Full support 7x24 jam
                    </li>
                </ul>
                <div class="dashed-line"></div>
                <div class="card-price-old">Rp187.500</div>
                <div class="card-price">Rp159.000<span>/bulan</span></div>
                <button class="btn-pricing">Pilih Paket</button>
              </div>
            </div>

            <div class="col-md-4">
              <div class="pricing-card">
                <div class="card-header d-flex align-items-center">
                  <img src="{{ asset('assets/images/svg/home-pro.svg') }}" alt="" style="width: 36px; height: 36px;">
                  <span class="ms-2">Pro</span>
                </div>
                <p class="kalimat1">Kelebihan</p>
                <ul>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      LMS + kelas by Kelas.Center
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      50-100 Users
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      No charge per user
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      All Access Class
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Update pergantian kelas / 3 bulan</li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Sertifikat
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Konsultasi Gratis
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Dedicated assistant
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/svg/check-square.svg') }}" alt="">
                      Full support 7x24 jam
                    </li>
                </ul>
                <div class="dashed-line"></div>
                <div class="card-price-old">Rp3.750.000</div>
                <div class="card-price">Rp69.000<span>/bulan</span></div>
                <button class="btn-pricing">Pilih Paket</button>
              </div>
            </div>
        </div>

        <div class="enterprise-card">
          <div class="enterprise-info">
              <img src="{{ asset('assets/images/svg/enterprise.svg') }}" class="img-fluid">
              <img src="{{ asset('assets/images/svg/enterprise2.svg') }}" class="ms-5 img-fluid">
          </div>
          <a href="#" class="btn-contact btn">Contact Us</a>
        </div>
      </div>

    <div class="learning-video-section">
      <h2>Lebih dari 2000+ Learning Video</h2>
      <p>Kami juga sudah menyediakan banyak pelatihan yang beragam, pelatihan disusun dan dibuat oleh tim kurikulum profesional bersama tim video profesional untuk menghasilkan video dengan kualitas tinggi.</p>
  
      <!-- Kelompok Tab Kedua Menggunakan 'name' -->
      <ul class="nav nav-pills justify-content-center my-4" id="second-pills-tab" role="tablist">
        @foreach($courseCategory as $category)
            <li class="nav-item" role="presentation">
                <button class="nav-link category-btn {{ $loop->first ? 'active' : '' }}" id="second-pills-{{ Str::slug($category->name) }}-tab" data-bs-toggle="pill" data-bs-target="#second-pills-{{ Str::slug($category->name) }}" type="button" role="tab" aria-controls="second-pills-{{ Str::slug($category->name) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    {{ $category->name }}
                </button>
            </li>
        @endforeach
      </ul>

      <div class="tab-content" id="second-pills-tabContent">
        @foreach($courseCategory as $category)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="second-pills-{{ Str::slug($category->name) }}" role="tabpanel" aria-labelledby="second-pills-{{ Str::slug($category->name) }}-tab">
                <div class="row">
                    @foreach($category->courses as $course)
                        <div class="col-md-3">
                            <div class="video-card">
                                <div class="play-button">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                                  </svg>
                                </div>
                                <img src="{{ $course->image ? asset($course->image) : asset('assets/images/image-no-available.jpg') }}" alt="Video Thumbnail" class="img-fluid">
                                <div class="video-info">
                                    <h5>{{ $course->title }}</h5>
                                    <p>{{ $course->mentor->name }}</p>
                                    <span>{{ $course->mentor->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#C29C6D" class="bi bi-dash-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#f9f9f9" class="bi bi-dash-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#f9f9f9" class="bi bi-dash-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
          </svg>
        </div>
        <div class="col-10 text-end">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#f9f9f9" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#C29C6D" class="bi bi-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
          </svg>
        </div>
      </div>
    </div>

    <div class="cta-section">
      <div class="cta-content">
          <h2>Tingkatkan Kualitas Perusahaan Anda</h2>
          <p>Kami ingin membantu dan menunjukkan kepada Anda bagaimana Kelas corp dapat membantu dalam mengelola pelatihan dan membuat prosesnya lebih cepat dan lebih mudah.</p>
          <a href="#" class="btn cta-btn">Ajukan Demo</a>
      </div>
    </div>
    
    </div>

    <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <img src="{{ asset('assets/images/svg/logo.svg') }}" alt="Kelas.com for business" class="footer-logo">
                  <p>&copy; 2021 Landify UI Kit. All rights reserved</p>
              </div>
              <div class="col-md-3">
                  <h5>Company</h5>
                  <ul class="list-unstyled">
                      <li><a href="#">Tentang Kami</a></li>
                      <li><a href="#">Ajukan Demo</a></li>
                      <li><a href="#">Kelas.Work</a></li>
                      <li><a href="#">Kelas.Com</a></li>
                  </ul>
              </div>
              <div class="col-md-3">
                  <h5>Kebijakan</h5>
                  <ul class="list-unstyled">
                      <li><a href="#">Kebijakan Privasi</a></li>
                      <li><a href="#">Syarat & Ketentuan</a></li>
                  </ul>
              </div>
              <div class="col-md-3">
                  <h5>Hubungi Kami</h5>
                  <ul class="list-unstyled">
                      <li>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg>
                      <a class="ms-3" href="mailto:Nabilla.Anggraini@kelas.com"> 
                        Nabilla.Anggraini@kelas.com
                      </a></li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                          <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                        </svg>
                        <a class="ms-3" href="wa.me/+628113366763">
                         +62 811 3366 763 (Nabilla Anggraini)</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </footer>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
