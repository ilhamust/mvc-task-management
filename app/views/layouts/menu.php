<!-- Sidebar/Menu -->
<aside class="w-72 sidebar-gradient min-h-screen p-6 shadow-xl relative z-10">
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
    <a href="/eisenhower-app/public/" class="nav-item active flex items-center p-4 rounded-xl group">
      <i class="fas fa-home w-5 text-center mr-3"></i>
      <span class="font-medium">Dashboard</span>
    </a>
    <a href="/eisenhower-app/public/tasks" class="nav-item flex items-center p-4 rounded-xl">
      <i class="fas fa-tasks w-5 text-center mr-3"></i>
      <span class="font-medium">Manajemen Tugas</span>
    </a>
    <a href="#" class="nav-item flex items-center p-4 rounded-xl">
      <i class="fas fa-chart-pie w-5 text-center mr-3"></i>
      <span class="font-medium">Analitik</span>
    </a>
    <a href="#" class="nav-item flex items-center p-4 rounded-xl">
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
    <button class="block w-full text-left p-2 text-sm text-gray-600 hover:bg-blue-50 rounded-lg">
      <i class="fas fa-plus mr-2"></i> Tambah Tugas Baru
    </button>
    <button class="block w-full text-left p-2 text-sm text-gray-600 hover:bg-purple-50 rounded-lg">
      <i class="fas fa-download mr-2"></i> Export Data
    </button>
  </div>

  <!-- User Profile -->
  <div class="absolute bottom-6 left-6 right-6">
    <div class="bg-white rounded-2xl p-4 shadow-lg border border-gray-100 hover-lift">
      <div class="flex items-center">
        <div
          class="profile-avatar w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold text-lg mr-3 shadow-md">
          <i class="fas fa-user"></i>
        </div>
        <div class="flex-1">
          <p class="font-semibold text-gray-800">John Doe</p>
          <p class="text-sm text-gray-500">Premium User</p>
        </div>
        <div class="relative">
          <i class="fas fa-bell text-gray-400 hover:text-gray-600 cursor-pointer"></i>
          <div class="notification-dot absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></div>
        </div>
      </div>
    </div>
  </div>
</aside>