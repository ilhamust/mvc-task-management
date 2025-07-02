<div class="flex items-center justify-between">
    <!-- Page Title -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800"><?= $pageTitle ?? 'Dashboard' ?></h1>
        <p class="text-sm text-gray-500"><?= $pageSubtitle ?? 'Kelola tugas Anda dengan metode Eisenhower Matrix' ?></p>
    </div>
    
    <!-- Header Actions -->
    <div class="flex items-center space-x-4">
        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-100 transition-colors">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-semibold shadow-lg">
                    <i class="fas fa-user text-sm"></i>
                </div>
                <div class="hidden md:block text-left">
                    <p class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($username) ?></p>
                </div>
                <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''"></i>
            </button>
            
            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-user-cog mr-3 text-gray-400"></i>
                    Pengaturan Profil
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-bell mr-3 text-gray-400"></i>
                    Notifikasi
                </a>
                <hr class="my-2 border-gray-100">
                <a href="/eisenhower-app/public/logout" class="flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </div>
        </div>

        <!-- Mobile menu button -->
        <button class="md:hidden p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors" x-data x-on:click="$dispatch('toggle-mobile-menu')">
            <i class="fas fa-bars text-lg"></i>
        </button>
    </div>
</div>