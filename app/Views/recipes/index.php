<?= $this->extend('layout/authenticated') ?>

<?= $this->section('content') ?>
<div class="max-w-md mx-auto">
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-bold my-4">My Recipes</h1>
    <a href="<?= base_url() . 'recipes/create' ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-500 w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </a>
  </div>
  <?php if (session()->has('message')) : ?>
    <?php $message = session('message'); ?>
    <div class="<?= $message['type'] === 'success' ? 'bg-green-50 text-green-800 border-green-500' : 'bg-red-100 text-red-800 border-red-500' ?> rounded-lg px-4 py-3 relative" role="alert">
      <strong class="font-bold"><?= ucfirst($message['type']) ?>!</strong>
      <span class="block sm:inline"><?= $message['text'] ?></span>
    </div>
  <?php endif; ?>
  <div class="pt-4 mb-20 space-y-4">
    <?php foreach ($recipes as $recipe) : ?>
      <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
          <img class="rounded-t-lg h-40 w-full object-cover" src=" <?= '/' . $recipe['image_url'] ?>" alt="<?= $recipe['title'] ?>" />
        </a>
        <div class="p-5 space-y-2">
          <a class="flex items-center" href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
              <!-- title -->
              <?= $recipe['title'] ?>
            </h5>
            <span class="bg-red-100 font-medium text-red-700 text-sm px-2 ml-2 py-1 rounded-full"><?= $recipe['type'] ?></span>
          </a>
          <div class="flex gap-2 text-sm">
            <p>
              Preparation: <?= $recipe['preparation'] ?> mins
            </p>
            <p>
              Cook: <?= $recipe['cook'] ?> mins
            </p>
          </div>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $recipe['description'] ?></p>
          <div class="flex items-center justify-between">
            <div class="flex gap-2">
              <form action="<?= route_to('delete-recipe', $recipe['id']) ?>" method="post" class="">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
              </form>
              <a href="<?= base_url() . "recipes/edit/" . $recipe['id'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
              </a>
            </div>
            <a href="<?= base_url() . "recipes/show/" . $recipe['id'] ?>" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">View</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if (count($recipes) <= 0) : ?>
      <a href="<?= base_url() . 'recipes/create' ?>" class="flex mt-20 items-center justify-center gap-2 font-semibold text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>
        <span>Your recipe is empty you can add by click the</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </a>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection() ?>