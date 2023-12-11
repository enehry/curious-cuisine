<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curious Cuisine</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
  <?= $this->renderSection('content') ?>
  <div class="flex items-center justify-center">
    <div class="fixed z-90 bottom-5 bg-red-500 min-w-min px-2.5 py-2 text-white rounded-full flex items-center justify-center gap-2 shadow-lg hover:-translate-y-1 hover:shadow-2xl transition-all">
      <a href="<?= base_url() ?>" class="flex gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <span>Home</span>
      </a>
      <!---vertical line -->
      <div class="w-0.5 h-5 bg-white rounded-full"></div>
      <a href="<?= base_url() . "recipes" ?>" class="flex gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
        </svg>
        <span>Recipes</span>
      </a>
      <?php if (session('isLoggedIn')) : ?>
        <div class="flex gap-2 items-center">
          <div class="w-0.5 h-5 bg-white rounded-full"></div>
          <a href="<?= base_url() . "profile" ?>">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </a>
          <div class="w-0.5 h-5 bg-white rounded-full"></div>
          <a href="<?= base_url() . "logout" ?>">
            Logout
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>