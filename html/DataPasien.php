<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien - HealthMind Admin</title>
    
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
        
        /* Table styles */
        .table-responsive { overflow-x: auto; }
        th { white-space: nowrap; }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex overflow-hidden">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar (Sama dengan Dashboard) -->
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
                <!-- Menu Pasien Aktif -->
                <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-blue-50 text-blue-600 border-r-4 border-blue-600 transition-colors">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Pasien</span>
                </a>
                <!-- Menu Dokter (Submenu) -->
                <div class="space-y-1">
                    <a href="DataDokter.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
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
                <h1 class="text-xl font-bold text-gray-800 hidden md:block">Manajemen Pasien</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                     <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                     <input 
                        type="text" 
                        placeholder="Cari pasien..." 
                        class="pl-10 pr-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64 bg-gray-50"
                     >
                </div>
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" alt="Profile" class="h-9 w-9 rounded-full border-2 border-blue-100">
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
                            <li class="flex items-center"><a href="#" class="hover:text-blue-500">Dashboard</a> <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i></li>
                            <li class="text-gray-800 font-medium">Data Pasien</li>
                        </ol>
                    </nav>
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Pasien Terdaftar</h2>
                </div>
                <div class="flex space-x-2 w-full md:w-auto">
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 text-sm shadow-sm font-medium transition-all">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i> Filter
                    </button>
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm shadow-md font-medium transition-all">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Tambah Pasien
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center flex-wrap gap-4">
                   <div class="flex items-center gap-2">
                       <span class="text-sm text-gray-500">Tampilkan</span>
                       <select class="border-gray-300 border rounded text-sm px-2 py-1 focus:ring-blue-500 focus:border-blue-500">
                           <option>10</option>
                           <option>25</option>
                           <option>50</option>
                       </select>
                       <span class="text-sm text-gray-500">data</span>
                   </div>
                   <div class="relative">
                       <input type="text" placeholder="Cari nama, kota, atau ID..." class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 w-full sm:w-64">
                       <i data-lucide="search" class="absolute left-3 top-2.5 text-gray-400 w-4 h-4"></i>
                   </div>
                </div>

                <div class="table-responsive">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 text-center w-16">Foto</th>
                                <th class="px-6 py-4 border-b border-gray-100">ID Pasien</th>
                                <th class="px-6 py-4 border-b border-gray-100">ID User</th>
                                <th class="px-6 py-4 border-b border-gray-100">Nama Lengkap</th>
                                <th class="px-6 py-4 border-b border-gray-100">Jenis Kelamin</th>
                                <th class="px-6 py-4 border-b border-gray-100">Tgl Lahir</th>
                                <th class="px-6 py-4 border-b border-gray-100">No. HP</th>
                                <th class="px-6 py-4 border-b border-gray-100">Kota</th>
                                <th class="px-6 py-4 border-b border-gray-100">Alamat</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm" id="tableBody">
                            <!-- Data Row 1 -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="Felix" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">#P-00123</td>
                                <td class="px-6 py-4 font-mono text-gray-400 text-xs">USR-8829</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">Felix Siauw</div>
                                    <div class="text-xs text-gray-400">Bergabung: 12 Jan 2024</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Laki-laki
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">15 Mei 1990</td>
                                <td class="px-6 py-4 text-gray-600">0812-3456-7890</td>
                                <td class="px-6 py-4 text-gray-600">Jakarta Selatan</td>
                                <td class="px-6 py-4 text-gray-500 max-w-xs truncate" title="Jl. Sudirman No. 45, Kebayoran Baru">Jl. Sudirman No. 45...</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-100 rounded transition" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-red-600 hover:bg-red-100 rounded transition" title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data Row 2 -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Sarah" alt="Sarah" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">#P-00124</td>
                                <td class="px-6 py-4 font-mono text-gray-400 text-xs">USR-8830</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">Sarah Wijaya</div>
                                    <div class="text-xs text-gray-400">Bergabung: 14 Jan 2024</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        Perempuan
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">22 Ags 1995</td>
                                <td class="px-6 py-4 text-gray-600">0819-9988-7766</td>
                                <td class="px-6 py-4 text-gray-600">Bandung</td>
                                <td class="px-6 py-4 text-gray-500 max-w-xs truncate" title="Komp. Setiabudi Regency Blok C2">Komp. Setiabudi...</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-100 rounded transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-red-600 hover:bg-red-100 rounded transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data Row 3 -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Budi" alt="Budi" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">#P-00125</td>
                                <td class="px-6 py-4 font-mono text-gray-400 text-xs">USR-8831</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">Budi Santoso</div>
                                    <div class="text-xs text-gray-400">Bergabung: 20 Jan 2024</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Laki-laki
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">10 Nov 1988</td>
                                <td class="px-6 py-4 text-gray-600">0857-1231-2312</td>
                                <td class="px-6 py-4 text-gray-600">Surabaya</td>
                                <td class="px-6 py-4 text-gray-500 max-w-xs truncate" title="Jl. Pemuda No. 10">Jl. Pemuda No. 10</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-100 rounded transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-red-600 hover:bg-red-100 rounded transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Data Row 4 -->
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Maya" alt="Maya" class="w-10 h-10 rounded-full border border-gray-200 mx-auto object-cover bg-white">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">#P-00126</td>
                                <td class="px-6 py-4 font-mono text-gray-400 text-xs">USR-8835</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">Maya Putri</div>
                                    <div class="text-xs text-gray-400">Bergabung: 22 Jan 2024</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        Perempuan
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">03 Des 2000</td>
                                <td class="px-6 py-4 text-gray-600">0813-5555-4444</td>
                                <td class="px-6 py-4 text-gray-600">Yogyakarta</td>
                                <td class="px-6 py-4 text-gray-500 max-w-xs truncate" title="Jl. Malioboro No. 12">Jl. Malioboro No. 12</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="p-1.5 text-blue-600 hover:bg-blue-100 rounded transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-red-600 hover:bg-red-100 rounded transition">
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
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">4</span> dari <span class="font-medium">120</span> data
                    </div>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-1 border border-blue-500 bg-blue-500 text-white rounded-md text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">2</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">3</button>
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
        // Initialize Icons
        lucide.createIcons();

        // Sidebar Toggle Logic
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