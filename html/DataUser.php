<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - HealthMind Admin</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
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
            
                <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-orange-50 text-orange-600 border-r-4 border-orange-600 transition-colors">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Manajemen User</span>
                </a>

                <a href="DataPasien.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
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
                <h1 class="text-xl font-bold text-gray-800 hidden md:block">Akun Pengguna Sistem</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                     <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                     <input type="text" placeholder="Cari username atau email..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 w-64 bg-gray-50">
                </div>
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" alt="Profile" class="h-9 w-9 rounded-full border-2 border-orange-100">
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
                            <li class="flex items-center"><a href="#" class="hover:text-orange-500">Dashboard</a> <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i></li>
                            <li class="text-gray-800 font-medium">Manajemen User</li>
                        </ol>
                    </nav>
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Pengguna</h2>
                </div>
                <div class="flex space-x-2 w-full md:w-auto">
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 text-sm shadow-sm font-medium transition-all">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i> Filter Role
                    </button>
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 text-sm shadow-md font-medium transition-all">
                        <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Tambah User Baru
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center flex-wrap gap-4">
                   <div class="flex items-center gap-2">
                       <span class="text-sm text-gray-500">Tampilkan</span>
                       <select class="border-gray-300 border rounded text-sm px-2 py-1 focus:ring-orange-500 focus:border-orange-500">
                           <option>10</option>
                           <option>25</option>
                       </select>
                   </div>
                </div>

                <div class="table-responsive">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 w-16 text-center">#</th>
                                <th class="px-6 py-4 border-b border-gray-100">ID User</th>
                                <th class="px-6 py-4 border-b border-gray-100">Username</th>
                                <th class="px-6 py-4 border-b border-gray-100">Email</th>
                                <th class="px-6 py-4 border-b border-gray-100">Role</th>
                                <th class="px-6 py-4 border-b border-gray-100">Password</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-center">Status</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            
                            <!-- User 1: Admin -->
                            <tr class="hover:bg-orange-50/30 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <div class="h-8 w-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mx-auto">
                                        <i data-lucide="shield" class="w-4 h-4"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">USR-001</td>
                                <td class="px-6 py-4 font-bold text-gray-900">super_admin</td>
                                <td class="px-6 py-4 text-gray-600">admin@healthmind.com</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                        Admin
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-400 tracking-widest text-xs">••••••••</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        
                                        <button class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- User 2: Dokter -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=DrAndi" class="h-8 w-8 rounded-full mx-auto border border-gray-200">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">USR-8821</td>
                                <td class="px-6 py-4 font-medium text-gray-900">dr.andi_spkj</td>
                                <td class="px-6 py-4 text-gray-600">andi.pratama@gmail.com</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-teal-100 text-teal-800 border border-teal-200">
                                        Dokter
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-400 tracking-widest text-xs">••••••••</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        
                                        <button class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded" title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- User 3: Pasien -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" class="h-8 w-8 rounded-full mx-auto border border-gray-200">
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">USR-8829</td>
                                <td class="px-6 py-4 font-medium text-gray-900">felix_cool</td>
                                <td class="px-6 py-4 text-gray-600">felix.siauw@yahoo.com</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        Pasien
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-400 tracking-widest text-xs">••••••••</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <button class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- User 4: Pasien Nonaktif -->
                            <tr class="bg-gray-50 opacity-75 hover:opacity-100 transition-opacity">
                                <td class="px-6 py-4 text-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center mx-auto text-gray-500">
                                        <i data-lucide="user-x" class="w-4 h-4"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">USR-9999</td>
                                <td class="px-6 py-4 font-medium text-gray-500 line-through">spammer_123</td>
                                <td class="px-6 py-4 text-gray-400">spam@bot.com</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                        Pasien
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-300 tracking-widest text-xs">••••••••</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-200 text-gray-600">
                                        Nonaktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-xs text-green-600 hover:text-green-800 border border-green-200 bg-white px-2 py-1 rounded">
                                        Aktifkan
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="p-4 border-t border-gray-100 bg-gray-50 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Menampilkan <span class="font-medium">4</span> dari <span class="font-medium">150</span> user
                    </div>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-1 border border-orange-500 bg-orange-500 text-white rounded-md text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">2</button>
                        <button class="px-3 py-1 border border-gray-200 rounded-md bg-white text-gray-600 hover:bg-gray-50 text-sm">Next</button>
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
    </script>
</body>
</html>