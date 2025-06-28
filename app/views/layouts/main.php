<?php require_once 'header.php'; ?>
<?php require_once 'menu.php'; ?>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col relative">
    <!-- Floating Background Elements -->
    <div class="floating-elements"></div>

    <?php require_once 'page-header.php'; ?>

    <!-- Dynamic Content -->
    <main class="flex-1 bg-white relative z-10 p-8">
      <?php require_once $view; ?>
    </main>

    <?php require_once 'footer.php'; ?>
  </div>