<?php
// Main layout file - semua halaman akan menggunakan layout ini
require_once __DIR__ . '../partials/head.php';
?>

<div class="app-container">
    <!-- Sidebar - Fixed -->
    <aside class="sidebar">
        <?php require_once __DIR__ . '../partials/sidebar.php'; ?>
    </aside>

    <!-- Header - Fixed -->
    <header class="header">
        <?php require_once __DIR__ . '../partials/header.php'; ?>
    </header>

    <!-- Main Content - Scrollable -->
    <main class="main-content">
        <?php 
        // Include the specific page content
        if (isset($view) && file_exists($view)) {
            require_once $view;
        } else {
            echo '<div class="text-center py-16">';
            echo '<i class="fas fa-exclamation-triangle text-6xl text-gray-300 mb-4"></i>';
            echo '<h2 class="text-2xl font-bold text-gray-600">Halaman Tidak Ditemukan</h2>';
            echo '<p class="text-gray-500">Halaman yang Anda cari tidak tersedia.</p>';
            echo '</div>';
        }
        ?>
    </main>

    <!-- Footer - Fixed -->
    <footer class="footer">
        <?php require_once __DIR__ . '../partials/footer.php'; ?>
    </footer>
</div>

<?php
// Close body and html tags (these should be in footer.php)
?>