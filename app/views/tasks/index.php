<?php 
require_once '../app/views/layouts/main.php'; ?>

<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($data['tasks'] as $task): ?>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold"><?= htmlspecialchars($task['title']) ?></h2>
                <p><?= htmlspecialchars($task['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
