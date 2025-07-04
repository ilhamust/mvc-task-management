<!-- Modal Edit Task -->
<div id="editTaskModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
  <div class="fixed inset-0 bg-black bg-opacity-25 backdrop-blur-sm" onclick="closeEditModal()"></div>

  <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md border border-gray-100">
    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50 rounded-t-2xl">
      <div class="flex items-center justify-between">
        <h3 class="text-xl font-bold text-gray-800 flex items-center">
          <i class="fas fa-edit mr-2 text-blue-600"></i> Edit Task
        </h3>
        <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
    </div>

    <form id="editTaskForm" action="/eisenhower-app/public/task/update" method="POST" class="p-6 space-y-5">
      <input type="hidden" name="id" id="editTaskId">

      <input type="text" name="title" id="editTaskTitle" required placeholder="Judul Task" class="w-full border rounded px-3 py-2">
      <textarea name="description" id="editTaskDescription" required placeholder="Deskripsi"
        class="w-full border rounded px-3 py-2"></textarea>
      <input type="date" name="deadline" id="editTaskDeadline" required class="w-full border rounded px-3 py-2">
      <select name="importance" id="editTaskImportance" required class="w-full border rounded px-3 py-2">
        <option value="">-- Pilih Penting/Tidak --</option>
        <option value="Penting">Penting</option>
        <option value="Tidak Penting">Tidak Penting</option>
      </select>

      <div class="flex justify-end space-x-2 pt-4 border-t">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
      </div>
    </form>
  </div>
</div>