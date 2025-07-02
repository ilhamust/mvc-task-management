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
      <div class="p-6 hover:bg-gray-50 transition-all duration-200"
        x-data="{ checked: <?= $task['status'] === 'completed' ? 'true' : 'false' ?> }">
        <div class="flex items-start gap-4">

          <!-- Form untuk mark as completed -->
          <form action="/eisenhower-app/public/task/complete" method="POST" class="inline">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <input type="checkbox" onchange="this.form.submit()"
              class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition-all duration-200"
              <?= $task['status'] === 'completed' ? 'checked disabled' : '' ?>>
          </form>

          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-2">
              <h3
                class="font-semibold text-gray-800 text-lg <?= $task['status'] === 'completed' ? 'line-through text-gray-500' : '' ?>">
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

            <p class="text-gray-600 <?= $task['status'] === 'completed' ? 'line-through' : '' ?>">
              <?= htmlspecialchars($task['description']) ?>
            </p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>

<!-- Completed Tasks -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100">
  <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-green-50 to-green-100">
    <h2 class="font-bold text-gray-800 flex items-center">
      <i class="fas fa-check mr-2 text-green-600"></i> Tugas Selesai
    </h2>
  </div>

  <div class="divide-y divide-gray-100">
    <?php foreach ($completedTasks as $task): ?>
    <?php $quadrantStyle = getQuadrantClass($task['quadrant']); ?>
    <div class="p-6 bg-gray-50">
      <div class="flex items-start gap-4">

        <!-- Form untuk uncomplete task -->
        <form action="/eisenhower-app/public/task/uncomplete" method="POST" class="inline">
          <input type="hidden" name="id" value="<?= $task['id'] ?>">
          <input type="checkbox" checked onchange="this.form.submit()"
            class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500 transition-all duration-200">
        </form>

        <div class="flex-1 min-w-0">
          <div class="flex items-center justify-between mb-2">
            <h3 class="font-semibold text-gray-500 text-lg line-through">
              <?= htmlspecialchars($task['title']) ?>
            </h3>
          </div>

          <div class="flex items-center gap-3 mb-2">
            <span class="w-3 h-3 rounded-full <?= $quadrantStyle['dot'] ?>"></span>
            <span class="text-sm text-gray-500 flex items-center">
              <i class="fas fa-calendar-alt mr-1"></i>
              <?= date('d M Y', strtotime($task['deadline'])) ?>
            </span>
          </div>

          <p class="text-gray-500 line-through">
            <?= htmlspecialchars($task['description']) ?>
          </p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>


  <!-- Modal Tambah Task -->
  <?php include '../app/views/tasks/modalTambah.php'; ?>

  <!-- Modal Edit Task -->
  <?php include '../app/views/tasks/modalEdit.php'; ?>
</div>