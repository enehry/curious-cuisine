<?= $this->extend('layout/guest') ?>

<?= $this->section('content') ?>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" class="flex font-bold items-center mb-6 text-2xl text-gray-900 dark:text-white">
      Curious Cuisine
    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Sign up for an account
        </h1>
        <form class="space-y-4 md:space-y-6" action="<?= route_to('submit-register')  ?>" method="POST">
          <?= csrf_field() ?>
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="bg-gray-50 border <?= (isset($validation) &&  $validation->hasError('name')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="John Dela Cruz" required="">
            <?php if (isset($validation) && $validation->hasError('name')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('name') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" value="<?= set_value('email') ?>" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('email')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="name@mail.com" required="">
            <?php if (isset($validation) && $validation->hasError('email')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('email') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" value="<?= set_value('password') ?>" placeholder="••••••••" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('password')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required="">
            <?php if (isset($validation) && $validation->hasError('password')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('password') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" value="<?= set_value('confirm_password') ?>" placeholder="••••••••" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('confirm_password')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required="">
            <?php if (isset($validation) && $validation->hasError('confirm_password')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('confirm_password') ?>
              </div>
            <?php endif; ?>
          </div>

          <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sign in</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Already have an account? <a href="<?= route_to('login') ?>" class="font-medium text-red-600 hover:underline dark:text-red-500">Sign Up</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>