<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMind - Konsultasi Psikolog Online Terpercaya</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Configuration for Sofbox Theme Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#E8F1FF',  /* Sofbox Light Blue */
                            200: '#bddaff',
                            500: '#4085FF',  /* Sofbox Primary Blue */
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Utilities */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Nav Link Active State */
        .nav-link.active {
            color: #4085FF; /* brand-500 */
            font-weight: 700;
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-white">

    <!-- 1. NAVBAR (Sticky & Glass) -->
    <nav class="fixed w-full z-50 top-0 border-b border-slate-100 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="#home" class="flex items-center gap-2 cursor-pointer">
                    <div class="bg-brand-500 text-white p-2 rounded-xl">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-bold text-slate-800">HealthMind</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8" id="desktop-menu">
                    <a href="#layanan" class="nav-link text-slate-600 font-medium hover:text-brand-500 transition">Layanan</a>
                    <a href="#psikolog" class="nav-link text-slate-600 font-medium hover:text-brand-500 transition">Cari Psikolog</a>
                    <a href="#cara-kerja" class="nav-link text-slate-600 font-medium hover:text-brand-500 transition">Cara Kerja</a>
                    <a href="#artikel" class="nav-link text-slate-600 font-medium hover:text-brand-500 transition">Artikel</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center gap-3">
                    <button class="text-brand-500 font-bold px-5 py-2.5 hover:bg-brand-50 rounded-full transition">Masuk</button>
                    <button class="bg-brand-500 hover:bg-brand-600 text-white px-6 py-2.5 rounded-full font-bold shadow-lg shadow-brand-200 transition-all hover:-translate-y-0.5">
                        Daftar Sekarang
                    </button>
                </div>

                <!-- Mobile Menu Icon -->
                <div class="md:hidden">
                    <button class="text-slate-600 p-2"><i data-lucide="menu" class="w-6 h-6"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- 2. HERO SECTION -->
    <section id="home" class="pt-32 pb-20 bg-gradient-to-b from-brand-100 via-white to-white overflow-hidden relative section-scroll">
        <!-- Abstract Shapes -->
        <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-brand-200 rounded-full blur-3xl opacity-20 -mr-20"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-purple-200 rounded-full blur-3xl opacity-20 -ml-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                
                <!-- Text Content -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-brand-100 shadow-sm text-brand-600 text-sm font-bold mb-6">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                        </span>
                        #1 Platform Kesehatan Mental Terpercaya
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                        Pulihkan Diri, <br>
                        <span class="text-brand-500">Mulai Dari Sini.</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg mx-auto lg:mx-0">
                        Konsultasi dengan psikolog klinis dan psikiater berpengalaman secara aman, rahasia, dan nyaman dari mana saja.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button class="bg-brand-500 hover:bg-brand-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-brand-200 transition-all hover:scale-105 flex items-center justify-center gap-2">
                            Konsultasi Sekarang <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </button>
                        <button class="bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-8 py-4 rounded-full font-bold text-lg shadow-sm transition-all flex items-center justify-center gap-2">
                            <i data-lucide="play-circle" class="w-5 h-5"></i> Lihat Cara Kerja
                        </button>
                    </div>
                </div>

                <!-- Image Content (Ganti dengan Ilustrasi Grafis) -->
                <div class="lg:w-1/2 relative">
                    <div class="relative z-10">
                        <!-- Menggunakan gambar ilustrasi dari URL yang sudah ada di riwayat percakapan -->
                        <img src="assets/images/2.png" alt="Ilustrasi Konsultasi Psikolog" class="w-full h-auto object-contain drop-shadow-xl hover:scale-105 transition-transform duration-500">
                        
                        <!-- Floating Card 1 -->
                        <div class="absolute bottom-8 left-8 bg-white p-4 rounded-2xl shadow-lg flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
                            <div class="bg-green-100 text-green-600 p-2 rounded-full">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Status</p>
                                <p class="font-bold text-slate-800">100% Rahasia</p>
                            </div>
                        </div>

                        <!-- Floating Card 2 -->
                        <div class="absolute top-8 right-8 bg-white p-4 rounded-2xl shadow-lg flex items-center gap-3 animate-pulse">
                            <div class="bg-yellow-100 text-yellow-600 p-2 rounded-full">
                                <i data-lucide="star" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Rating</p>
                                <p class="font-bold text-slate-800">4.9/5.0</p>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Circle -->
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-brand-500 rounded-full opacity-20 blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. KATEGORI LAYANAN -->
    <section id="layanan" class="py-20 bg-white section-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Layanan Kesehatan Mental Terlengkap</h2>
            <p class="text-slate-600">Kami menyediakan berbagai metode konseling yang sesuai dengan kenyamanan dan kebutuhan Anda.</p>
        </div>

        <div class="flex flex-wrap justify-center gap-6">
            
            <div class="w-[45%] md:w-56 group bg-white border border-slate-100 rounded-2xl p-6 text-center hover:shadow-xl hover:border-brand-200 hover:-translate-y-1 transition-all cursor-pointer">
                <div class="w-14 h-14 mx-auto bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <i data-lucide="message-square" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Konsultasi Chat</h3>
                <p class="text-xs text-slate-500">Fleksibel & Praktis</p>
            </div>

            <div class="w-[45%] md:w-56 group bg-white border border-slate-100 rounded-2xl p-6 text-center hover:shadow-xl hover:border-brand-200 hover:-translate-y-1 transition-all cursor-pointer">
                <div class="w-14 h-14 mx-auto bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <i data-lucide="video" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Video Call</h3>
                <p class="text-xs text-slate-500">Tatap Muka Online</p>
            </div>

            <div class="w-[45%] md:w-56 group bg-white border border-slate-100 rounded-2xl p-6 text-center hover:shadow-xl hover:border-brand-200 hover:-translate-y-1 transition-all cursor-pointer">
                <div class="w-14 h-14 mx-auto bg-green-50 text-green-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-500 group-hover:text-white transition-colors">
                    <i data-lucide="clipboard-list" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Tes Psikologi</h3>
                <p class="text-xs text-slate-500">Kenali Diri Anda</p>
            </div>

            <div class="w-[45%] md:w-56 group bg-white border border-slate-100 rounded-2xl p-6 text-center hover:shadow-xl hover:border-brand-200 hover:-translate-y-1 transition-all cursor-pointer">
                <div class="w-14 h-14 mx-auto bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                    <i data-lucide="briefcase" class="w-7 h-7"></i>
                </div>
                <h3 class="font-bold text-slate-800 mb-1">Konseling Karir</h3>
                <p class="text-xs text-slate-500">Pengembangan Diri</p>
            </div>

        </div>
    </div>
</section>

    <!-- 4. WHY US (Value Proposition) -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Kenapa Ribuan Orang Memilih HealthMind?</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center shrink-0">
                                <i data-lucide="check-circle" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-800">Psikolog & Psikiater Berlisensi</h3>
                                <p class="text-slate-600 mt-1">Semua mitra kami memiliki STR (Surat Tanda Registrasi) dan SIPP aktif yang terverifikasi.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center shrink-0">
                                <i data-lucide="lock" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-800">Privasi 100% Terjamin</h3>
                                <p class="text-slate-600 mt-1">Data medis Anda dienkripsi dan kami menyediakan fitur konsultasi anonim.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center shrink-0">
                                <i data-lucide="clock" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-800">Tersedia 24/7</h3>
                                <p class="text-slate-600 mt-1">Butuh teman cerita tengah malam? Psikolog kami siap mendengarkan kapan saja.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Image Content (Ganti dengan Ilustrasi Grafis) -->
                <div class="relative">
                    <!-- Menggunakan placeholder ilustrasi yang sesuai dengan tema -->
                    <img src="assets/images/1.png" alt="Ilustrasi Keunggulan HealthMind" class="w-full h-auto object-contain drop-shadow-lg">
                    <!-- Stats Badge -->
                    <div class="absolute bottom-6 right-6 bg-white px-6 py-4 rounded-2xl shadow-xl text-center border border-brand-100">
                        <p class="text-3xl font-extrabold text-brand-500">5.000+</p>
                        <p class="text-sm font-semibold text-slate-600">Pasien Terbantu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. DAFTAR PSIKOLOG (Scrollable) -->
    <section id="psikolog" class="py-20 bg-white section-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Mitra Profesional Kami</h2>
                    <p class="text-slate-600">Pilih psikolog yang paling sesuai dengan kebutuhanmu.</p>
                </div>
                <a href="#" class="text-brand-600 font-bold hover:text-brand-700 flex items-center gap-1">
                    Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Horizontal Scroll Container -->
            <div class="flex overflow-x-auto gap-6 pb-8 hide-scrollbar snap-x">
                
                <!-- Card 1 -->
                <div class="min-w-[300px] bg-white border border-slate-100 rounded-3xl p-5 shadow-lg hover:shadow-2xl transition-all snap-center group">
                    <div class="relative mb-4">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="w-24 h-24 rounded-full border-4 border-brand-50 mx-auto bg-brand-50 object-cover">
                        <span class="absolute bottom-0 right-1/3 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-500 transition">Dr. Sekar Sari, Sp.KJ</h3>
                        <p class="text-brand-600 font-medium text-sm">Psikiater (10 Tahun)</p>
                    </div>
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Depresi</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Anxiety</span>
                    </div>
                    <button class="w-full py-3 bg-brand-500 hover:bg-brand-600 text-white rounded-xl font-bold text-sm transition shadow-md shadow-brand-200">
                        Buat Janji (Rp 250rb)
                    </button>
                </div>

                <!-- Card 2 -->
                <div class="min-w-[300px] bg-white border border-slate-100 rounded-3xl p-5 shadow-lg hover:shadow-2xl transition-all snap-center group">
                    <div class="relative mb-4">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti" class="w-24 h-24 rounded-full border-4 border-purple-50 mx-auto bg-purple-50 object-cover">
                        <span class="absolute bottom-0 right-1/3 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-purple-500 transition">Siti Aminah, M.Psi</h3>
                        <p class="text-purple-600 font-medium text-sm">Psikolog Klinis (5 Tahun)</p>

                    </div>
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Stress Kerja</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Hubungan</span>
                    </div>
                    <button class="w-full py-3 bg-white border-2 border-purple-500 text-purple-600 hover:bg-purple-50 rounded-xl font-bold text-sm transition">
                        Buat Janji (Rp 150rb)
                    </button>
                </div>

                <!-- Card 3 -->
                <div class="min-w-[300px] bg-white border border-slate-100 rounded-3xl p-5 shadow-lg hover:shadow-2xl transition-all snap-center group">
                    <div class="relative mb-4">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Budi" class="w-24 h-24 rounded-full border-4 border-green-50 mx-auto bg-green-50 object-cover">
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-green-500 transition">Budi Santoso, M.Psi</h3>
                        <p class="text-green-600 font-medium text-sm">Konselor Pernikahan</p>
                    </div>
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Keluarga</span>
                        <span class="px-2 py-1 bg-slate-100 text-slate-600 text-xs rounded-md">Komunikasi</span>
                    </div>
                    <button class="w-full py-3 bg-white border-2 border-green-500 text-green-600 hover:bg-green-50 rounded-xl font-bold text-sm transition">
                        Buat Janji (Rp 200rb)
                    </button>
                </div>

                <!-- Card 4 (Placeholder) -->
                <div class="min-w-[300px] bg-slate-50 border border-slate-200 border-dashed rounded-3xl p-5 flex flex-col items-center justify-center text-center snap-center cursor-pointer hover:bg-slate-100 transition">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm">
                        <i data-lucide="arrow-right" class="w-6 h-6 text-slate-400"></i>
                    </div>
                    <h3 class="font-bold text-slate-500">Lihat 50+ Psikolog Lainnya</h3>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. CARA KERJA (Steps) -->
    <section id="cara-kerja" class="py-20 bg-brand-50 section-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Mulai Konsultasi dalam 3 Langkah</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connector Line (Desktop Only) -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-brand-200 -translate-y-1/2 z-0"></div>

                <!-- Step 1 -->
                <div class="relative z-10 bg-white p-8 rounded-3xl shadow-md text-center border border-slate-100">
                    <div class="w-16 h-16 bg-brand-500 text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brand-200">1</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Daftar Akun</h3>
                    <p class="text-slate-600">Buat akun secara gratis. Anda bisa memilih untuk menggunakan nama samaran (anonim).</p>
                </div>

                <!-- Step 2 -->
                <div class="relative z-10 bg-white p-8 rounded-3xl shadow-md text-center border border-slate-100">
                    <div class="w-16 h-16 bg-brand-500 text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brand-200">2</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Pilih Psikolog</h3>
                    <p class="text-slate-600">Cari psikolog berdasarkan keahlian, harga, atau jadwal yang sesuai denganmu.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative z-10 bg-white p-8 rounded-3xl shadow-md text-center border border-slate-100">
                    <div class="w-16 h-16 bg-brand-500 text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-brand-200">3</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Mulai Konsultasi</h3>
                    <p class="text-slate-600">Lakukan sesi via Chat atau Video Call sesuai jadwal. Privasi dijamin aman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. TESTIMONI -->
    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-slate-900 mb-12">Kata Mereka yang Telah Pulih ❤️</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Review 1 -->
                <div class="bg-slate-50 p-8 rounded-3xl text-left relative">
                    <i data-lucide="quote" class="w-10 h-10 text-brand-200 absolute top-6 right-6"></i>
                    <p class="text-slate-700 italic mb-6 text-lg">"Awalnya ragu konsultasi online, tapi ternyata Dr. Andi sangat mendengarkan. Fitur chatnya responsif dan saya merasa jauh lebih lega sekarang."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold">A</div>
                        <div>
                            <h4 class="font-bold text-slate-900">Amanda P.</h4>
                            <p class="text-xs text-slate-500">Karyawan Swasta</p>
                        </div>
                    </div>
                </div>
                <!-- Review 2 -->
                <div class="bg-slate-50 p-8 rounded-3xl text-left relative">
                    <i data-lucide="quote" class="w-10 h-10 text-brand-200 absolute top-6 right-6"></i>
                    <p class="text-slate-700 italic mb-6 text-lg">"Sangat terbantu dengan fitur anonim. Saya bisa cerita masalah keluarga tanpa takut dihakimi. Harganya juga transparan."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">R</div>
                        <div>
                            <h4 class="font-bold text-slate-900">Rizky (Anonim)</h4>
                            <p class="text-xs text-slate-500">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. ARTIKEL (Blog) -->
    <section id="artikel" class="py-20 bg-white border-t border-slate-50 section-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <h2 class="text-3xl font-bold text-slate-900">Artikel Kesehatan Mental</h2>
                <a href="#" class="text-brand-600 font-bold hover:text-brand-700 flex items-center gap-1">Lihat Blog <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article class="group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden mb-4 h-56 bg-brand-50 flex items-center justify-center relative">
                        <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?q=80&w=800&auto=format&fit=crop" alt="Orang sedang menenangkan diri di alam" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition duration-500"></div>
                    </div>
                    <span class="text-xs font-bold text-brand-600 uppercase tracking-wide">Tips</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2 group-hover:text-brand-600 transition">Cara Mengatasi Panic Attack Sendirian</h3>
                    <p class="text-slate-500 text-sm line-clamp-2">Panic attack bisa terjadi kapan saja. Pelajari teknik grounding 5-4-3-2-1 untuk menenangkan diri.</p>
                </article>
                <!-- Article 2 -->
                <article class="group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden mb-4 h-56 bg-slate-100 flex items-center justify-center relative">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=800&auto=format&fit=crop" alt="Meditasi saat matahari terbit" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition duration-500"></div>
                    </div>
                    <span class="text-xs font-bold text-brand-600 uppercase tracking-wide">Mindfulness</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2 group-hover:text-brand-600 transition">Manfaat Meditasi Pagi Hari</h3>
                    <p class="text-slate-500 text-sm line-clamp-2">Memulai hari dengan ketenangan bisa meningkatkan produktivitas dan mengurangi stres kerja.</p>
                </article>
                <!-- Article 3  -->
                <article class="group cursor-pointer">
                    <div class="rounded-2xl overflow-hidden mb-4 h-56 bg-slate-100 flex items-center justify-center relative">
                        <img src="https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=800&auto=format&fit=crop" alt="Seseorang stres di depan laptop" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-slate-900/20 group-hover:bg-slate-900/0 transition duration-500"></div>
                    </div>
                    <span class="text-xs font-bold text-brand-600 uppercase tracking-wide">Karir</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2 group-hover:text-brand-600 transition">Tanda Kamu Mengalami Burnout</h3>
                    <p class="text-slate-500 text-sm line-clamp-2">Kenali gejala kelelahan mental akibat pekerjaan sebelum terlambat dan berdampak fisik.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- 9. CTA PENUTUP -->
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-brand-500 rounded-3xl p-12 text-center text-white relative overflow-hidden shadow-2xl shadow-brand-200">
                <!-- Decor -->
                <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -ml-20 -mt-20"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full -mr-10 -mb-10"></div>
                
                <h2 class="text-3xl md:text-4xl font-bold mb-6 relative z-10">Jangan Biarkan Masalahmu Menumpuk</h2>
                <p class="text-brand-100 text-lg mb-8 max-w-2xl mx-auto relative z-10">Kesehatan mental sama pentingnya dengan kesehatan fisik. Ambil langkah pertama untuk pulih hari ini.</p>
                <button class="bg-white text-brand-600 px-8 py-4 rounded-full font-bold text-lg hover:bg-slate-50 shadow-lg transition-transform hover:scale-105 relative z-10">
                    Mulai Konsultasi Sekarang
                </button>
            </div>
        </div>
    </section>

    <!-- 10. FOOTER -->
    <footer class="bg-slate-900 text-slate-300 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4 text-white">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                        <span class="text-2xl font-bold">HealthMind</span>
                    </div>
                    <p class="text-sm text-slate-400">Platform layanan kesehatan mental digital terpercaya di Indonesia. Kami hadir untuk mendengar.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">Karir</a></li>
                        <li><a href="#" class="hover:text-white transition">Mitra Psikolog</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Konsultasi Chat</a></li>
                        <li><a href="#" class="hover:text-white transition">Konseling Video</a></li>
                        <li><a href="#" class="hover:text-white transition">Tes Mental</a></li>
                        <li><a href="#" class="hover:text-white transition">Untuk Perusahaan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Bantuan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                        <li class="flex gap-4 mt-4">
                            <a href="#" class="hover:text-white"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                            <a href="#" class="hover:text-white"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                            <a href="#" class="hover:text-white"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center text-sm text-slate-500">
                &copy; 2025 HealthMind Indonesia. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Active Navigation Logic
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.section-scroll');
            const navLinks = document.querySelectorAll('.nav-link');
            const logoLink = document.querySelector('a[href="#home"]');

            function highlightNavLink() {
                let scrollPosition = window.scrollY;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 100; // Adjust offset as needed
                    const sectionBottom = sectionTop + section.offsetHeight;
                    const sectionId = section.getAttribute('id');

                    if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                        navLinks.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${sectionId}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });

                // Handle Logo click separately to reset active state
                if (scrollPosition < 100) { // If near top of page
                     navLinks.forEach(link => link.classList.remove('active'));
                }
            }

            window.addEventListener('scroll', highlightNavLink);
            
            // Call once on load to set initial state
            highlightNavLink();

            // Add click event listener for smooth scrolling and immediate active state update
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                         window.scrollTo({
                            top: targetElement.offsetTop - 80, // Adjust for fixed header
                            behavior: 'smooth'
                        });

                        // Update active state immediately on click
                        navLinks.forEach(link => link.classList.remove('active'));
                        if (this.classList.contains('nav-link')) {
                            this.classList.add('active');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>