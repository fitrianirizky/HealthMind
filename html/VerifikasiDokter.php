<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Dokter - HealthMind Admin</title>
    
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
        
        /* Modal Animation */
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow-x: hidden; overflow-y: hidden !important; }
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
                    <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-orange-50 text-orange-600 border-r-4 border-orange-600 transition-colors">
                        <i data-lucide="shield-alert" class="w-5 h-5"></i>
                        <span class="font-medium text-sm">Verifikasi Dokter</span>
                        <span class="ml-auto bg-orange-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
                    </a>
                </div>

                <a href="Kategori.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                    <i data-lucide="tags" class="w-5 h-5"></i>
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
                <h1 class="text-xl font-bold text-gray-800 hidden md:block">Verifikasi Pendaftaran Dokter</h1>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                     <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                     <input type="text" placeholder="Cari nama pelamar..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 w-64 bg-gray-50">
                </div>
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" alt="Profile" class="h-9 w-9 rounded-full border-2 border-orange-100">
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            
            <!-- Alert Info -->
            <div class="bg-orange-50 border-l-4 border-orange-500 p-4 mb-6 rounded-r shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i data-lucide="alert-circle" class="h-5 w-5 text-orange-600"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-orange-700">
                            <span class="font-bold">Perhatian Admin:</span> Pastikan memeriksa keaslian dokumen STR dan SIP sebelum melakukan verifikasi. Dokter yang disetujui akan langsung aktif dan dapat menerima pasien.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                   <h3 class="text-lg font-bold text-gray-800">Antrean Verifikasi (3 Dokter)</h3>
                   <div class="flex gap-2">
                       <button class="p-2 text-gray-500 hover:bg-gray-100 rounded-lg" title="Refresh">
                           <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                       </button>
                   </div>
                </div>

                <div class="table-responsive">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-gray-100 text-center w-16">Foto</th>
                                <th class="px-6 py-4 border-b border-gray-100">Nama Dokter</th>
                                <th class="px-6 py-4 border-b border-gray-100">Email & Kontak</th>
                                <th class="px-6 py-4 border-b border-gray-100">Spesialisasi</th>
                                <th class="px-6 py-4 border-b border-gray-100">Tanggal Daftar</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-center">Status</th>
                                <th class="px-6 py-4 border-b border-gray-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            
                            <!-- Row 1: Dr. Budi -->
                            <tr class="hover:bg-orange-50/20 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=BudiNew" class="w-10 h-10 rounded-full border border-gray-200 mx-auto bg-white">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Dr. Budi Santoso</div>
                                    <div class="text-xs text-gray-500">ID Reg: REG-0092</div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <div>budi.s@gmail.com</div>
                                    <div class="text-xs text-gray-400">0812-3333-4444</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                        Psikolog Klinis
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">25 Nov 2025</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Pending Review
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button onclick="openModal()" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                                        <i data-lucide="file-text" class="w-3 h-3 mr-1.5"></i> Lihat Detail
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 2: Dr. Rini -->
                            <tr class="hover:bg-orange-50/20 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=RiniNew" class="w-10 h-10 rounded-full border border-gray-200 mx-auto bg-white">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Dr. Rini Wulandari, Sp.KJ</div>
                                    <div class="text-xs text-gray-500">ID Reg: REG-0093</div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <div>rini.w@yahoo.com</div>
                                    <div class="text-xs text-gray-400">0813-5555-6666</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">
                                        Psikiater
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">24 Nov 2025</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Pending Review
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                                        <i data-lucide="file-text" class="w-3 h-3 mr-1.5"></i> Lihat Detail
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 3: Sarah (Konselor) -->
                            <tr class="hover:bg-orange-50/20 transition-colors">
                                <td class="px-6 py-4 text-center">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=SarahNew" class="w-10 h-10 rounded-full border border-gray-200 mx-auto bg-white">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900">Sarah Amalia, M.Psi</div>
                                    <div class="text-xs text-gray-500">ID Reg: REG-0095</div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <div>sarah.amalia@gmail.com</div>
                                    <div class="text-xs text-gray-400">0857-9999-8888</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                        Konselor
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">23 Nov 2025</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Pending Review
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition">
                                        <i data-lucide="file-text" class="w-3 h-3 mr-1.5"></i> Lihat Detail
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- Modal Verifikasi -->
    <div id="verifyModal" class="fixed inset-0 z-50 hidden opacity-0 pointer-events-none transition-opacity duration-300">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-50 transition-opacity" onclick="closeModal()"></div>
        
        <!-- Modal Panel -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden transform transition-all scale-95 duration-300 flex flex-col max-h-[90vh]" id="modalPanel">
            
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50 shrink-0">
                <h3 class="text-lg font-bold text-gray-900">Detail Pendaftaran Dokter</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 rounded-lg p-1 hover:bg-gray-200 transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            
            <!-- Body (Scrollable) -->
            <div class="p-6 overflow-y-auto">
                
                <!-- Profile Section -->
                <div class="flex items-start gap-6 mb-8">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=BudiNew" class="w-20 h-20 rounded-full border-4 border-gray-100 bg-white shadow-sm">
                    <div class="flex-1">
                        <h2 class="text-xl font-bold text-gray-900">Dr. Budi Santoso, M.Psi</h2>
                        <p class="text-blue-600 font-medium text-sm">Psikolog Klinis</p>
                        <div class="grid grid-cols-2 gap-4 mt-4 text-sm">
                            <div>
                                <span class="text-gray-500 block text-xs uppercase tracking-wider font-semibold">Email</span>
                                <span class="text-gray-800">budi.s@gmail.com</span>
                            </div>
                            <div>
                                <span class="text-gray-500 block text-xs uppercase tracking-wider font-semibold">Telepon</span>
                                <span class="text-gray-800">0812-3333-4444</span>
                            </div>
                            <div>
                                <span class="text-gray-500 block text-xs uppercase tracking-wider font-semibold">Lulusan</span>
                                <span class="text-gray-800">Univ. Indonesia (2018)</span>
                            </div>
                            <div>
                                <span class="text-gray-500 block text-xs uppercase tracking-wider font-semibold">Pengalaman</span>
                                <span class="text-gray-800">5 Tahun</span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 mb-6">

                <!-- Documents Section -->
                <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                    <i data-lucide="file-check" class="w-4 h-4 mr-2 text-orange-500"></i> Dokumen Legalitas
                </h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <!-- STR -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition cursor-pointer group">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-2">
                                <div class="bg-red-50 text-red-600 p-2 rounded-lg group-hover:bg-red-100 transition">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Surat Tanda Registrasi (STR)</p>
                                    <p class="text-xs text-gray-500">str_budi_2025.pdf</p>
                                </div>
                            </div>
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400 hover:text-blue-600"></i>
                        </div>
                        <div class="bg-gray-50 p-2 rounded text-xs font-mono text-gray-600 border border-gray-200">
                            No: 1234567890123456
                        </div>
                    </div>

                    <!-- SIP -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition cursor-pointer group">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center gap-2">
                                <div class="bg-blue-50 text-blue-600 p-2 rounded-lg group-hover:bg-blue-100 transition">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Surat Izin Praktik (SIP)</p>
                                    <p class="text-xs text-gray-500">sip_budi_2025.pdf</p>
                                </div>
                            </div>
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400 hover:text-blue-600"></i>
                        </div>
                        <div class="bg-gray-50 p-2 rounded text-xs font-mono text-gray-600 border border-gray-200">
                            No: 503/001/SIP.D/2023
                        </div>
                    </div>

                    <!-- KTP -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition cursor-pointer group">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="bg-gray-100 text-gray-600 p-2 rounded-lg group-hover:bg-gray-200 transition">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Scan KTP</p>
                                    <p class="text-xs text-gray-500">ktp_scan.jpg</p>
                                </div>
                            </div>
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400 hover:text-blue-600"></i>
                        </div>
                    </div>

                    <!-- Ijazah -->
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition cursor-pointer group">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="bg-purple-50 text-purple-600 p-2 rounded-lg group-hover:bg-purple-100 transition">
                                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">Ijazah Terakhir</p>
                                    <p class="text-xs text-gray-500">ijazah_s2_ui.pdf</p>
                                </div>
                            </div>
                            <i data-lucide="eye" class="w-4 h-4 text-gray-400 hover:text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <!-- Resume -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <h4 class="text-xs font-bold text-gray-500 uppercase mb-2">Resume Singkat</h4>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        Saya berpengalaman menangani kasus depresi dan gangguan kecemasan pada remaja dan dewasa muda. Sebelumnya praktik di RSUD Jakarta selama 3 tahun. Memiliki sertifikasi CBT dan Mindfulness Therapy.
                    </p>
                </div>

            </div>

            <!-- Footer Actions -->
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex justify-between items-center shrink-0">
                <button onclick="closeModal()" class="px-4 py-2 text-gray-600 font-medium text-sm hover:text-gray-800 hover:underline">Batal</button>
                <div class="flex gap-3">
                    <button class="px-4 py-2 border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50 transition">
                        <i data-lucide="x-circle" class="w-4 h-4 inline-block mr-1"></i> Tolak
                    </button>
                    <button class="px-6 py-2 bg-green-600 text-white rounded-lg text-sm font-bold hover:bg-green-700 shadow-md transition flex items-center">
                        <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i> Verifikasi & Aktifkan
                    </button>
                </div>
            </div>

        </div>
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

        // Modal Logic
        function openModal() {
            const modal = document.getElementById('verifyModal');
            const panel = document.getElementById('modalPanel');
            const body = document.body;
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                panel.classList.remove('scale-95');
                panel.classList.add('scale-100');
                body.classList.add('modal-active');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('verifyModal');
            const panel = document.getElementById('modalPanel');
            const body = document.body;
            
            modal.classList.add('opacity-0', 'pointer-events-none');
            panel.classList.remove('scale-100');
            panel.classList.add('scale-95');
            body.classList.remove('modal-active');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>