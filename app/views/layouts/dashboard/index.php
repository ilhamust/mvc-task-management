<?php
// Set page variables
$pageTitle = 'Dashboard';
$pageSubtitle = 'Ringkasan aktivitas dan tugas Anda';
?>

<!-- Dashboard Content -->
<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="feature-card rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Tugas</p>
                    <p class="text-3xl font-bold text-gray-900">24</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-tasks text-blue-600"></i>
                </div>
            </div>
        </div>
        
        <div class="feature-card rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Urgent & Important</p>
                    <p class="text-3xl font-bold text-red-600">3</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
            </div>
        </div>
        
        <div class="feature-card rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Selesai Hari Ini</p>
                    <p class="text-3xl font-bold text-green-600">8</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>
        </div>
        
        <div class="feature-card rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Produktivitas</p>
                    <p class="text-3xl font-bold text-purple-600">85%</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Eisenhower Matrix -->
    <div class="feature-card rounded-2xl p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-th-large text-blue-600 mr-3"></i>
            Eisenhower Matrix
        </h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Urgent & Important -->
            <div class="border-2 border-red-200 rounded-xl p-4 bg-red-50">
                <h3 class="font-semibold text-red-800 mb-3 flex items-center">
                    <i class="fas fa-fire mr-2"></i>
                    Urgent & Important
                </h3>
                <div class="space-y-2">
                    <div class="bg-white p-3 rounded-lg border border-red-200">
                        <p class="font-medium text-gray-800">Presentasi Client</p>
                        <p class="text-sm text-gray-500">Deadline: Hari ini</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-red-200">
                        <p class="font-medium text-gray-800">Bug Fix Critical</p>
                        <p class="text-sm text-gray-500">Deadline: Besok</p>
                    </div>
                </div>
            </div>

            <!-- Important, Not Urgent -->
            <div class="border-2 border-blue-200 rounded-xl p-4 bg-blue-50">
                <h3 class="font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    Important, Not Urgent
                </h3>
                <div class="space-y-2">
                    <div class="bg-white p-3 rounded-lg border border-blue-200">
                        <p class="font-medium text-gray-800">Perencanaan Q2</p>
                        <p class="text-sm text-gray-500">Deadline: Minggu depan</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg border border-blue-200">
                        <p class="font-medium text-gray-800">Learning New Tech</p>
                        <p class="text-sm text-gray-500">Target: Bulan ini</p>
                    </div>
                </div>
            </div>

            <!-- Urgent, Not Important -->
            <div class="border-2 border-yellow-200 rounded-xl p-4 bg-yellow-50">
                <h3 class="font-semibold text-yellow-800 mb-3 flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    Urgent, Not Important
                </h3>
                <div class="space-y-2">
                    <div class="bg-white p-3 rounded-lg border border-yellow-200">
                        <p class="font-medium text-gray-800">Meeting Rutin</p>
                        <p class="text-sm text-gray-500">Hari ini, 2 PM</p>
                    </div>
                </div>
            </div>

            <!-- Neither Urgent nor Important -->
            <div class="border-2 border-gray-200 rounded-xl p-4 bg-gray-50">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-pause mr-2"></i>
                    Neither Urgent nor Important
                </h3>
                <div class="space-y-2">
                    <div class="bg-white p-3 rounded-lg border border-gray-200">
                        <p class="font-medium text-gray-800">Social Media</p>
                        <p class="text-sm text-gray-500">Break time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="feature-card rounded-2xl p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-history text-green-600 mr-3"></i>
            Aktivitas Terbaru
        </h2>
        
        <div class="space-y-4">
            <div class="flex items-center p-3 bg-green-50 rounded-lg border border-green-200">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-check text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">Menyelesaikan "Database Optimization"</p>
                    <p class="text-sm text-gray-500">2 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800">Menambahkan tugas "Code Review"</p>
                    <p class="text-sm text-gray-500">4 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>