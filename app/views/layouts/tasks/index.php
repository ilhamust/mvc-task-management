<?php
// Set page variables
$pageTitle = 'Manajemen Tugas';
$pageSubtitle = 'Kelola semua tugas Anda dengan mudah';
?>

<!-- Tasks Management Content -->
<div class="space-y-6">
    <!-- Filter and Sort -->
    <div class="feature-card rounded-2xl p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div class="flex flex-wrap gap-3">
                <button class="filter-btn active px-4 py-2 rounded-lg bg-blue-600 text-white font-medium">
                    Semua (24)
                </button>
                <button class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                    Urgent & Important (3)
                </button>
                <button class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                    Important (8)
                </button>
                <button class="filter-btn px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                    Selesai (12)
                </button>
            </div>
            
            <div class="flex items-center space-x-3">
                <select class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option>Urutkan: Deadline</option>
                    <option>Urutkan: Prioritas</option>
                    <option>Urutkan: Nama</option>
                    <option>Urutkan: Status</option>
                </select>
                
                <button class="view-toggle p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="view-toggle p-2 text-gray-600 rounded-lg bg-gray-100">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Task List -->
    <div class="space-y-4">
        <!-- Urgent & Important Tasks -->
        <div class="feature-card rounded-2xl overflow-hidden">
            <div class="bg-red-50 border-b border-red-100 px-6 py-4">
                <h3 class="font-semibold text-red-800 flex items-center">
                    <i class="fas fa-fire mr-2"></i>
                    Urgent & Important
                    <span class="ml-2 px-2 py-1 bg-red-200 text-red-800 text-xs rounded-full">3</span>
                </h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="task-item bg-white border border-red-200 rounded-xl p-4 hover-lift">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-red-600 rounded focus:ring-red-500">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Presentasi untuk Client ABC</h4>
                                <p class="text-sm text-gray-600 mt-1">Persiapkan slide presentasi untuk meeting dengan client besar</p>
                                <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Deadline: Hari ini, 4 PM
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-user mr-1"></i>
                                        John Doe
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full font-medium">
                                Urgent
                            </span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="task-item bg-white border border-red-200 rounded-xl p-4 hover-lift">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-red-600 rounded focus:ring-red-500">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Fix Bug Critical di Production</h4>
                                <p class="text-sm text-gray-600 mt-1">Bug yang mempengaruhi semua user harus segera diperbaiki</p>
                                <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Deadline: Besok, 9 AM
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-user mr-1"></i>
                                        Tim Development
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full font-medium">
                                Critical
                            </span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Important, Not Urgent Tasks -->
        <div class="feature-card rounded-2xl overflow-hidden">
            <div class="bg-blue-50 border-b border-blue-100 px-6 py-4">
                <h3 class="font-semibold text-blue-800 flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Important, Not Urgent
                    <span class="ml-2 px-2 py-1 bg-blue-200 text-blue-800 text-xs rounded-full">5</span>
                </h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="task-item bg-white border border-blue-200 rounded-xl p-4 hover-lift">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Perencanaan Roadmap Q2</h4>
                                <p class="text-sm text-gray-600 mt-1">Menyusun roadmap development untuk quarter 2</p>
                                <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Deadline: Minggu depan
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-users mr-1"></i>
                                        Tim Product
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-medium">
                                Important
                            </span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="task-item bg-white border border-blue-200 rounded-xl p-4 hover-lift">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">Learning New Technology</h4>
                                <p class="text-sm text-gray-600 mt-1">Mempelajari framework terbaru untuk improve skills</p>
                                <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Target: Bulan ini
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-user mr-1"></i>
                                        Personal
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs rounded-full font-medium">
                                Learning
                            </span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Tasks -->
        <div class="feature-card rounded-2xl overflow-hidden">
            <div class="bg-green-50 border-b border-green-100 px-6 py-4">
                <h3 class="font-semibold text-green-800 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    Tugas Selesai
                    <span class="ml-2 px-2 py-1 bg-green-200 text-green-800 text-xs rounded-full">8</span>
                </h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="task-item bg-white border border-green-200 rounded-xl p-4 opacity-75">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <input type="checkbox" checked class="mt-1 w-4 h-4 text-green-600 rounded focus:ring-green-500">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 line-through">Database Optimization</h4>
                                <p class="text-sm text-gray-600 mt-1">Mengoptimalkan query database untuk performa lebih baik</p>
                                <div class="flex items-center space-x-4 mt-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-check mr-1 text-green-600"></i>
                                        Selesai: 2 jam yang lalu
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-user mr-1"></i>
                                        John Doe
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full font-medium">
                                Completed
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Task Button (Floating) -->
    <button class="fixed bottom-8 right-8 w-14 h-14 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center z-20">
        <i class="fas fa-plus text-xl"></i>
    </button>
</div>