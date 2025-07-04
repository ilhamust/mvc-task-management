<!-- Full Background -->
<div
  class="min-h-screen bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-700 flex items-center justify-center p-4">
  <!-- Main Card Container -->
  <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex">
    <!-- Left Panel - Branding -->
    <div
      class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-700 relative overflow-hidden">
      <div class="absolute inset-0 bg-black bg-opacity-20"></div>
      <div class="relative z-10 flex flex-col justify-center items-center p-12 text-white">
        <!-- Logo Section -->
        <div class="flex items-center mb-8">
          <div
            class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4 shadow-2xl">
            <span class="text-white text-2xl">♛</span>
          </div>
          <div>
            <h1 class="text-3xl font-bold">Eisenhower</h1>
            <p class="text-lg text-blue-100">Matrix Organizer</p>
          </div>
        </div>

        <!-- Illustration Area -->
        <div class="text-center max-w-sm">
          <div
            class="w-48 h-48 bg-white bg-opacity-10 backdrop-blur-sm rounded-3xl flex items-center justify-center mb-6 mx-auto shadow-2xl">
            <div class="text-center">
              <i class="fas fa-tasks text-5xl text-white mb-4 opacity-80"></i>
              <div class="w-12 h-2 bg-white bg-opacity-30 rounded-full mx-auto mb-2"></div>
              <div class="w-8 h-2 bg-white bg-opacity-30 rounded-full mx-auto mb-2"></div>
              <div class="w-16 h-2 bg-white bg-opacity-30 rounded-full mx-auto"></div>
            </div>
          </div>

          <h2 class="text-xl font-bold mb-4">Kelola Tugas dengan Metode Eisenhower</h2>
          <p class="text-blue-100 text-sm leading-relaxed">
            Prioritaskan tugas Anda berdasarkan urgensi dan kepentingan.
            Tingkatkan produktivitas dengan sistem yang terbukti efektif.
          </p>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-10 right-10 w-32 h-32 bg-white bg-opacity-10 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 left-10 w-24 h-24 bg-purple-300 bg-opacity-20 rounded-full blur-xl"></div>
      </div>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="flex-1 flex items-center justify-center p-8 bg-white">
      <div class="w-full max-w-sm">
        <!-- Mobile Logo (visible only on mobile) -->
        <div class="lg:hidden flex items-center justify-center mb-8">
          <div
            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
            <i class="fas fa-chess-queen text-white text-lg"></i>
          </div>
          <div>
            <h1 class="text-2xl font-bold text-gray-800">Eisenhower</h1>
            <p class="text-sm text-gray-500">Matrix Organizer</p>
          </div>
        </div>

        <div class="text-center mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang Kembali</h2>
          <p class="text-gray-500">Silakan masuk ke akun Anda</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-xl mb-6 flex items-center">
          <i class="fas fa-exclamation-circle mr-2"></i>
          <span class="text-sm"><?= $_SESSION['error']; unset($_SESSION['error']); ?></span>
        </div>
        <?php endif; ?>

        <form action="/eisenhower-app/public/auth/login" method="POST" class="space-y-6">
          <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
            <input type="text" name="username" required
              class="w-full border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white">
          </div>

          <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
            <input type="password" name="password" required
              class="w-full border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white">
          </div>

          <button type="submit"
            class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            Masuk
          </button>
        </form>

        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            Belum punya akun?
            <a href="/eisenhower-app/public/register"
              class="text-blue-600 hover:text-purple-600 font-semibold hover:underline transition-colors duration-200">
              Daftar Sekarang
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>