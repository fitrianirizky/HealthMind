<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - HealthMind Doc</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Tab Animation */
        .tab-content { display: none; animation: fadeIn 0.3s; }
        .tab-content.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-white text-gray-800 h-screen flex overflow-hidden">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar Dokter -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-100 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
        <div class="flex items-center justify-center h-20 px-6 shrink-0">
            <div class="flex items-center space-x-2 text-blue-600">
                <div class="bg-blue-600 text-white p-1.5 rounded-lg">
                    <i data-lucide="cross" class="w-5 h-5"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-gray-800">HealthMind<span class="text-blue-600">Doc</span></span>
            </div>
        </div>

        <div class="py-4 overflow-y-auto flex-1 px-4 space-y-1">
            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Workspace</p>
            
            <a href="DashboardDokter.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-600 rounded-xl transition-colors font-medium">
                <i data-lucide="layout-grid" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="JadwalDokter.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-600 rounded-xl transition-colors font-medium">
                <i data-lucide="calendar-days" class="w-5 h-5"></i>
                <span>Jadwal Saya</span>
            </a>

            <a href="ChatKonsultasi.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-600 rounded-xl transition-colors font-medium">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                <span>Pesan / Chat</span>
                <span class="ml-auto bg-blue-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">2</span>
            </a>


            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Akun</p>

            <!-- Active Menu -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-xl transition-colors font-medium">
                <i data-lucide="user-circle" class="w-5 h-5"></i>
                <span>Profil Profesional</span>
            </a>
        </div>

        <div class="p-4 border-t border-gray-100">
            <div class="flex items-center space-x-3">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="h-10 w-10 rounded-full border border-gray-200 bg-gray-50">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-gray-900 truncate">Dr. Sekar Sari</p>
                    <p class="text-xs text-gray-500 truncate">Sp.KJ (Psikiater)</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-white">
        
        <!-- Header -->
        <header class="flex items-center justify-between h-20 px-6 md:px-10 shrink-0 border-b border-gray-50 bg-white z-20">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-50">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Profil Profesional 👨‍⚕️</h1>
                    <p class="text-sm text-gray-500">Kelola informasi publik dan pengaturan akun Anda.</p>
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50/50">
            
            <!-- Profile Banner -->
            <div class="h-48 bg-gradient-to-r from-blue-500 to-cyan-500 w-full relative">
                <div class="absolute bottom-4 right-6 text-white/90 text-sm flex items-center bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">
                    <i data-lucide="shield-check" class="w-4 h-4 mr-1.5"></i> Akun Terverifikasi
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-6 md:px-10 pb-10">
                
                <!-- Profile Header Card -->
                <div class="relative -mt-16 mb-8 flex flex-col md:flex-row items-end md:items-end">
                    <div class="relative mr-6 mb-4 md:mb-0">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="h-32 w-32 rounded-full border-4 border-white bg-white shadow-md object-cover">
                        <button class="absolute bottom-2 right-2 p-2 bg-white text-gray-600 border border-gray-200 rounded-full hover:text-blue-600 hover:border-blue-300 shadow-sm transition-colors" title="Ubah Foto">
                            <i data-lucide="camera" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <div class="flex-1 mb-2 text-center md:text-left">
                        <h2 class="text-2xl font-bold text-gray-900">Dr. Sekar Sari, Sp.KJ</h2>
                        <div class="flex flex-col md:flex-row items-center text-gray-600 mt-1 space-y-1 md:space-y-0 md:space-x-4">
                            <span class="flex items-center text-sm"><i data-lucide="briefcase" class="w-4 h-4 mr-1.5 text-blue-500"></i> Psikiater (10 Tahun Pengalaman)</span>
                            <span class="hidden md:inline text-gray-300">•</span>
                            <span class="flex items-center text-sm"><i data-lucide="map-pin" class="w-4 h-4 mr-1.5 text-red-500"></i> Jakarta Selatan</span>
                        </div>
                    </div>
                    <div class="flex space-x-3 mb-2">
                        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 text-sm font-medium shadow-sm transition-all flex items-center">
                            <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Bagikan Profil
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Left Column: Info & Stats -->
                    <div class="lg:col-span-1 space-y-6">
                        
                 
                        <!-- Contact Info -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                            <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                                <i data-lucide="contact" class="w-4 h-4 mr-2 text-blue-500"></i> Kontak & Info
                            </h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Email</p>
                                    <p class="text-sm font-medium text-gray-700">andi.pratama@healthmind.id</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Nomor STR</p>
                                    <p class="text-sm font-medium text-gray-700 font-mono bg-gray-50 inline-block px-2 py-1 rounded border border-gray-200">1234567890123456</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-semibold mb-1">Nomor SIP</p>
                                    <p class="text-sm font-medium text-gray-700 font-mono">503/001/SIP.D/2023</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: Tabs -->
                    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        
                        <!-- Tab Header -->
                        <div class="border-b border-gray-100">
                            <nav class="flex -mb-px">
                                <button onclick="switchTab('about')" id="tab-about" class="w-1/3 py-4 px-1 text-center border-b-2 border-blue-500 text-blue-600 font-medium text-sm transition-colors hover:text-blue-800">
                                    Tentang Saya
                                </button>
                                <button onclick="switchTab('edit')" id="tab-edit" class="w-1/3 py-4 px-1 text-center border-b-2 border-transparent text-gray-500 font-medium text-sm transition-colors hover:text-gray-700 hover:border-gray-300">
                                    Edit Profil
                                </button>
                            </nav>
                        </div>

                        <div class="p-6 md:p-8">
                            
                            <!-- TAB 1: TENTANG SAYA (Read Only) -->
                            <div id="content-about" class="tab-content active">
                                <div class="mb-6">
                                    <h3 class="text-lg font-bold text-gray-900 mb-3">Biografi Singkat</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">
                                        Saya adalah seorang Psikiater yang berdedikasi dengan pengalaman lebih dari 10 tahun dalam menangani berbagai masalah kesehatan mental, khususnya gangguan kecemasan, depresi, dan manajemen stres. Pendekatan saya menggabungkan terapi medis dengan konseling suportif untuk membantu pasien mencapai kesejahteraan mental yang optimal.
                                    </p>
                                </div>

                                <div class="mb-6">
                                    <h3 class="text-lg font-bold text-gray-900 mb-3">Spesialisasi & Keahlian</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium border border-blue-100">Gangguan Kecemasan</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium border border-blue-100">Depresi Mayor</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium border border-blue-100">Psikosomatis</span>
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium border border-blue-100">Terapi Kognitif Perilaku (CBT)</span>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-3">Pendidikan</h3>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <div class="mt-1.5 w-1.5 h-1.5 bg-gray-400 rounded-full mr-3 flex-shrink-0"></div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-800">Spesialis Kedokteran Jiwa (Sp.KJ)</p>
                                                <p class="text-xs text-gray-500">Universitas Indonesia, 2015</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="mt-1.5 w-1.5 h-1.5 bg-gray-400 rounded-full mr-3 flex-shrink-0"></div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-800">Dokter Umum (dr.)</p>
                                                <p class="text-xs text-gray-500">Universitas Gadjah Mada, 2010</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- TAB 2: EDIT PROFIL (Form) -->
                            <div id="content-edit" class="tab-content">
                                <form>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap & Gelar</label>
                                            <input type="text" value="Dr. Sekar Sari, Sp.KJ" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition-shadow">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Spesialisasi Utama</label>
                                            <select class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white transition-shadow">
                                                <option selected>Psikiater (Sp.KJ)</option>
                                                <option>Psikolog Klinis Dewasa</option>
                                                <option>Psikolog Klinis Anak</option>
                                            </select>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio Singkat</label>
                                            <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition-shadow">Saya adalah seorang Psikiater yang berdedikasi dengan pengalaman lebih dari 10 tahun dalam menangani berbagai masalah kesehatan mental, khususnya gangguan kecemasan, depresi, dan manajemen stres.</textarea>
                                            <p class="text-xs text-gray-400 mt-1 text-right">Maks. 500 karakter</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                                            <input type="text" value="0812-3456-7890" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition-shadow">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Praktik (Kota)</label>
                                            <input type="text" value="Jakarta Selatan" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition-shadow">
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-4 border-t border-gray-100">
                                        <button type="button" class="px-6 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 text-sm font-medium transition-colors shadow-sm">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- TAB 3: KEAMANAN -->


                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- Scripts -->
    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        function switchTab(tabName) {
            // Hide all
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('nav button').forEach(el => {
                el.classList.remove('border-blue-500', 'text-blue-600');
                el.classList.add('border-transparent', 'text-gray-500');
            });

            // Show selected
            document.getElementById('content-' + tabName).classList.add('active');
            
            const activeBtn = document.getElementById('tab-' + tabName);
            activeBtn.classList.remove('border-transparent', 'text-gray-500');
            activeBtn.classList.add('border-blue-500', 'text-blue-600');
        }
    </script>
</body>
</html>