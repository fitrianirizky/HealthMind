<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMind Admin Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Custom Scrollbar for better look */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .chart-container { position: relative; overflow: hidden; }
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

    <div id="sidebarOverlay" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden lg:hidden" onclick="toggleSidebar()"></div>

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
                <a href="#" class="flex items-center space-x-3 px-6 py-3 bg-blue-50 text-blue-600 border-r-4 border-blue-600 transition-colors">
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
                <div class="space-y-1">
                    <a href="DataDokter.php" class="flex items-center space-x-3 px-6 py-3 text-gray-500 hover:bg-gray-50 hover:text-blue-500 transition-colors">
                        <i data-lucide="stethoscope" class="w-5 h-5"></i>
                        <span class="font-medium text-sm">Psikolog / Dokter</span>
                    </a>
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

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-100 shadow-sm shrink-0 z-10">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none lg:hidden mr-4 p-1 rounded hover:bg-gray-100">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="flex items-center space-x-4">
        
                <div class="flex items-center space-x-3 border-l pl-4 border-gray-200">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-medium text-gray-700">Admin Super</p>

                    </div>
                    <img 
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=Admin" 
                        alt="Profile" 
                        class="h-9 w-9 rounded-full border-2 border-blue-100 cursor-pointer hover:opacity-80 transition-opacity"
                    >
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Selamat Pagi, Admin! 👋</h1>
                    <p class="text-gray-500 mt-1">Ringkasan aktivitas platform kesehatan mental hari ini.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Pasien</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">12,450</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Psikolog Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">84</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-teal-50 text-teal-600">
                            <i data-lucide="stethoscope" class="w-6 h-6"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Konsultasi</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">3,820</h3>
                        </div>
                        <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                            <i data-lucide="calendar" class="w-6 h-6"></i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800">Notifikasi Penting</h3>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="space-y-6 flex-1">
                            <div class="flex space-x-4 group">
                                <div class="flex-shrink-0 mt-1 text-red-500">
                                    <i data-lucide="alert-circle" class="w-5 h-5"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 flex justify-between items-center">
                                        Pembayaran Pending
                                        <span class="h-2 w-2 bg-red-500 rounded-full"></span>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">User #8829 belum menyelesaikan pembayaran konsultasi.</p>
                                    <div class="mt-2">
                                       <button class="text-xs bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded transition font-medium">Tindak Lanjuti</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4 group">
                                <div class="flex-shrink-0 mt-1 text-orange-500">
                                    <i data-lucide="file-check" class="w-5 h-5"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 flex justify-between items-center">
                                        Verifikasi Psikolog
                                        <span class="h-2 w-2 bg-red-500 rounded-full"></span>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">Dr. Andi menunggu persetujuan dokumen lisensi.</p>
                                    <div class="mt-2 flex space-x-2">
                                       <button class="text-xs bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded text-gray-600 transition font-medium">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="w-full mt-6 py-2.5 border border-dashed border-gray-300 rounded-lg text-sm text-gray-500 hover:bg-gray-50 hover:border-gray-400 transition-colors font-medium">
                            Lihat Semua Notifikasi
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Statistik Konsultasi</h3>
                    <p class="text-sm text-gray-500 mb-4">Minggu ini</p>
                    <div class="chart-container" style="min-height: 300px;">
                        <div id="consultationChart"></div>
                    </div>
                </div>
            </div>

            <div class="text-center text-xs text-gray-400 pb-4">
                &copy; 2025 HealthMind Admin Dashboard. Design inspired by Sofbox.
            </div>

        </main>
    </div>

    <script>
        // 1. Initialize Icons
        lucide.createIcons();

        // 2. Sidebar Toggle Logic
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                // Close sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // 3. Initialize Charts (ApexCharts)
        
        // Consultation Chart Configuration
        const consultationOptions = {
            series: [{
                name: 'Pasien',
                data: [40, 30, 20, 27, 18, 23, 34]
            }, {
                name: 'Psikolog',
                data: [24, 13, 58, 39, 48, 38, 43]
            }],
            chart: {
                type: 'bar',
                height: 320,
                toolbar: { show: false },
                fontFamily: 'Inter, sans-serif'
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 4
                },
            },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 2, colors: ['transparent'] },
            xaxis: {
                categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                labels: { style: { colors: '#94a3b8', fontSize: '12px' } }
            },
            yaxis: {
                labels: { style: { colors: '#94a3b8', fontSize: '12px' } }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4
            },
            colors: ['#3b82f6', '#cbd5e1'],
            tooltip: { theme: 'light' }
        };

        // Render Chart
        const consultationChart = new ApexCharts(document.querySelector("#consultationChart"), consultationOptions);
        consultationChart.render();

    </script>
</body>
</html>