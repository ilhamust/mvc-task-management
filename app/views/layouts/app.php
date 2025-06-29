<?php
// Main layout file - semua halaman akan menggunakan layout ini
require_once __DIR__ . '../partials/head.php';
?>

<div class="h-full grid grid-cols-1 md:grid-cols-[280px_1fr] grid-rows-[auto_1fr_auto]">
    <!-- Sidebar - Fixed on desktop, overlay on mobile -->
    <aside class="hidden md:block bg-white border-r border-gray-200 row-span-3 overflow-y-auto">
        <?php require_once __DIR__ . '../partials/sidebar.php'; ?>
    </aside>

    <!-- Mobile Sidebar (handled by Alpine.js in sidebar.php) -->
    <div class="md:hidden">
        <?php require_once __DIR__ . '../partials/sidebar.php'; ?>
    </div>

    <!-- Header - Fixed -->
    <header class="bg-white border-b border-gray-200 px-6 py-4 sticky top-0 z-30">
        <?php require_once __DIR__ . '../partials/header.php'; ?>
    </header>

    <!-- Main Content - Scrollable -->
    <main class="overflow-y-auto p-6 bg-gray-50 min-h-0">
        <div class="max-w-7xl mx-auto">
            <?php 
            // Include the specific page content
            if (isset($view) && file_exists($view)) {
                require_once $view;
            } else {
                echo '<div class="text-center py-16">';
                echo '<div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center">';
                echo '<i class="fas fa-exclamation-triangle text-3xl text-gray-400"></i>';
                echo '</div>';
                echo '<h2 class="text-2xl font-bold text-gray-600 mb-2">Halaman Tidak Ditemukan</h2>';
                echo '<p class="text-gray-500">Halaman yang Anda cari tidak tersedia.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

    <!-- Footer - Fixed -->
    <footer class="bg-white border-t border-gray-200 px-6 py-4">
        <?php require_once __DIR__ . '../partials/footer.php'; ?>
    </footer>
</div>

<?php
// Close body and html tags ada di footer.php
?>