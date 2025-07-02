  <div id="editTaskModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
      <h2 class="text-xl font-bold mb-4">Edit Task</h2>
      <form id="editTaskForm" action="/eisenhower-app/public/task/update" method="POST" class="space-y-4">
        <input type="hidden" name="id" id="editTaskId">

        <input type="text" name="title" id="editTaskTitle" required class="w-full border rounded px-3 py-2">
        <textarea name="description" id="editTaskDescription" class="w-full border rounded px-3 py-2"></textarea>
        <input type="date" name="deadline" id="editTaskDeadline" class="w-full border rounded px-3 py-2">
        <select name="importance" id="editTaskImportance" class="w-full border rounded px-3 py-2">
          <option value="Penting">Penting</option>
          <option value="Tidak Penting">Tidak Penting</option>
        </select>

        <div class="flex justify-end space-x-2">
          <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
        </div>
      </form>
    </div>
  </div>