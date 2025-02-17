<!DOCTYPE html>
<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1>Welcome to note page!</h1>
    <p><?= htmlspecialchars($note['body']); ?></p>
    <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
    <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
        </footer>
  </div>
</main>
</div>
</body>

</html>