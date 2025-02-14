<!DOCTYPE html>
<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1>Welcome to notes page!</h1>
    <ul>
      <?php foreach ($notes as $note): ?>
        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
          <li><?= htmlspecialchars($note['body']) ?></li>
        </a>
      <?php endforeach; ?>

    </ul>
    <div class="mt-4">
      <a href="/notes/create" class="text-blue-500 hover:underline">
        <p>Create Note</p>
      </a>
    </div>

  </div>
</main>
</div>
</body>

</html>