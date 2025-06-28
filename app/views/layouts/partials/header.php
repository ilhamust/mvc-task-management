<div class="flex items-center justify-between">
    <!-- Page Title -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800"><?= $pageTitle ?? 'Dashboard' ?></h1>
        <p class="text-sm text-gray-500"><?= $pageSubtitle ?? 'Kelola tugas Anda dengan metode Eisenhower Matrix' ?></p>
    </div>
    
    <!-- Header Actions -->
    <div class="flex items-center space-x-4">
        <!-- Search -->
        <div class="relative hidden md:block">
            <input type="text" 
                   placeholder="Cari tugas..." 
                   class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        
        <!-- Quick Add Button -->
        <button class="btn-primary flex items-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Tambah Tugas</span>
        </button>
        
        <!-- Notifications -->
        <div class="relative">
            <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                <i class="fas fa-bell text-lg"></i>
                <span class="notification-dot absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
            </button>
        </div>
        
        <!-- Mobile menu button -->
        <button class="md:hidden p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100" id="mobile-menu-btn">
            <i class="fas fa-bars text-lg"></i>
        </button>
    </div>
</div>