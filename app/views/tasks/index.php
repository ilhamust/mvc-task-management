<?php
function getQuadrantLabel($quadrant) {
  switch ($quadrant) {
    case 'Quadrant 1': return 'Mendesak & Penting';
    case 'Quadrant 2': return 'Tidak Mendesak & Penting';
    case 'Quadrant 3': return 'Mendesak & Tidak Penting';
    case 'Quadrant 4': return 'Tidak Mendesak & Tidak Penting';
    default: return 'Tidak Diketahui';
  }
}

function getQuadrantClass($quadrant) {
  switch ($quadrant) {
    case 'Quadrant 1': return ['class'=>'border-red-500 text-red-500 bg-red-50','dot'=>'bg-red-500'];
    case 'Quadrant 2': return ['class'=>'border-yellow-500 text-yellow-500 bg-yellow-50','dot'=>'bg-yellow-500'];
    case 'Quadrant 3': return ['class'=>'border-blue-500 text-blue-500 bg-blue-50','dot'=>'bg-blue-500'];
    case 'Quadrant 4': return ['class'=>'border-gray-500 text-gray-500 bg-gray-50','dot'=>'bg-gray-500'];
    default: return ['class'=>'border-gray-300 text-gray-500','dot'=>'bg-gray-300'];
  }
}
?>

<div class="space-y-8">
  <!-- Header -->
  <div class="flex items-center justify-between">
    <p class="text-gray-600 flex items-center">
      <i class="fas fa-tasks mr-2"></i>
      <?= count($activeTasks) ?> aktif • <?= count($completedTasks) ?> selesai
    </p>
    <button
      class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:shadow-lg transition-all duration-200 font-medium"
      x-data x-on:click="$dispatch('open-modal')">
      <i class="fas fa-plus mr-2"></i>
      Tambah Task
    </button>
  </div>

  <!-- Active Tasks -->
  <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
      <h2 class="font-bold text-gray-800 flex items-center">
        <i class="fas fa-list-check mr-2 text-blue-600"></i> Tugas Aktif
      </h2>
    </div>

    <div class="divide-y divide-gray-100">
      <?php foreach ($activeTasks as $task): ?>
      <?php $quadrantStyle = getQuadrantClass($task['quadrant']); ?>
      <div class="p-6 hover:bg-gray-50 transition-all duration-200" x-data="{ checked: false }">
        <div class="flex items-start gap-4">
          <input type="checkbox" x-model="checked"
            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition-all duration-200">

          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-semibold text-gray-800 text-lg" :class="checked ? 'line-through text-gray-500' : ''">
                <?= htmlspecialchars($task['title']) ?>
              </h3>
              <span
                class="inline-block px-3 py-1 text-xs font-medium rounded-full border <?= $quadrantStyle['class'] ?>">
                <?= htmlspecialchars(getQuadrantLabel($task['quadrant'])) ?>
              </span>
            </div>

            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full <?= $quadrantStyle['dot'] ?>"></span>
                <span class="text-sm text-gray-500 flex items-center">
                  <i class="fas fa-calendar-alt mr-1"></i>
                  <?= date('d M Y', strtotime($task['deadline'])) ?>
                </span>
              </div>

              <div class="flex gap-3">
  <button onclick="openEditModal(<?= htmlspecialchars(json_encode($task)) ?>)"
    class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
    <i class="fas fa-edit mr-1"></i>Edit
  </button>

  <a href="/eisenhower-app/public/task/delete/<?= $task['id'] ?>"
    onclick="return confirm('Apakah Anda yakin ingin menghapus task ini?');"
    class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors duration-200">
    <i class="fas fa-trash mr-1"></i>Hapus
  </a>
</div>

            </div>

            <p class="text-gray-600" :class="checked ? 'line-through' : ''">
              <?= htmlspecialchars($task['description']) ?>
            </p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

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

  <!-- Modal Edit Task -->
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
</div>