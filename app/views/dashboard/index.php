<?php
// Sample data - replace with actual data from database
$totalTasks = 24;
$completedTasks = 8;
$pendingTasks = 16;

// Sample tasks data for matrix
$tasks = [
    'quadrant1' => [
        ['id' => 1, 'title' => 'Presentasi Client Penting', 'due_date' => '2024-01-15', 'priority' => 'high'],
        ['id' => 2, 'title' => 'Fix Bug Critical', 'due_date' => '2024-01-14', 'priority' => 'high'],
        ['id' => 3, 'title' => 'Meeting dengan CEO', 'due_date' => '2024-01-16', 'priority' => 'high'],
    ],
    'quadrant2' => [
        ['id' => 4, 'title' => 'Belajar Framework Baru', 'due_date' => '2024-01-25', 'priority' => 'medium'],
        ['id' => 5, 'title' => 'Dokumentasi Proyek', 'due_date' => '2024-01-30', 'priority' => 'medium'],
        ['id' => 6, 'title' => 'Perencanaan Strategis', 'due_date' => '2024-02-05', 'priority' => 'medium'],
    ],
    'quadrant3' => [
        ['id' => 7, 'title' => 'Balas Email Marketing', 'due_date' => '2024-01-17', 'priority' => 'low'],
        ['id' => 8, 'title' => 'Update Social Media', 'due_date' => '2024-01-18', 'priority' => 'low'],
    ],
    'quadrant4' => [
        ['id' => 9, 'title' => 'Browsing Internet', 'due_date' => '2024-01-20', 'priority' => 'low'],
        ['id' => 10, 'title' => 'Organize Desktop', 'due_date' => '2024-01-22', 'priority' => 'low'],
    ]
];
?>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Tasks -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Tugas</p>
                <p class="text-3xl font-bold text-gray-800"><?= $totalTasks ?></p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-tasks text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center">
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: <?= ($totalTasks > 0) ? ($completedTasks / $totalTasks * 100) : 0 ?>%"></div>
            </div>
            <span class="ml-3 text-xs text-gray-500"><?= $totalTasks > 0 ? round($completedTasks / $totalTasks * 100) : 0 ?>%</span>
        </div>
    </div>

    <!-- Completed Tasks -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Tugas Selesai</p>
                <p class="text-3xl font-bold text-green-600"><?= $completedTasks ?></p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-check-circle text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                <i class="fas fa-arrow-up mr-1"></i>
                +<?= $completedTasks ?> completed
            </span>
        </div>
    </div>

    <!-- Pending Tasks -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600 mb-1">Perlu Diselesaikan</p>
                <p class="text-3xl font-bold text-orange-600"><?= $pendingTasks ?></p>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-clock text-white text-xl"></i>
            </div>
        </div>
        <div class="mt-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                <i class="fas fa-exclamation-triangle mr-1"></i>
                <?= $pendingTasks ?> pending
            </span>
        </div>
    </div>
</div>

<!-- Eisenhower Matrix -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Eisenhower Matrix</h2>
        <a href="/eisenhower-app/public/tasks" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:shadow-lg transition-all duration-200">
            <i class="fas fa-plus mr-2"></i>
            Tambah Tugas
        </a>
    </div>

    <!-- Matrix Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Quadrant I: Penting & Mendesak -->
        <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 border-2 border-red-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-red-800 flex items-center">
                    <i class="fas fa-fire mr-2"></i>
                    Penting & Mendesak
                </h3>
                <span class="bg-red-200 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">
                    <?= count($tasks['quadrant1']) ?> tugas
                </span>
            </div>
            <div class="space-y-3">
                <?php foreach ($tasks['quadrant1'] as $task): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-red-200 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm mb-1"><?= $task['title'] ?></h4>
                                <p class="text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= date('d M Y', strtotime($task['due_date'])) ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <button class="text-gray-400 hover:text-gray-600 text-sm">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quadrant II: Penting & Tidak Mendesak -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border-2 border-green-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-green-800 flex items-center">
                    <i class="fas fa-seedling mr-2"></i>
                    Penting & Tidak Mendesak
                </h3>
                <span class="bg-green-200 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                    <?= count($tasks['quadrant2']) ?> tugas
                </span>
            </div>
            <div class="space-y-3">
                <?php foreach ($tasks['quadrant2'] as $task): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-green-200 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm mb-1"><?= $task['title'] ?></h4>
                                <p class="text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= date('d M Y', strtotime($task['due_date'])) ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                <button class="text-gray-400 hover:text-gray-600 text-sm">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quadrant III: Tidak Penting & Mendesak -->
        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-6 border-2 border-yellow-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-yellow-800 flex items-center">
                    <i class="fas fa-bolt mr-2"></i>
                    Tidak Penting & Mendesak
                </h3>
                <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">
                    <?= count($tasks['quadrant3']) ?> tugas
                </span>
            </div>
            <div class="space-y-3">
                <?php foreach ($tasks['quadrant3'] as $task): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-yellow-200 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm mb-1"><?= $task['title'] ?></h4>
                                <p class="text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= date('d M Y', strtotime($task['due_date'])) ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                                <button class="text-gray-400 hover:text-gray-600 text-sm">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Quadrant IV: Tidak Penting & Tidak Mendesak -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border-2 border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-800 flex items-center">
                    <i class="fas fa-pause mr-2"></i>
                    Tidak Penting & Tidak Mendesak
                </h3>
                <span class="bg-gray-200 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full">
                    <?= count($tasks['quadrant4']) ?> tugas
                </span>
            </div>
            <div class="space-y-3">
                <?php foreach ($tasks['quadrant4'] as $task): ?>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-200 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm mb-1"><?= $task['title'] ?></h4>
                                <p class="text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    <?= date('d M Y', strtotime($task['due_date'])) ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 bg-gray-500 rounded-full"></span>
                                <button class="text-gray-400 hover:text-gray-600 text-sm">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>