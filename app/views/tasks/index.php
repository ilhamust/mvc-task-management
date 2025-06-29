<?php
// Sample data
$activeTasks = [
    [
        'id' => 1,
        'title' => 'Presentasi Client Penting',
        'description' => 'Menyiapkan presentasi untuk client terbesar',
        'quadrant' => 'Penting & Mendesak',
        'quadrant_color' => 'red',
        'due_date' => '2024-01-15',
        'priority' => 'high'
    ],
    [
        'id' => 2,
        'title' => 'Belajar Framework Baru',
        'description' => 'Mempelajari React dan Vue.js untuk project mendatang',
        'quadrant' => 'Penting & Tidak Mendesak',
        'quadrant_color' => 'green',
        'due_date' => '2024-01-25',
        'priority' => 'medium'
    ],
    [
        'id' => 3,
        'title' => 'Update Social Media',
        'description' => 'Posting konten di Instagram dan Facebook',
        'quadrant' => 'Tidak Penting & Mendesak',
        'quadrant_color' => 'yellow',
        'due_date' => '2024-01-18',
        'priority' => 'low'
    ]
];

$completedTasks = [
    [
        'id' => 5,
        'title' => 'Meeting Tim Development',
        'description' => 'Diskusi progress project dan planning sprint',
        'quadrant' => 'Penting & Mendesak',
        'quadrant_color' => 'red',
        'completed_date' => '2024-01-12'
    ],
    [
        'id' => 6,
        'title' => 'Backup Database',
        'description' => 'Melakukan backup database production',
        'quadrant' => 'Penting & Tidak Mendesak',
        'quadrant_color' => 'green',
        'completed_date' => '2024-01-10'
    ]
];

function getQuadrantClass($color) {
    $colors = [
        'red' => 'bg-gradient-to-br from-red-50 to-red-100 text-red-800 border-red-200',
        'green' => 'bg-gradient-to-br from-green-50 to-green-100 text-green-800 border-green-200',
        'yellow' => 'bg-gradient-to-br from-yellow-50 to-yellow-100 text-yellow-800 border-yellow-200'
    ];
    return $colors[$color] ?? 'bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 border-gray-200';
}

function getPriorityColor($priority) {
    switch($priority) {
        case 'high': return 'text-red-500';
        case 'medium': return 'text-yellow-500';
        case 'low': return 'text-green-500';
        default: return 'text-gray-500';
    }
}
?>

<div class="space-y-8">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 flex items-center">
                <i class="fas fa-tasks mr-2"></i>
                <?= count($activeTasks) ?> aktif • <?= count($completedTasks) ?> selesai
            </p>
        </div>
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
                <i class="fas fa-list-check mr-2 text-blue-600"></i>
                Tugas Aktif
            </h2>
        </div>

        <div class="divide-y divide-gray-100">
            <?php foreach ($activeTasks as $task): ?>
            <div class="p-6 hover:bg-gray-50 transition-all duration-200" x-data="{ checked: false }">
                <div class="flex items-start gap-4">
                    <!-- Checkbox -->
                    <div class="mt-1">
                        <input type="checkbox" x-model="checked"
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition-all duration-200">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-800 text-lg"
                                :class="checked ? 'line-through text-gray-500' : ''">
                                <?= $task['title'] ?>
                            </h3>
                            <span
                                class="inline-block px-3 py-1 text-xs font-medium rounded-full border <?= getQuadrantClass($task['quadrant_color']) ?>">
                                <?= $task['quadrant'] ?>
                            </span>
                        </div>

                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-3 h-3 rounded-full <?= getPriorityColor($task['priority']) == 'text-red-500' ? 'bg-red-500' : (getPriorityColor($task['priority']) == 'text-yellow-500' ? 'bg-yellow-500' : 'bg-green-500') ?>"></span>
                                <span class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= date('d M Y', strtotime($task['due_date'])) ?>
                                </span>
                            </div>
                            <div class="flex gap-3">
                                <button
                                    class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </button>
                                <button
                                    class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </div>
                        </div>

                        <p class="text-gray-600" :class="checked ? 'line-through' : ''">
                            <?= $task['description'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Completed Tasks -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
            <h2 class="font-bold text-gray-800 flex items-center">
                <i class="fas fa-check-circle mr-2 text-green-600"></i>
                Tugas Selesai
            </h2>
        </div>

        <div class="divide-y divide-gray-100">
            <?php foreach ($completedTasks as $task): ?>
            <div class="p-6 bg-gradient-to-r from-gray-50/50 to-green-50/30" x-data="{ checked: true }">
                <div class="flex items-start gap-4">
                    <!-- Completed Checkbox -->
                    <div class="mt-1">
                        <input type="checkbox" x-model="checked"
                            class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500 transition-all duration-200">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-lg"
                                :class="checked ? 'line-through text-gray-600' : 'text-gray-800'">
                                <?= $task['title'] ?>
                            </h3>
                            <span
                                class="inline-block px-3 py-1 text-xs font-medium rounded-full border <?= getQuadrantClass($task['quadrant_color']) ?>"
                                :class="checked ? 'opacity-75' : ''">
                                <?= $task['quadrant'] ?>
                            </span>
                        </div>

                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full bg-green-500"
                                    :class="checked ? 'opacity-75' : ''"></span>
                                <span class="text-sm text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-check mr-1"></i>
                                    <?= date('d M Y', strtotime($task['completed_date'])) ?>
                                </span>
                            </div>
                            <div class="flex gap-3">
                                <button
                                    class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </div>
                        </div>

                        <p class="text-gray-600" :class="checked ? 'line-through text-gray-500' : ''">
                            <?= $task['description'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Add Task Modal -->
    <div x-data="{ open: false }" x-on:open-modal.window="open = true" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">

        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black bg-opacity-25 backdrop-blur-sm" x-on:click="open = false"></div>

        <!-- Modal -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md border border-gray-100">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-plus-circle mr-2 text-blue-600"></i>
                        Tambah Task Baru
                    </h3>
                    <button x-on:click="open = false"
                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <form action="/eisenhower-app/public/task/store" method="POST" class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Task</label>
                    <input type="text" name="title" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="Masukkan judul task">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        placeholder="Deskripsi task"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deadline</label>
                    <input type="date" name="deadline" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penting/Tidak Penting</label>
                    <select name="importance" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <option value="">-- Pilih --</option>
                        <option value="Penting">Penting</option>
                        <option value="Tidak Penting">Tidak Penting</option>
                    </select>
                </div>

                <!-- Footer -->
                <div class="pt-5 border-t border-gray-200 flex justify-end gap-3 bg-gray-50 rounded-b-2xl">
                    <button type="button" x-on:click="open = false"
                        class="px-6 py-3 text-gray-700 bg-white border-2 border-gray-200 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:shadow-lg transition-all duration-200 font-medium">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>