<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Konsultasi - HealthMind Doc</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Custom Scrollbar for Chat */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        
        .chat-scroll::-webkit-scrollbar { width: 4px; }
        .chat-scroll::-webkit-scrollbar-track { background: transparent; }
        .chat-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        
        .bg-pattern {
            background-image: radial-gradient(#E0E7FF 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex overflow-hidden">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- 1. Sidebar Utama (Navigasi) -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-100 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col shrink-0">
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

            <!-- Menu Baru: Chat Aktif -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-xl transition-colors font-medium">
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
                    <p class="text-xs text-gray-500 truncate">Online</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- 2. Layout Chat Area -->
    <div class="flex-1 flex flex-col min-w-0 bg-white overflow-hidden">
        
        <!-- Header Mobile (Only visible on small screens) -->
        <header class="lg:hidden flex items-center justify-between h-16 px-4 border-b border-gray-200 bg-white shrink-0">
            <button onclick="toggleSidebar()" class="text-gray-500 p-2 rounded-lg hover:bg-gray-50">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="font-bold text-gray-800">Chat Konsultasi</h1>
            <div class="w-10"></div> <!-- Spacer -->
        </header>

        <div class="flex-1 flex overflow-hidden">
            
            <!-- A. Chat List (Sidebar Kiri Chat) -->
            <aside class="w-full md:w-80 border-r border-gray-200 flex flex-col bg-white md:flex z-0" id="chatListSidebar">
                
                <!-- Search & Header -->
                <div class="p-4 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 hidden md:block">Pesan Masuk</h2>
                    <div class="relative">
                        <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                        <input type="text" placeholder="Cari pasien..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                    </div>
                </div>

                <!-- List Container -->
                <div class="flex-1 overflow-y-auto chat-scroll">
                    
                    <!-- Item 1: Anonim (Active) -->
                    <div onclick="openChat('anon')" class="p-4 border-b border-gray-50 hover:bg-blue-50 cursor-pointer transition-colors bg-blue-50/60 border-l-4 border-l-blue-600">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center space-x-3">
                                <!-- Icon Anonim (Mask/User) -->
                                <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center border border-indigo-200 relative">
                                    <i data-lucide="venetian-mask" class="w-5 h-5"></i>
                                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">User Anonim #992</h3>
                                    <span class="text-[10px] bg-gray-200 text-gray-600 px-1.5 py-0.5 rounded font-medium">Privasi</span>
                                </div>
                            </div>
                            <span class="text-xs text-blue-600 font-semibold">10:30</span>
                        </div>
                        <div class="pl-[52px]">
                            <p class="text-xs text-gray-900 font-medium truncate">Dok, saya merasa dada sesak kalau...</p>
                            <span class="inline-flex mt-2 items-center px-2 py-0.5 rounded text-[10px] font-medium bg-red-100 text-red-600">
                                Konsultasi Aktif (15m sisa)
                            </span>
                        </div>
                    </div>

                    <!-- Item 2: Sarah Wijaya -->
                    <div onclick="openChat('sarah')" class="p-4 border-b border-gray-50 hover:bg-gray-50 cursor-pointer transition-colors border-l-4 border-l-transparent">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center space-x-3">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" class="h-10 w-10 rounded-full border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">Sarah Wijaya</h3>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">09:15</span>
                        </div>
                        <div class="pl-[52px]">
                            <p class="text-xs text-gray-500 truncate">Terima kasih dok atas sarannya tadi.</p>
                        </div>
                    </div>

                    <!-- Item 3: Budi -->
                    <div onclick="openChat('budi')" class="p-4 border-b border-gray-50 hover:bg-gray-50 cursor-pointer transition-colors border-l-4 border-l-transparent">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center space-x-3">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Budi" class="h-10 w-10 rounded-full border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900">Budi Santoso</h3>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">Kemarin</span>
                        </div>
                        <div class="pl-[52px]">
                            <p class="text-xs text-gray-500 truncate">Resep obatnya sudah saya tebus dok.</p>
                        </div>
                    </div>

                </div>
            </aside>

            <!-- B. Chat Window (Main Area) -->
            <main class="flex-1 flex flex-col bg-gray-50 relative w-full h-full hidden md:flex" id="chatWindow">
                
                <!-- Chat Header -->
                <div class="h-16 px-6 bg-white border-b border-gray-200 flex items-center justify-between shrink-0 shadow-sm z-10">
                    <div class="flex items-center">
                        <button class="md:hidden mr-4 text-gray-500" onclick="backToList()">
                            <i data-lucide="arrow-left" class="w-6 h-6"></i>
                        </button>
                        <!-- Profile Anonim -->
                        <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center border border-indigo-200 mr-3">
                            <i data-lucide="venetian-mask" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 flex items-center">
                                User Anonim #992
                                <i data-lucide="shield-check" class="w-3 h-3 text-green-500 ml-1.5" title="Verified Anonymous"></i>
                            </h3>
                            <p class="text-xs text-green-600 flex items-center">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                Online • Sedang mengetik...
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <div class="hidden md:block text-right mr-4">
                            <p class="text-xs text-gray-400 uppercase font-semibold">Sisa Waktu</p>
                            <p class="text-sm font-mono font-bold text-red-500">14:32</p>
                        </div>
                        <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-gray-100 rounded-lg" title="Video Call">
                            <i data-lucide="video" class="w-5 h-5"></i>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-gray-100 rounded-lg" onclick="toggleInfoPanel()" title="Info Pasien">
                            <i data-lucide="info" class="w-5 h-5"></i>
                        </button>
                        <button class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg text-xs font-bold border border-red-100 transition-colors">
                            Akhiri Sesi
                        </button>
                    </div>
                </div>

                <!-- Chat Messages (Body) -->
                <div class="flex-1 overflow-y-auto p-6 chat-scroll bg-pattern space-y-6">
                    
                    <div class="flex justify-center">
                        <span class="text-xs text-gray-400 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">Hari Ini, 10:30</span>
                    </div>

                    <!-- System Message -->
                    <div class="flex justify-center">
                        <div class="bg-yellow-50 text-yellow-800 text-xs px-4 py-2 rounded-lg border border-yellow-100 flex items-center max-w-md text-center">
                            <i data-lucide="lock" class="w-3 h-3 mr-2 flex-shrink-0"></i>
                            Pasien menggunakan mode Anonim. Identitas asli (Nama, Foto, No HP) disembunyikan demi privasi.
                        </div>
                    </div>

                    <!-- Chat Bubble: Patient -->
                    <div class="flex items-end justify-start">
                        <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0 mr-2 border border-indigo-200">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <div class="max-w-[80%] md:max-w-[60%] bg-white border border-gray-200 p-3 rounded-2xl rounded-bl-none shadow-sm">
                            <p class="text-sm text-gray-800">Selamat pagi Dok. Saya butuh bantuan.</p>
                            <span class="text-[10px] text-gray-400 block mt-1">10:30</span>
                        </div>
                    </div>

                    <!-- Chat Bubble: Doctor (You) -->
                    <div class="flex items-end justify-end">
                        <div class="max-w-[80%] md:max-w-[60%] bg-blue-600 text-white p-3 rounded-2xl rounded-br-none shadow-sm">
                            <p class="text-sm">Selamat pagi. Saya dr. Andi. Silakan ceritakan apa yang sedang Anda rasakan saat ini?</p>
                            <span class="text-[10px] text-blue-200 block mt-1 text-right">10:31 • Dibaca</span>
                        </div>
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="h-8 w-8 rounded-full border border-gray-200 ml-2 bg-white">
                    </div>

                    <!-- Chat Bubble: Patient -->
                    <div class="flex items-end justify-start">
                        <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0 mr-2 border border-indigo-200">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <div class="max-w-[80%] md:max-w-[60%] bg-white border border-gray-200 p-3 rounded-2xl rounded-bl-none shadow-sm">
                            <p class="text-sm text-gray-800">Akhir-akhir ini saya sering merasa cemas berlebihan tanpa sebab yang jelas. Dada terasa sesak dan sulit tidur.</p>
                            <span class="text-[10px] text-gray-400 block mt-1">10:32</span>
                        </div>
                    </div>

                    <!-- Typing Indicator -->
                    <div class="flex items-end justify-start">
                        <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0 mr-2 opacity-50">
                            <i data-lucide="more-horizontal" class="w-4 h-4 animate-pulse"></i>
                        </div>
                    </div>

                </div>

                <!-- Input Area -->
                <div class="p-4 bg-white border-t border-gray-200 shrink-0">
                    <div class="flex items-end space-x-2">
                        <button class="p-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-colors">
                            <i data-lucide="paperclip" class="w-5 h-5"></i>
                        </button>
                        <div class="flex-1 bg-gray-50 border border-gray-200 rounded-xl flex items-center px-2">
                            <textarea rows="1" class="w-full bg-transparent border-none focus:ring-0 text-sm text-gray-800 placeholder-gray-400 py-3 px-2 resize-none" placeholder="Ketik pesan balasan..."></textarea>
                            <button class="p-2 text-gray-400 hover:text-blue-600">
                                <i data-lucide="smile" class="w-5 h-5"></i>
                            </button>
                        </div>
                        <button class="p-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-md transition-transform active:scale-95">
                            <i data-lucide="send" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>

            </main>

            <!-- C. Info Panel (Sidebar Kanan - Optional) -->

        </div>
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

        // Mobile Chat Logic
        function openChat(id) {
            if (window.innerWidth < 768) {
                document.getElementById('chatListSidebar').classList.add('hidden');
                document.getElementById('chatWindow').classList.remove('hidden');
                document.getElementById('chatWindow').classList.add('flex');
            }
            // In real app, load chat data based on ID
        }

        function backToList() {
            document.getElementById('chatListSidebar').classList.remove('hidden');
            document.getElementById('chatWindow').classList.add('hidden');
            document.getElementById('chatWindow').classList.remove('flex');
        }

        function toggleInfoPanel() {
            const panel = document.getElementById('infoPanel');
            panel.classList.toggle('hidden');
            panel.classList.toggle('flex');
        }
    </script>
</body>
</html>