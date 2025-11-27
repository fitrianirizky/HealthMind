<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Spesialisasi - HealthMind Admin</title>
    
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
        <div class="flex items-center justify-center h-16 border-b border-gray-100 px-6 shrink-0">
            <div class="flex items-center space-x-2 text-blue-600">
                <i data-lucide="activity" class="w-7 h-7"></i>
                <span class="text-xl font-bold tracking-tight">HealthMind<span class="text-gray-400">Admin</span></span>
            </div>
        </div>

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

                <!-- Menu Baru: Spesialisasi -->
                <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-cyan-50 text-cyan-600 border-r-4 border-cyan-600 transition-colors">
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
                <h1 class="text-xl font-bold text-gray-800 hidden md:block">Master Data: Spesialisasi</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                     <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                     <input type="text" placeholder="Cari spesialisasi..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 w-64 bg-gray-50">
                </div>
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" alt="Profile" class="h-9 w-9 rounded-full border-2 border-cyan-100">
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
                            <li class="flex items-center"><a href="#" class="hover:text-cyan-500">Dashboard</a> <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i></li>
                            <li class="text-gray-800 font-medium">Data Spesialisasi</li>
                        </ol>
                    </nav>
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Spesialisasi</h2>
                </div>
                <div class="flex space-x-2 w-full md:w-auto">
                    <button class="flex-1 md:flex-none flex items-center justify-center px-4 py-2 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 text-sm shadow-md font-medium transition-all">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Spesialisasi
                    </button>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="table-responsive">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 w-16">ID</th>
                                <th class="px-6 py-4 border-b border-gray-100">Nama Spesialisasi</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            
                            <!-- Row 1: Psikolog Klinis -->
                            <tr class="hover:bg-cyan-50/30 transition-colors">
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">SP-01</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Psikolog Klinis Dewasa</div>
                                  
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

                            <!-- Row 2: Psikolog Anak -->
                            <tr class="hover:bg-cyan-50/30 transition-colors">
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">SP-02</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Psikolog Klinis Anak</div>
                                    
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

                            <!-- Row 3: Psikiater -->
                            <tr class="hover:bg-cyan-50/30 transition-colors">
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">SP-03</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Psikiater</div>
                                  
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

                            <!-- Row 4: Konselor Pernikahan -->
                            <tr class="hover:bg-cyan-50/30 transition-colors">
                                <td class="px-6 py-4 font-mono text-gray-500 text-xs">SP-04</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Psikologi Pendidikan</div>
                                   
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

                        </tbody>
                    </table>
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