<!DOCTYPE html>
<?php require'views/partials/head.php'; ?>
<?php require'views/partials/nav.php'; ?>
<?php require'views/partials/banner.php'; ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1>Welcome to note page!</h1>
        <p><?=htmlspecialchars($note['body']);?></p>
        <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
  </div>
</main>
</div>
</body>

</html>