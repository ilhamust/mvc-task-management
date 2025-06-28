<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$isActive = function($url) use ($currentUrl) {
    return strpos($currentUrl, $url) !== false ? 'active' : '';
};
?>

<div class="p-6">
    <!-- Logo Section -->
    <div class="flex items-center mb-8 p-3">
        <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center mr-3 shadow-lg">
            <i class="fas fa-chess-queen text-white text-lg"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Eisenhower</h2>
            <p class="text-xs text-gray-500">Matrix Organizer</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 mb-8">
        <a href="/eisenhower-app/public/" 
           class="nav-item <?= $isActive('/public/') && !$isActive('/tasks') ? 'active' : '' ?> flex items-center p-4 rounded-xl group">
            <i class="fas fa-home w-5 text-center mr-3"></i>
            <span class="font-medium">Dashboard</span>
        </a>
        <a href="/eisenhower-app/public/tasks" 
           class="nav-item <?= $isActive('/tasks') ? 'active' : '' ?> flex items-center p-4 rounded-xl">
            <i class="fas fa-tasks w-5 text-center mr-3"></i>
            <span class="font-medium">Manajemen Tugas</span>
        </a>
        <a href="/eisenhower-app/public/analytics" 
           class="nav-item <?= $isActive('/analytics') ? 'active' : '' ?> flex items-center p-4 rounded-xl">
            <i class="fas fa-chart-pie w-5 text-center mr-3"></i>
            <span class="font-medium">Analitik</span>
        </a>
        <a href="/eisenhower-app/public/settings" 
           class="nav-item <?= $isActive('/settings') ? 'active' : '' ?> flex items-center p-4 rounded-xl">
            <i class="fas fa-cog w-5 text-center mr-3"></i>
            <span class="font-medium">Pengaturan</span>
        </a>
    </nav>

    <!-- Quick Actions -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-4 mb-6 border border-blue-100">
        <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
            <i class="fas fa-bolt text-blue-500 mr-2"></i>
            Aksi Cepat
        </h3>
        <button class="quick-action-btn w-full text-left p-2 text-sm text-gray-600 hover:bg-blue-50 rounded-lg mb-2">
            <i class="fas fa-plus mr-2"></i> Tambah Tugas Baru
        </button>
        <button class="quick-action-btn w-full text-left p-2 text-sm text-gray-600 hover:bg-purple-50 rounded-lg">
            <i class="fas fa-download mr-2"></i> Export Data
        </button>
    </div>
</div>

<!-- User Profile (Fixed at bottom) -->
<div class="absolute bottom-6 left-6 right-6">
    <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 hover-lift">
        <div class="flex items-center">
            <div class="profile-avatar w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-3 shadow-md">
                <i class="fas fa-user"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800"><?= $user['name'] ?? 'John Doe' ?></p>
                <p class="text-sm text-gray-500"><?= $user['plan'] ?? 'Premium User' ?></p>
            </div>
            <div class="relative">
                <button class="text-gray-400 hover:text-gray-600 cursor-pointer">
                    <i class="fas fa-bell"></i>
                    <span class="notification-dot absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                </button>
            </div>
        </div>
    </div>
</div>