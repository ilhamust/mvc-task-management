<!-- Modal Tambah Task -->
<div x-data="{ open: false }" x-on:open-modal.window="open = true" x-show="open"
    class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
  <div class="fixed inset-0 bg-black bg-opacity-25 backdrop-blur-sm" x-on:click="open = false"></div>

  <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md border border-gray-100">
    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50 rounded-t-2xl">
      <div class="flex items-center justify-between">
        <h3 class="text-xl font-bold text-gray-800 flex items-center">
          <i class="fas fa-plus-circle mr-2 text-blue-600"></i> Tambah Task Baru
        </h3>
        <button x-on:click="open = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
    </div>

    <form action="/eisenhower-app/public/task/store" method="POST" class="p-6 space-y-5">
      <input type="text" name="title" required placeholder="Judul Task" class="w-full border rounded px-3 py-2">
      <textarea name="description" required placeholder="Deskripsi"
        class="w-full border rounded px-3 py-2"></textarea>
      <input type="date" name="deadline" required class="w-full border rounded px-3 py-2">
      <select name="importance" required class="w-full border rounded px-3 py-2">
        <option value="">-- Pilih Penting/Tidak --</option>
        <option value="Penting">Penting</option>
        <option value="Tidak Penting">Tidak Penting</option>
      </select>

      <div class="flex justify-end space-x-2 pt-4 border-t">
        <button type="button" x-on:click="open = false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>
