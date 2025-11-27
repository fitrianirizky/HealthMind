<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Jadwal Praktik - HealthMind Doc</title>
    
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
        
        /* Custom Checkbox Style */
        .day-checkbox:checked + div {
            background-color: #EFF6FF; /* blue-50 */
            border-color: #3B82F6; /* blue-500 */
            color: #2563EB; /* blue-600 */
        }
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
            
            <!-- Active Menu -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-xl transition-colors font-medium">
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
                    <h1 class="text-xl font-bold text-gray-900">Manajemen Jadwal Praktik 📅</h1>
                    <p class="text-sm text-gray-500">Atur ketersediaan waktu konsultasi Anda di sini.</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                    <i data-lucide="calendar-off" class="w-4 h-4 mr-2"></i> Set Libur/Cuti
                </button>
                <!-- Tombol Tambah Slot DIHAPUS sesuai permintaan -->
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-10 bg-gray-50/50">
            
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 items-start relative">
                
                <!-- Left Column: Add Schedule Form (Sticky Wrapper) -->
                <!-- PERUBAHAN: sticky diterapkan pada wrapper ini agar Form + Tips ikut scroll bersamaan -->
                <div class="lg:col-span-1 lg:sticky lg:top-6 space-y-6"> 
                    
                    <!-- Form Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="font-bold text-lg text-gray-900 mb-4">Tambah Jam Praktik</h2>
                        <form id="scheduleForm">
                            
                            <!-- Hari -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Hari</label>
                                <div class="grid grid-cols-4 gap-2">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Senin" class="day-checkbox sr-only" checked>
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Sen</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Selasa" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Sel</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Rabu" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Rab</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Kamis" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Kam</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Jumat" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Jum</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Sabtu" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium hover:bg-gray-50 transition-colors">Sab</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="day" value="Minggu" class="day-checkbox sr-only">
                                        <div class="px-2 py-2 rounded-lg border border-gray-200 text-center text-xs font-medium text-red-500 hover:bg-gray-50 transition-colors">Min</div>
                                    </label>
                                </div>
                            </div>

                            <!-- Jam -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Mulai</label>
                                    <input type="time" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="09:00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Selesai</label>
                                    <input type="time" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="12:00">
                                </div>
                            </div>

                            <!-- Metode -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Metode Konsultasi</label>
                                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                    <option>Video Call & Chat (Online)</option>
                                    <option>Hanya Chat</option>
                                    <option>Tatap Muka (Klinik/RS)</option>
                                </select>
                            </div>

                            <!-- Quota (Optional) -->
                            <div class="mb-6">
                                <label class="flex items-center justify-between text-sm font-medium text-gray-700 mb-2">
                                    Kuota Pasien
                                    <span class="text-xs text-gray-400 font-normal">Maks. pasien per sesi</span>
                                </label>
                                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                    <button type="button" class="px-3 py-2 bg-gray-50 hover:bg-gray-100 border-r border-gray-200">-</button>
                                    <input type="number" value="5" class="w-full text-center py-2 text-sm focus:outline-none" readonly>
                                    <button type="button" class="px-3 py-2 bg-gray-50 hover:bg-gray-100 border-l border-gray-200">+</button>
                                </div>
                            </div>

                            <button type="button" class="w-full py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors shadow-sm flex items-center justify-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Simpan Jadwal
                            </button>

                        </form>
                    </div>

                    <!-- Tips Card -->
                    <div class="bg-blue-50 rounded-2xl p-5 border border-blue-100">
                        <div class="flex items-start">
                            <i data-lucide="info" class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0"></i>
                            <div>
                                <h4 class="text-sm font-bold text-blue-800">Tips Pengaturan</h4>
                                <p class="text-xs text-blue-600 mt-1 leading-relaxed">
                                    Pastikan jeda antar sesi minimal 15 menit untuk istirahat. Jadwal yang disimpan akan langsung terlihat oleh pasien.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Schedule List -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Monday -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-800 flex items-center">
                                <span class="w-2 h-6 bg-blue-500 rounded-full mr-2"></span> Senin
                            </h3>
                            <button class="text-xs text-gray-400 hover:text-red-500">Hapus Semua</button>
                        </div>
                        <div class="space-y-3">
                            <!-- Slot Item -->
                            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between group hover:border-blue-300 transition-all">
                                <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                                    <div class="h-10 w-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                        <i data-lucide="video" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-base">09:00 - 12:00</h4>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            Video Call & Chat
                                            <span class="mx-2">•</span>
                                            <span class="text-green-600 bg-green-50 px-2 py-0.5 rounded text-xs font-medium">Kuota 5/5</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end space-x-3 pl-14 sm:pl-0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500"></div>
                                    </label>
                                    <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Slot Item -->
                            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between group hover:border-blue-300 transition-all">
                                <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                                    <div class="h-10 w-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                                        <i data-lucide="message-square" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-base">13:00 - 15:00</h4>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            Hanya Chat
                                            <span class="mx-2">•</span>
                                            <span class="text-green-600 bg-green-50 px-2 py-0.5 rounded text-xs font-medium">Kuota 10/10</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end space-x-3 pl-14 sm:pl-0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500"></div>
                                    </label>
                                    <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tuesday -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-800 flex items-center">
                                <span class="w-2 h-6 bg-gray-300 rounded-full mr-2"></span> Selasa
                            </h3>
                        </div>
                        <div class="bg-gray-50 border border-dashed border-gray-200 rounded-xl p-6 text-center">
                            <p class="text-sm text-gray-500 mb-2">Belum ada jadwal praktik untuk hari Selasa.</p>
                            <button class="text-sm text-blue-600 font-medium hover:underline">Tambahkan Sekarang</button>
                        </div>
                    </div>

                    <!-- Wednesday -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-800 flex items-center">
                                <span class="w-2 h-6 bg-blue-500 rounded-full mr-2"></span> Rabu
                            </h3>
                        </div>
                        <div class="space-y-3">
                             <!-- Slot Item (Inactive Example) -->
                             <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between group opacity-75">
                                <div class="flex items-start space-x-4 mb-3 sm:mb-0">
                                    <div class="h-10 w-10 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center shrink-0">
                                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-700 text-base line-through decoration-gray-400">08:00 - 11:00</h4>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            Tatap Muka (RS. Sehat)
                                            <span class="mx-2">•</span>
                                            <span class="text-red-500 text-xs font-medium">Nonaktif</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end space-x-3 pl-14 sm:pl-0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500"></div>
                                    </label>
                                    <button class="p-2 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="edit-2" class="w-4 h-4"></i>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-gray-50 rounded-lg transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- More dummy content to demonstrate scrolling -->
                     <!-- Thursday -->
                     <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-800 flex items-center">
                                <span class="w-2 h-6 bg-orange-500 rounded-full mr-2"></span> Kamis
                            </h3>
                        </div>
                        <div class="bg-gray-50 border border-dashed border-gray-200 rounded-xl p-6 text-center">
                            <p class="text-sm text-gray-500 mb-2">Belum ada jadwal praktik untuk hari Kamis.</p>
                            <button class="text-sm text-blue-600 font-medium hover:underline">Tambahkan Sekarang</button>
                        </div>
                    </div>

                     <!-- Friday -->
                     <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-bold text-gray-800 flex items-center">
                                <span class="w-2 h-6 bg-green-500 rounded-full mr-2"></span> Jumat
                            </h3>
                        </div>
                        <div class="bg-gray-50 border border-dashed border-gray-200 rounded-xl p-6 text-center">
                            <p class="text-sm text-gray-500 mb-2">Belum ada jadwal praktik untuk hari Jumat.</p>
                            <button class="text-sm text-blue-600 font-medium hover:underline">Tambahkan Sekarang</button>
                        </div>
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