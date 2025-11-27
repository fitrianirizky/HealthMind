<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter - HealthMind</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Soft Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Soft Blue Card Background */
        .bg-soft-blue { background-color: #E9F3FF; }
        .text-soft-blue-dark { color: #2563EB; }
    </style>
</head>
<body class="bg-white text-gray-800 h-screen flex overflow-hidden">

    <div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

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
            
            <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-xl transition-colors font-medium">
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

            <a href="ProfilDokter.php" class="flex items-center space-x-3 px-4 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-600 rounded-xl transition-colors font-medium">
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
                <button class="text-gray-400 hover:text-red-500 transition-colors">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-white">
        
        <header class="flex items-center justify-between h-20 px-6 md:px-10 shrink-0">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-50">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Selamat Pagi, Dok! ☀️</h1>
                    <p class="text-sm text-gray-500">Anda memiliki <span class="font-bold text-blue-600">4 jadwal</span> konsultasi hari ini.</p>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center bg-green-50 px-3 py-1.5 rounded-full border border-green-100">
                    <span class="relative flex h-3 w-3 mr-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                    <span class="text-sm font-medium text-green-700">Online & Tersedia</span>
                </div>
                
                <button class="relative p-2 text-gray-400 hover:text-blue-600 transition-colors rounded-full hover:bg-gray-50">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                    <span class="absolute top-2 right-2 h-2.5 w-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto px-6 md:px-10 pb-10">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-soft-blue p-6 rounded-2xl flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Konsultasi Hari Ini</p>
                        <h3 class="text-3xl font-bold text-soft-blue-dark">4 Pasien</h3>
                    </div>
                    <div class="p-3 bg-white rounded-xl text-blue-600 shadow-sm">
                        <i data-lucide="video" class="w-6 h-6"></i>
                    </div>
                </div>
                
                <div class="bg-soft-blue p-6 rounded-2xl flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Pasien Minggu Ini</p>
                        <h3 class="text-3xl font-bold text-soft-blue-dark">28 Orang</h3>
                    </div>
                    <div class="p-3 bg-white rounded-xl text-blue-600 shadow-sm">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold text-gray-900">Jadwal Hari Ini</h2>
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">25 Nov 2025</span>
                    </div>

                    <div class="bg-white border-2 border-blue-100 rounded-2xl p-5 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 right-0 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-bl-xl">
                            SEDANG BERLANGSUNG
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-start space-x-4">
                                <div class="relative">
                                    <div class="h-14 w-14 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xl font-bold">
                                        <i data-lucide="venetian-mask" class="w-6 h-6"></i>
                                    </div>
                                    <span class="absolute bottom-0 right-0 h-4 w-4 bg-green-500 border-2 border-white rounded-full"></span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">User Anonim #882</h3>
                                    <p class="text-sm text-gray-500 mb-2">Keluhan: Panic Attack, Sulit Bernapas</p>
                                    <div class="flex items-center space-x-2 text-xs font-medium text-gray-500">
                                        <span class="flex items-center bg-gray-100 px-2 py-1 rounded-md"><i data-lucide="clock" class="w-3 h-3 mr-1"></i> 09:00 - 09:45</span>
                                        <span class="flex items-center bg-blue-50 text-blue-600 px-2 py-1 rounded-md"><i data-lucide="video" class="w-3 h-3 mr-1"></i> Video Call</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col space-y-2 min-w-[140px]">
                                <button class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-medium text-sm transition-all shadow-md flex items-center justify-center">
                                    <i data-lucide="video" class="w-4 h-4 mr-2"></i> Masuk Room
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 hover:shadow-md transition-shadow">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="h-12 w-12 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold">
                                    SW
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Sarah Wijaya</h3>
                                    <div class="flex items-center space-x-3 text-sm text-gray-500 mt-1">
                                        <span class="flex items-center"><i data-lucide="clock" class="w-3 h-3 mr-1 text-gray-400"></i> 10:00 - 10:45</span>
                                        <span class="h-1 w-1 bg-gray-300 rounded-full"></span>
                                        <span class="flex items-center"><i data-lucide="message-square" class="w-3 h-3 mr-1 text-gray-400"></i> Chat Konsultasi</span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-xl text-sm font-medium hover:bg-blue-100 transition-colors">
                                Mulai Chat
                            </button>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 hover:shadow-md transition-shadow">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="h-12 w-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold">
                                    BS
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Budi Santoso</h3>
                                    <div class="flex items-center space-x-3 text-sm text-gray-500 mt-1">
                                        <span class="flex items-center"><i data-lucide="clock" class="w-3 h-3 mr-1 text-gray-400"></i> 13:00 - 13:45</span>
                                        <span class="h-1 w-1 bg-gray-300 rounded-full"></span>
                                        <span class="flex items-center"><i data-lucide="video" class="w-3 h-3 mr-1 text-gray-400"></i> Video Call</span>
                                    </div>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-gray-50 text-gray-400 cursor-not-allowed rounded-xl text-sm font-medium border border-gray-100" disabled>
                                Belum Mulai
                            </button>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-5 text-white shadow-lg">
                        <h3 class="font-bold text-lg mb-2">Butuh Istirahat?</h3>
                        <p class="text-blue-100 text-sm mb-4">Anda bisa mengatur status ketersediaan Anda kapan saja.</p>
                        <button class="w-full py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg text-sm font-medium transition-colors border border-white/30">
                            Ubah Status Offline
                        </button>
                    </div>

                </div>

            </div>

        </main>
    </div>

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
    </script>
</body>
</html>