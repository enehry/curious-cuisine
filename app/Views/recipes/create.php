<?= $this->extend('layout/authenticated') ?>

<?= $this->section('content') ?>
<?php $validation = session()->get('validation'); ?>
<div>
  <div class="max-w-2xl mx-auto">
    <div>
      <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
          <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Create a new recipe</h2>
          <form action="<?= route_to('store-recipe') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="space-y-3">
              <div class="mb-4">
                <div class="flex items-center justify-center w-full">
                  <label for="image" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                      </svg>
                      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                      <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPEG or JPG</p>
                    </div>
                    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)" class="hidden" />
                  </label>
                </div>
                <div id="image-preview" class="mt-2 mx-auto"></div>
              </div>
              <div class="">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipe title</label>
                <input type="text" name="title" id="title" value="<?= old('title') ?>" class="bg-gray-50 border <?= ($validation?->hasError('title')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Type recipe title" required="">
                <?php if ($validation?->hasError('title')) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $validation->getError('title') ?></p>
                <?php endif; ?>
              </div>
              <div class="flex gap-2">
                <div class="w-full">
                  <label for="preparation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preparation Time</label>
                  <input type="number" name="preparation" id="preparation" value="<?= old('preparation') ?>" class="bg-gray-50 border <?= ($validation?->hasError('preparation')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="How many minutes to prepare? ex. 60">
                  <?php if ($validation?->hasError('preparation')) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $validation->getError('preparation') ?></p>
                  <?php endif; ?>
                </div>
                <div class="w-full">
                  <label for="preparation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cooking Time</label>
                  <input type="number" name="cook" id="cook" value="<?= old('cook') ?>" class="bg-gray-50 border <?= ($validation?->hasError('cook')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="How many minutes to cook? ex. 60">
                  <?php if ($validation?->hasError('cook')) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $validation->getError('cook') ?></p>
                  <?php endif; ?>
                </div>
                <div class="w-full">
                  <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                  <input type="text" name="type" id="type" value="<?= old('type') ?>" class="bg-gray-50 border <?= ($validation?->hasError('type')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="What is the type of this recipe? ex. Break Fast">
                  <?php if ($validation?->hasError('type')) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $validation->getError('type') ?></p>
                  <?php endif; ?>
                </div>
              </div>

              <div class="">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input type="text" name="description" id="description" value="<?= old('description') ?>" class="bg-gray-50 border <?= ($validation?->hasError('description')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Type recipe description">
                <?php if ($validation?->hasError('description')) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $validation->getError('description') ?></p>
                <?php endif; ?>
              </div>
              <div class="">
                <label for="ingredients" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingredients</label>
                <textarea id="ingredients" name="ingredients" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border <?= ($validation?->hasError('ingredients')) ? 'border-red-500' : 'border-gray-300' ?> focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="What are ingredients"><?= old('ingredients') ?></textarea>
                <?php if ($validation?->hasError('ingredients')) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $validation->getError('ingredients') ?></p>
                <?php endif; ?>
              </div>
              <div class="">
                <label for="instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instructions</label>
                <textarea id="instructions" name="instructions" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border <?= ($validation?->hasError('instructions')) ? 'border-red-500' : 'border-gray-300' ?> focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Explain the instructions"><?= old('instructions') ?></textarea>
                <?php if ($validation?->hasError('instructions')) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $validation->getError('instructions') ?></p>
                <?php endif; ?>
              </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
              Post Recipe
            </button>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>
<script>
  function previewImage(input) {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = ''; // Clear previous preview

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('relative', 'inline-block');

        const closeButton = document.createElement('button');
        closeButton.innerHTML = '&times;'; // Close symbol (X)
        closeButton.classList.add('absolute',
          'top-0', 'right-0', 'bg-red-500',
          'text-white', 'h-5', 'w-5', 'rounded-full',
          'cursor-pointer', 'flex', 'justify-center', 'items-center',
          'hover:-translate-y-1', 'hover:shadow-lg', 'm-0.5');
        closeButton.addEventListener('click', function() {
          preview.innerHTML = ''; // Remove the image preview
        });

        const image = document.createElement('img');
        image.src = e.target.result;
        image.classList.add('w-32', 'h-32', 'object-cover', 'rounded');

        imageContainer.appendChild(closeButton);
        imageContainer.appendChild(image);
        preview.appendChild(imageContainer);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?= $this->endSection() ?>