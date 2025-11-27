<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokter - HealthMind Admin</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .table-responsive { overflow-x: auto; }
        th { white-space: nowrap; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex overflow-hidden">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 flex flex-col">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 border-b border-gray-100 px-6 shrink-0">
            <div class="flex items-center space-x-2 text-blue-600">
                <i data-lucide="activity" class="w-7 h-7"></i>
                <span class="text-xl font-bold tracking-tight">HealthMind<span class="text-gray-400">Admin</span></span>
            </div>
        </div>

        <!-- Menu -->
        <div class="py-6 overflow-y-auto flex-1">
            <div class="px-6 mb-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Utama</div>
            <nav class="space-y-1">
                <a href="DashboardAdmin.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                <a href="DataUser.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Manajemen User</span>
                </a>
                <a href="DataPasien.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Pasien</span>
                </a>
                <!-- Menu Dokter (Submenu) -->
                <div class="space-y-1">
                    <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-teal-50 text-teal-600 border-r-4 border-teal-600 transition-colors">
                    <i data-lucide="stethoscope" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Psikolog / Dokter</span>
                </a>
                    <!-- Menu Verifikasi Aktif -->
                    <a href="VerifikasiDokter.php" 
                        class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                            <i data-lucide="shield-alert" class="w-5 h-5"></i>
                            <span class="font-medium text-sm">Verifikasi Dokter</span>
                            <span class="ml-auto bg-orange-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
                        </a>
                </div>
                <a href="Kategori.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="tag" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Kategori Masalah</span>
                </a>
                <a href="Spesialisasi.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="award" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Data Spesialisasi</span>
                </a>

            </nav>

        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Header -->
        <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-100 shadow-sm shrink-0 z-10">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none lg:hidden mr-4 p-1 rounded hover:bg-gray-100">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h1 class="text-xl font-bold text-gray-800 hidden md:block">Manajemen Dokter</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                     <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                     <input type="text" placeholder="Cari dokter, spesialis..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 w-64 bg-gray-50">
                </div>
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" alt="Profile" class="h-9 w-9 rounded-full border-2 border-teal-100">
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            
            <!-- Breadcrumb & Actions -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <div class="mb-4 md:mb-0">
                    <nav class="text-sm mb-1 text-gray-500">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center"><a href="#" class="hover:text-teal-500">Dashboard</a> <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i></li>
                            <li class="text-gray-800 font-medium">Data Dokter</li>
                        </ol>
                    </nav>
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Dokter & Spesialis</h2>
                </div>
                <div class="flex space-x-2 w-full md:w-auto">
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 text-sm shadow-sm font-medium transition-all">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i> Filter
                    </button>
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 text-sm shadow-md font-medium transition-all">
                        <i data-lucide="plus-circle" class="w-4 h-4 mr-2"></i> Tambah Dokter
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center flex-wrap gap-4">
                   <div class="flex items-center gap-2">
                       <span class="text-sm text-gray-500">Show</span>
                       <select class="border-gray-300 border rounded text-sm px-2 py-1 focus:ring-teal-500 focus:border-teal-500">
                           <option>10</option>
                           <option>25</option>
                       </select>
                   </div>
                   <div class="relative">
                       <input type="text" placeholder="Cari nama, STR, atau ID..." class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-teal-500 focus:border-teal-500 w-full sm:w-64">
                       <i data-lucide="search" class="absolute left-3 top-2.5 text-gray-400 w-4 h-4"></i>
                   </div>
                </div>

                <div class="table-responsive">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 text-center w-16">Foto</th>
                                <th class="px-6 py-4 border-b border-gray-100">Info ID</th>
                                <th class="px-6 py-4 border-b border-gray-100">Nama & Spesialisasi</th>
                                <th class="px-6 py-4 border-b border-gray-100">Kontak</th>
                                <th class="px-6 py-4 border-b border-gray-100">Legalitas (STR/SIP)</th>
                                <th class="px-6 py-4 border-b border-gray-100">Deskripsi & Pengalaman</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-center">Dokumen</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            
                            <!-- Dokter 1 -->
                            <tr class="hover:bg-teal-50/30 transition-colors group">
                                <td class="px-6 py-4 text-center align-top">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" alt="Dr. Andi" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-mono text-gray-500" title="ID Dokter">DOC-001</span>
                                        <span class="text-[10px] font-mono text-gray-400" title="ID User">USR-8821</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="font-bold text-gray-900">Dr. Sekar Sari, Sp.KJ</div>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-teal-100 text-teal-800">
                                            Psikiater (ID: SP-01)
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1 flex items-center">
                                        <i data-lucide="user" class="w-3 h-3 mr-1"></i> Laki-laki
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="flex items-center text-gray-600 mb-1">
                                        <i data-lucide="phone" class="w-3 h-3 mr-2 text-teal-500"></i> 0812-9988-7766
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="text-xs text-gray-600">
                                        <div class="font-medium text-gray-700">STR:</div>
                                        <div class="font-mono mb-1">1234567890123456</div>
                                        <div class="font-medium text-gray-700">SIP:</div>
                                        <div class="font-mono">503/001/SIP.D/2023</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="text-xs font-semibold text-gray-700 mb-1">10 Tahun Pengalaman</div>
                                    <div class="text-xs text-gray-500 truncate max-w-[150px]" title="Spesialis kesehatan jiwa dengan fokus pada penanganan depresi, kecemasan, dan trauma masa lalu.">
                                        Spesialis kesehatan jiwa dengan fokus pada penanganan depresi...
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top text-center">
                                    <div class="flex justify-center space-x-1">
                                        <button class="p-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition" title="Lihat Ijazah">
                                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 bg-green-50 text-green-600 rounded hover:bg-green-100 transition" title="Lihat Dokumen STR">
                                            <i data-lucide="file-check" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 bg-purple-50 text-purple-600 rounded hover:bg-purple-100 transition" title="Lihat Dokumen SIP">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-teal-600 hover:text-teal-800" title="Edit Data">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800" title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Dokter 2 -->
                            <tr class="hover:bg-teal-50/30 transition-colors group">
                                <td class="px-6 py-4 text-center align-top">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrSiti" alt="Dr. Siti" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-mono text-gray-500">DOC-002</span>
                                        <span class="text-[10px] font-mono text-gray-400">USR-8825</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="font-bold text-gray-900">Dr. Siti Aminah, M.Psi</div>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-pink-100 text-pink-800">
                                            Psikolog Klinis (ID: SP-02)
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1 flex items-center">
                                        <i data-lucide="user" class="w-3 h-3 mr-1"></i> Perempuan
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="flex items-center text-gray-600 mb-1">
                                        <i data-lucide="phone" class="w-3 h-3 mr-2 text-teal-500"></i> 0815-5566-7788
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="text-xs text-gray-600">
                                        <div class="font-medium text-gray-700">STR:</div>
                                        <div class="font-mono mb-1">9876543210987654</div>
                                        <div class="font-medium text-gray-700">SIP:</div>
                                        <div class="font-mono">503/055/SIP.P/2023</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="text-xs font-semibold text-gray-700 mb-1">5 Tahun Pengalaman</div>
                                    <div class="text-xs text-gray-500 truncate max-w-[150px]" title="Fokus pada tumbuh kembang anak dan konseling keluarga.">
                                        Fokus pada tumbuh kembang anak dan konseling keluarga.
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top text-center">
                                    <div class="flex justify-center space-x-1">
                                        <button class="p-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition" title="Lihat Ijazah">
                                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 bg-green-50 text-green-600 rounded hover:bg-green-100 transition" title="Lihat Dokumen STR">
                                            <i data-lucide="file-check" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 bg-purple-50 text-purple-600 rounded hover:bg-purple-100 transition" title="Lihat Dokumen SIP">
                                            <i data-lucide="file-text" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-teal-600 hover:text-teal-800">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="p-4 border-t border-gray-100 bg-gray-50 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">2</span> dari <span class="font-medium">45</span> dokter
                    </div>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-1 border border-teal-500 bg-teal-500 text-white rounded-md text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">2</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">Next</button>
                    </div>
                </div>
            </div>

            <div class="text-center text-xs text-gray-400 mt-8 mb-4">
                &copy; 2025 HealthMind Admin Dashboard.
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
    </script>
</body>
</html>