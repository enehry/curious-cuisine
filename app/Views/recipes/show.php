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
      <div class="flex items-center gap-2 text-white mt-2 text-sm font-medium">
        <div>Prep: <?= $recipe['preparation'] ?> mins </div>
        <div>Cook: <?= $recipe['cook'] ?> mins </div>
      </div>
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
  <section class="bg-white w-full px-8 max-w-screen-md mx-auto dark:bg-gray-900 py-8 lg:py-16 antialiased">
    <?php if (session()->has('message')) : ?>
      <?php $message = session('message'); ?>
      <div class="<?= $message['type'] === 'success' ? 'bg-green-50 text-green-800 border-green-500' : 'bg-red-100 text-red-800 border-red-500' ?> rounded-lg px-4 py-3 relative" role="alert">
        <strong class="font-bold"><?= ucfirst($message['type']) ?>!</strong>
        <span class="block sm:inline"><?= $message['text'] ?></span>
      </div>
    <?php endif; ?>
    <div class="">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments (<?= count($comments) ?>)</h2>
      </div>
      <form class="mb-6" method="POST" action="<?= route_to('add-comment') ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $recipe['id'] ?>" />
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
          <label for="comment" class="sr-only">Your comment</label>
          <textarea id="comment" name="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
        </div>
        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-red-500 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
          Post comment
        </button>
      </form>
      <?php foreach ($comments as $comment) : ?>
        <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
          <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
              <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="https://ui-avatars.com/api/?name=<?= $comment['name'] ?>&background=00000&color=fff" alt="<?= $comment['name'] ?>"><?= $comment['name'] ?></p>
              <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="<?= $comment['created_at'] ?>" title="<?= date_format(date_create($recipe['created_at']), 'M d, Y') ?>"><?= date_format(date_create($comment['created_at']), 'M d, Y') ?></time></p>
            </div>
            <?php if (session('id') === $comment['user_id']) : ?>
              <form action="<?= route_to('delete-comment', $comment['id']) ?>" method="post" class="">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
              </form>
            <?php endif; ?>
          </footer>
          <p class="text-gray-500 dark:text-gray-400">
            <?= $comment['comment'] ?>
          </p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<?= $this->endSection() ?>