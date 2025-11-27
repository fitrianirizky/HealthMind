<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMind - Layanan Kesehatan Mental</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        
        /* Page Transition */
        .page-section { display: none; animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .page-section.active { display: block; }
        
        @keyframes fadeUp { 
            from { opacity: 0; transform: translateY(10px); } 
            to { opacity: 1; transform: translateY(0); } 
        }
        
        .chat-scroll::-webkit-scrollbar { width: 4px; }
        .chat-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        /* Custom Pattern */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #f1f5f9 1px, transparent 1px),
            linear-gradient(to bottom, #f1f5f9 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col bg-grid-pattern">

    <!-- 1. Navbar (Sticky Top & Glassmorphism) -->
    <nav class="glass border-b border-gray-200/60 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center cursor-pointer group" onclick="showPage('home')">
                    <div class="bg-gradient-to-tr from-blue-600 to-indigo-600 text-white p-2 rounded-xl mr-3 shadow-lg shadow-blue-200 group-hover:scale-105 transition-transform">
                        <i data-lucide="heart-handshake" class="w-5 h-5"></i>
                    </div>
                    <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-800 to-gray-600">HealthMind</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-2 bg-gray-100/50 p-1.5 rounded-full border border-gray-200/50">
                    <button onclick="showPage('home')" id="nav-home" class="nav-link px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300 text-gray-500 hover:text-blue-600">
                        <i data-lucide="home" class="w-4 h-4"></i> Beranda
                    </button>
                    <button onclick="showPage('booking')" id="nav-booking" class="nav-link px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300 text-gray-500 hover:text-blue-600">
                        <i data-lucide="search" class="w-4 h-4"></i> Cari Psikolog
                    </button>
                    <button onclick="showPage('chat')" id="nav-chat" class="nav-link px-5 py-2 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300 text-gray-500 hover:text-blue-600 relative">
                        <i data-lucide="message-circle" class="w-4 h-4"></i> Chat
                        <span class="absolute top-1.5 right-3 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    </button>
                </div>

                <!-- Profile Dropdown -->
                <div class="flex items-center space-x-4">
                    <button onclick="showPage('profile')" id="nav-profile" class="flex items-center space-x-3 pl-1 pr-4 py-1 rounded-full hover:bg-white hover:shadow-md border border-transparent hover:border-gray-100 transition-all duration-300 group">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" class="h-9 w-9 rounded-full border-2 border-white shadow-sm bg-white group-hover:scale-105 transition-transform">
                        <span class="hidden md:block text-sm font-semibold text-gray-700 group-hover:text-blue-600">Felix Siauw</span>
                    </button>
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 text-gray-500 rounded-xl hover:bg-gray-100" onclick="toggleMobileMenu()">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-sm">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <button onclick="showPage('home')" class="block w-full text-left px-4 py-3 rounded-xl text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Beranda</button>
                <button onclick="showPage('booking')" class="block w-full text-left px-4 py-3 rounded-xl text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Cari Psikolog</button>
                <button onclick="showPage('chat')" class="block w-full text-left px-4 py-3 rounded-xl text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Chat</button>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="flex-1 max-w-7xl mx-auto w-full p-4 md:p-8 pb-24">

        <!-- ================= PAGE 1: BERANDA ================= -->
        <section id="home" class="page-section active">
            
            <!-- Hero / Welcome -->
            <div class="relative bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 rounded-3xl p-8 md:p-12 text-white mb-10 overflow-hidden shadow-2xl shadow-blue-200 transform transition-all hover:scale-[1.01]">
                <!-- Background Decor -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/20 rounded-full blur-2xl -ml-10 -mb-10"></div>
                
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-md border border-white/20 text-xs font-medium mb-4 text-blue-50">
                        👋 Selamat Pagi
                    </span>
                    <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight tracking-tight">Halo, Felix! <br/>Bagaimana Kabarmu?</h1>
                    <p class="text-blue-100 text-lg mb-8 font-light">Kesehatan mentalmu adalah prioritas. Jangan ragu untuk bercerita atau mencari bantuan profesional hari ini.</p>
                    
                    <!-- Mood Tracker -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 inline-block">
                        <p class="text-xs text-blue-100 mb-3 font-medium uppercase tracking-widest opacity-80">Mood Tracker Hari Ini</p>
                        <div class="flex gap-3">
                            <button class="flex flex-col items-center group w-14 transition-all hover:-translate-y-1">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-xl group-hover:bg-green-400 group-hover:text-white transition-colors shadow-lg">😄</div>
                                <span class="text-[10px] mt-1.5 text-white/80 group-hover:text-white font-medium">Senang</span>
                            </button>
                            <button class="flex flex-col items-center group w-14 transition-all hover:-translate-y-1">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-xl group-hover:bg-yellow-400 group-hover:text-white transition-colors shadow-lg">😐</div>
                                <span class="text-[10px] mt-1.5 text-white/80 group-hover:text-white font-medium">Biasa</span>
                            </button>
                            <button class="flex flex-col items-center group w-14 transition-all hover:-translate-y-1">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-xl group-hover:bg-orange-400 group-hover:text-white transition-colors shadow-lg">😫</div>
                                <span class="text-[10px] mt-1.5 text-white/80 group-hover:text-white font-medium">Lelah</span>
                            </button>
                            <button class="flex flex-col items-center group w-14 transition-all hover:-translate-y-1">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-xl group-hover:bg-red-400 group-hover:text-white transition-colors shadow-lg">😰</div>
                                <span class="text-[10px] mt-1.5 text-white/80 group-hover:text-white font-medium">Cemas</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Session Card (Highlighted) -->
            <div class="bg-white border border-blue-100 rounded-3xl p-6 shadow-xl shadow-blue-50 mb-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-blue-300 transition-colors group">
                <div class="flex items-center gap-5">
                    <div class="relative">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0 border border-blue-100 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <i data-lucide="video" class="w-8 h-8"></i>
                        </div>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 border-2 border-white rounded-full animate-ping"></span>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="bg-red-50 text-red-600 px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider">Segera Dimulai</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">Sesi Konsultasi Mendatang</h3>
                        <p class="text-sm text-gray-500">Bersama <span class="font-semibold text-gray-800">Dr. Sekar Sari</span> • Hari Ini, 14:00 WIB</p>
                    </div>
                </div>
                <button class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold text-sm transition-all shadow-lg shadow-blue-200 flex items-center justify-center gap-2 group-hover:scale-105">
                    <i data-lucide="video" class="w-4 h-4"></i> Masuk Ruang Video
                </button>
            </div>

            <!-- Services Grid -->
           <div class="mb-10">
    <h2 class="font-bold text-xl text-gray-800 mb-6 flex items-center">
        Layanan Kesehatan Mental
        <span class="ml-3 h-px flex-1 bg-gray-200"></span>
    </h2>
    
    <div class="flex flex-wrap justify-center gap-5">
        
        <div onclick="showPage('booking')" class="w-[45%] md:w-64 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-purple-50 hover:-translate-y-1 transition-all cursor-pointer text-center group">
            <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                <i data-lucide="message-circle" class="w-8 h-8"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Chat Psikolog</h3>
            <p class="text-xs text-gray-400">Konseling via teks</p>
        </div>

        <div onclick="showPage('booking')" class="w-[45%] md:w-64 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-blue-50 hover:-translate-y-1 transition-all cursor-pointer text-center group">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                <i data-lucide="video" class="w-8 h-8"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Video Call</h3>
            <p class="text-xs text-gray-400">Tatap muka online</p>
        </div>

        <div onclick="showPage('booking')" class="w-[45%] md:w-64 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-green-50 hover:-translate-y-1 transition-all cursor-pointer text-center group">
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                <i data-lucide="map-pin" class="w-8 h-8"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Janji Offline</h3>
            <p class="text-xs text-gray-400">Kunjungan klinik</p>
        </div>

    </div>
</div>

            <!-- Articles Section -->
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-bold text-xl text-gray-800">Bacaan Untukmu</h2>
                    <a href="#" class="text-sm text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-1 group">
                        Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Article 1 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1499209971180-02f3b24cf63c?auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 uppercase tracking-wider shadow-sm">Edukasi</div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">Cara Mengatasi Serangan Panik di Tempat Umum dengan Tenang</h3>
                            <div class="flex items-center text-gray-400 text-xs font-medium">
                                <i data-lucide="clock" class="w-3 h-3 mr-1.5"></i> 5 menit baca
                            </div>
                        </div>
                    </div>
                    <!-- Article 2 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1544027993-37dbfe43562a?auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-green-600 uppercase tracking-wider shadow-sm">Mindfulness</div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-green-600 transition-colors">Mengapa Meditasi 10 Menit Sehari Bisa Mengubah Hidupmu?</h3>
                            <div class="flex items-center text-gray-400 text-xs font-medium">
                                <i data-lucide="clock" class="w-3 h-3 mr-1.5"></i> 3 menit baca
                            </div>
                        </div>
                    </div>
                    <!-- Article 3 -->
                    <div class="bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all group cursor-pointer">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1527137342181-19aab11a8ee8?auto=format&fit=crop&w=500&q=60" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-purple-600 uppercase tracking-wider shadow-sm">Relationship</div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-purple-600 transition-colors">Tips Membangun Komunikasi yang Lebih Sehat dengan Pasangan</h3>
                            <div class="flex items-center text-gray-400 text-xs font-medium">
                                <i data-lucide="clock" class="w-3 h-3 mr-1.5"></i> 7 menit baca
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= PAGE 2: BOOKING (CARI DOKTER) ================= -->
        <section id="booking" class="page-section">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Temukan Profesional Terbaik</h2>
                    <p class="text-gray-500">Pilih psikolog atau psikiater yang sesuai dengan kebutuhanmu</p>
                </div>
                
                <!-- Search & Filter -->
                <div class="bg-white p-2 rounded-3xl shadow-lg shadow-gray-100 border border-gray-100 mb-8 sticky top-24 z-30">
                    <div class="flex flex-col md:flex-row gap-2 p-2">
                        <div class="relative flex-1">
                            <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                            <input type="text" placeholder="Cari nama dokter, masalah, atau keahlian..." class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border-transparent rounded-2xl text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all">
                        </div>
                        <button class="px-8 py-3.5 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all hover:scale-[1.02] active:scale-95">Cari</button>
                    </div>
                    
                    <div class="flex gap-2 px-2 pb-2 overflow-x-auto pb-2 scrollbar-hide mt-2">
                        <button class="px-5 py-2 rounded-full bg-gray-900 text-white text-sm font-medium whitespace-nowrap shadow-md">Semua</button>
                        <button class="px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 text-sm font-medium hover:border-blue-500 hover:text-blue-600 transition-colors whitespace-nowrap">Psikolog Klinis</button>
                        <button class="px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 text-sm font-medium hover:border-blue-500 hover:text-blue-600 transition-colors whitespace-nowrap">Psikiater</button>
                        <button class="px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 text-sm font-medium hover:border-blue-500 hover:text-blue-600 transition-colors whitespace-nowrap">Konselor</button>
                        <button class="px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 text-sm font-medium hover:border-blue-500 hover:text-blue-600 transition-colors whitespace-nowrap">Terapis Anak</button>
                    </div>
                </div>

                <!-- Doctor List -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Doctor Card 1 -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all hover:-translate-y-1 group">
                        <div class="flex items-start gap-5">
                            <div class="relative">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="w-20 h-20 rounded-2xl border border-gray-100 bg-blue-50 object-cover">
                                <div class="absolute -bottom-2 -right-2 bg-white p-1 rounded-full shadow-sm">
                                    <i data-lucide="shield-check" class="w-5 h-5 text-blue-500 fill-current"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Dr. Sekar Sari, Sp.KJ</h3>
                                        <p class="text-blue-600 font-medium text-sm mb-2">Psikiater</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-xs text-gray-500 mb-3 space-x-3">
                                    <span class="flex items-center"><i data-lucide="briefcase" class="w-3 h-3 mr-1"></i> 10 Tahun</span>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-100 text-gray-500 text-[10px] font-medium rounded-md">Depresi</span>
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-100 text-gray-500 text-[10px] font-medium rounded-md">Anxiety</span>
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-100 text-gray-500 text-[10px] font-medium rounded-md">Bipolar</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-400">Biaya Sesi</p>
                                <p class="text-lg font-bold text-gray-900">Rp 250.000</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl font-semibold text-sm hover:bg-gray-50 transition">Profil</button>
                                <button class="px-6 py-2.5 bg-blue-600 text-white rounded-xl font-semibold text-sm hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Buat Janji</button>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Card 2 -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all hover:-translate-y-1 group">
                        <div class="flex items-start gap-5">
                            <div class="relative">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti" class="w-20 h-20 rounded-2xl border border-gray-100 bg-purple-50 object-cover">
                                <div class="absolute -bottom-2 -right-2 bg-white p-1 rounded-full shadow-sm">
                                    <i data-lucide="shield-check" class="w-5 h-5 text-blue-500 fill-current"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Siti Aminah, M.Psi</h3>
                                        <p class="text-purple-600 font-medium text-sm mb-2">Psikolog Klinis</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-xs text-gray-500 mb-3 space-x-3">
                                    <span class="flex items-center"><i data-lucide="briefcase" class="w-3 h-3 mr-1"></i> 5 Tahun</span>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-100 text-gray-500 text-[10px] font-medium rounded-md">Stress</span>
                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-100 text-gray-500 text-[10px] font-medium rounded-md">Hubungan</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                            <div>
                                <p class="text-xs text-gray-400">Biaya Sesi</p>
                                <p class="text-lg font-bold text-gray-900">Rp 150.000</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl font-semibold text-sm hover:bg-gray-50 transition">Profil</button>
                                <button class="px-6 py-2.5 bg-blue-600 text-white rounded-xl font-semibold text-sm hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Buat Janji</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= PAGE 3: CHAT ================= -->
        <section id="chat" class="page-section h-[calc(100vh-140px)]">
            <div class="flex h-full bg-white rounded-3xl border border-gray-200 shadow-xl overflow-hidden">
                <!-- Chat List (Sidebar) -->
                <div class="w-full md:w-80 border-r border-gray-100 flex flex-col bg-gray-50/50">
                    <div class="p-5 border-b border-gray-100">
                        <h3 class="font-bold text-lg text-gray-800">Pesan</h3>
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <div class="p-4 border-l-4 border-l-blue-600 bg-white shadow-sm cursor-pointer">
                            <div class="flex items-start gap-3">
                                <div class="relative">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="w-12 h-12 rounded-full bg-blue-50 border border-gray-200">
                                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-center mb-1">
                                        <h4 class="font-bold text-sm text-gray-900">Dr. Sekar Sari</h4>
                                        <span class="text-xs text-blue-600 font-bold">10:31</span>
                                    </div>
                                    <p class="text-xs text-gray-600 truncate font-medium">Silakan ceritakan apa yang sedang...</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-l-4 border-l-transparent hover:bg-white hover:shadow-sm transition-all cursor-pointer">
                            <div class="flex items-start gap-3 opacity-70">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siti" class="w-12 h-12 rounded-full bg-white border border-gray-200 grayscale">
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-center mb-1">
                                        <h4 class="font-bold text-sm text-gray-900">Siti Aminah, M.Psi</h4>
                                        <span class="text-xs text-gray-400">Kemarin</span>
                                    </div>
                                    <p class="text-xs text-gray-500 truncate">Sesi telah selesai. Terima kasih.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Room -->
                <div class="flex-1 flex flex-col hidden md:flex bg-white relative">
                    <!-- Header -->
                    <div class="h-20 px-6 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between shrink-0 z-10">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="w-12 h-12 rounded-full border border-gray-200 bg-blue-50">
                                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Dr. Sekar Sari, Sp.KJ</h3>
                                <span class="flex items-center text-xs text-green-600 font-medium">Online • Sedang mengetik...</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="p-2.5 text-gray-500 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors"><i data-lucide="video" class="w-5 h-5"></i></button>
                            <button class="p-2.5 text-gray-500 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors"><i data-lucide="phone" class="w-5 h-5"></i></button>
                            <button class="p-2.5 text-gray-500 hover:bg-gray-100 rounded-xl transition-colors"><i data-lucide="more-vertical" class="w-5 h-5"></i></button>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-1 overflow-y-auto p-6 space-y-6 bg-gray-50">
                        <!-- Time divider -->
                        <div class="flex justify-center"><span class="text-[10px] font-bold uppercase tracking-widest text-gray-400 bg-gray-200/50 px-3 py-1 rounded-full">Hari Ini</span></div>
                        
                        <!-- Doc Msg -->
                        <div class="flex items-start gap-3 max-w-[85%]">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="w-8 h-8 rounded-full border border-gray-200 bg-white mt-1 shadow-sm">
                            <div class="bg-white border border-gray-100 p-4 rounded-2xl rounded-tl-none shadow-sm">
                                <p class="text-sm text-gray-800 leading-relaxed">Selamat pagi. Saya dr. Andi. Silakan ceritakan apa yang sedang Anda rasakan saat ini? Saya siap mendengarkan.</p>
                                <span class="text-[10px] text-gray-400 block mt-2">10:31</span>
                            </div>
                        </div>

                        <!-- User Msg -->
                        <div class="flex items-end justify-end gap-2">
                            <div class="bg-blue-600 text-white p-4 rounded-2xl rounded-tr-none shadow-lg shadow-blue-100 max-w-[85%]">
                                <p class="text-sm leading-relaxed">Pagi dok. Saya merasa sangat cemas akhir-akhir ini tanpa sebab yang jelas. Dada terasa sesak dan sulit tidur malam.</p>
                                <div class="flex items-center justify-end gap-1 mt-2 opacity-70">
                                    <span class="text-[10px]">10:32</span>
                                    <i data-lucide="check-check" class="w-3 h-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input -->
                    <div class="p-4 bg-white border-t border-gray-100">
                        <div class="flex items-end gap-2 bg-gray-50 p-2 rounded-3xl border border-gray-200 focus-within:ring-2 focus-within:ring-blue-100 focus-within:border-blue-300 transition-all">
                            <button class="p-3 text-gray-400 hover:text-blue-600 hover:bg-white rounded-full transition-colors shadow-sm"><i data-lucide="paperclip" class="w-5 h-5"></i></button>
                            <textarea rows="1" placeholder="Ketik pesan..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-3 resize-none text-gray-700 max-h-32"></textarea>
                            <button class="p-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-95"><i data-lucide="send" class="w-5 h-5"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= PAGE 4: RIWAYAT ================= -->

        <!-- ================= PAGE 5: PROFIL ================= -->
        <section id="profile" class="page-section">
            <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 p-10">
                <div class="text-center mb-10">
                    <div class="relative inline-block group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" class="relative w-28 h-28 rounded-full border-4 border-white shadow-lg bg-gray-50 object-cover">
                        <button class="absolute bottom-0 right-0 p-2 bg-blue-600 text-white rounded-full border-4 border-white shadow-md hover:bg-blue-700 hover:scale-110 transition-all">
                            <i data-lucide="camera" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mt-6">Felix Siauw</h2>
                    <p class="text-gray-500">Member sejak Januari 2024</p>
                </div>

                <form class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Nama Lengkap</label>
                            <input type="text" value="Felix Siauw" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Email</label>
                            <input type="email" value="felix@email.com" class="w-full px-5 py-3 bg-gray-100 border border-transparent rounded-xl text-gray-500 cursor-not-allowed" readonly>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Nomor Telepon</label>
                            <input type="text" value="0812-3456-7890" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 ml-1">Tanggal Lahir</label>
                            <input type="date" value="1995-05-15" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-8">
                        <h3 class="font-bold text-lg text-gray-900 mb-6">Pengaturan Privasi</h3>
                        <div class="flex items-center justify-between py-4 px-5 bg-gray-50 rounded-2xl mb-3">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                                    <i data-lucide="bell" class="w-5 h-5"></i>
                                </div>
                                <span class="font-medium text-gray-700">Notifikasi Email</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div class="w-12 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600 transition-colors"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between py-4 px-5 bg-gray-50 rounded-2xl">
                            <div class="flex items-center gap-3">
                                <div class="bg-purple-100 text-purple-600 p-2 rounded-lg">
                                    <i data-lucide="venetian-mask" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-700">Mode Anonim</p>
                                    <p class="text-xs text-gray-500">Sembunyikan nama asli saat chat</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="w-12 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[3px] after:left-[3px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600 transition-colors"></div>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                        <button type="button" class="px-8 py-3 border border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="button" class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all hover:-translate-y-0.5">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <!-- Scripts -->
    <script>
        // Init Icons
        lucide.createIcons();

        // Enhanced SPA Logic with Active State
        function showPage(pageId) {
            // Hide all sections
            document.querySelectorAll('.page-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show target section
            const target = document.getElementById(pageId);
            if(target) {
                target.classList.add('active');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Reset all nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('bg-blue-50', 'text-blue-600');
                link.classList.add('text-gray-500');
            });

            // Set active nav link
            const activeBtn = document.getElementById('nav-' + pageId);
            if(activeBtn) {
                activeBtn.classList.remove('text-gray-500');
                activeBtn.classList.add('bg-blue-50', 'text-blue-600');
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Initialize Home as active on load
        document.addEventListener('DOMContentLoaded', () => {
            showPage('home');
        });
    </script>
</body>
</html>