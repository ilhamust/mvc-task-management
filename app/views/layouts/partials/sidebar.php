<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$isDashboardActive = (strpos($currentUrl, '/dashboard') !== false && strpos($currentUrl, '/tasks') === false);
$isTasksActive = (strpos($currentUrl, '/tasks') !== false);
?>

<div class="h-full flex flex-col" x-data="{ mobileMenuOpen: false }" @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen">
    <!-- Mobile Overlay -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 md:hidden"></div>
    
    <!-- Sidebar Content -->
    <div class="flex flex-col h-full" :class="mobileMenuOpen ? 'fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl md:relative md:z-auto' : ''">
        <div class="p-6 flex-1">
            <!-- Logo Section -->
            <div class="flex items-center mb-8 p-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                    <i class="fas fa-chess-queen text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Eisenhower</h2>
                    <p class="text-xs text-gray-500">Matrix Organizer</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="/eisenhower-app/public/dashboard" 
                   class="<?= $isDashboardActive ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' ?> flex items-center p-4 rounded-xl transition-all duration-200 group">
                    <i class="fas fa-home w-5 text-center mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="/eisenhower-app/public/tasks" 
                   class="<?= $isTasksActive ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' ?> flex items-center p-4 rounded-xl transition-all duration-200">
                    <i class="fas fa-tasks w-5 text-center mr-3"></i>
                    <span class="font-medium">Manajemen Tugas</span>
                </a>
            </nav>
        </div>

        <!-- User Profile (Mobile Version) -->
        <div class="p-6 md:hidden">
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-4 border border-gray-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-3 shadow-md">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800"><?= $user['name'] ?? 'John Doe' ?></p>
                        <p class="text-sm text-gray-500"><?= $user['plan'] ?? 'Premium User' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>