<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
    <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <form action="/eisenhower-app/public/auth/login" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
        <input type="text" name="username" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-500">
      </div>
      <div>
        <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
        <input type="password" name="password" required class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-500">
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
    </form>
  </div>
</div>
