<!-- app/Views/recipe/show.php -->

<?= $this->extend('layout/authenticated') ?>

<?= $this->section('content') ?>


<main class="mt-10 mb-20">

  <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
    <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
    <img src="<?= base_url($recipe['image_url']) ?>" alt="<?= esc($recipe['title']) ?>" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
    <div class="p-4 absolute bottom-0 left-0 z-20">
      <a href="#" class="px-4 py-1 bg-red-500 text-gray-200 inline-flex items-center justify-center bg-opacity-80 mb-2"><?= $recipe['type'] ?></a>
      <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
        <?= $recipe['title'] ?>
      </h2>
      <div class="flex mt-3">
        <img src="https://ui-avatars.com/api/?name=<?= $recipe['name'] ?>&background=00000&color=fff" class="h-10 w-10 rounded-full mr-2 object-cover" />
        <div>
          <p class="font-semibold text-gray-200 text-sm"> <?= $recipe['name'] ?> </p>
          <p class="font-semibold text-gray-400 text-xs"> <?= date_format(date_create($recipe['created_at']), 'M d, Y h:i a') ?> </p>
        </div>
      </div>
    </div>
  </div>

  <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
    <p class="pb-6"><?= $recipe['description']  ?></p>
    <h2 class="text-xl font-bold text-gray-800 leading-tight mb-2">Ingredients</h2>
    <p class="pb-6">
      <?= nl2br(esc($recipe['ingredients'])) ?>
    </p>
    <h2 class="text-xl font-semibold text-gray-800 leading-tight mb-2">Instructions</h2>
    <p class="pb-6">
      <?= nl2br(esc($recipe['instructions'])) ?>
    </p>
  </div>
</main>

<?= $this->endSection() ?>