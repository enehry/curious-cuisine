<?= $this->extend('layout/authenticated') ?>

<?= $this->section('content') ?>
<?php $validation = session()->get('validation'); ?>
<section class="bg-gray-50 dark:bg-gray-900 h-screen">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="#" class="flex font-bold items-center mb-6 text-2xl text-gray-900 dark:text-white">
      User Profile
    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Update user profile
        </h1>
        <!-- Display success or error message if any -->
        <?php if (session()->has('message')) : ?>
          <?php $message = session('message'); ?>
          <div class="<?= $message['type'] === 'success' ? 'bg-green-50 text-green-800 border-green-500' : 'bg-red-100 text-red-800 border-red-500' ?> rounded-lg px-4 py-3 relative" role="alert">
            <strong class="font-bold"><?= ucfirst($message['type']) ?>!</strong>
            <span class="block sm:inline"><?= $message['text'] ?></span>
          </div>
        <?php endif; ?>
        <form class="space-y-4 md:space-y-6" action="<?= route_to('update-profile')  ?>" method="POST">
          <?= csrf_field() ?>
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
            <input type="text" name="name" id="name" value="<?= old('name', $user['name']) ?>" class="bg-gray-50 border <?= (isset($validation) &&  $validation->hasError('name')) ? 'border-red-500' : 'border-gray-300' ?> text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="John Dela Cruz" required="">
            <?php if (isset($validation) && $validation->hasError('name')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('name') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" value="<?= old('email', $user['email']) ?>" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('email')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="name@mail.com">
            <?php if (isset($validation) && $validation->hasError('email')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('email') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
            <input type="password" name="password" id="password" value="<?= old('password') ?>" placeholder="••••••••" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('password')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
            <?php if (isset($validation) && $validation->hasError('password')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('password') ?>
              </div>
            <?php endif; ?>
          </div>
          <div>
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" value="<?= old('confirm_password') ?>" placeholder="••••••••" class="bg-gray-50 border <?= (isset($validation) && $validation->hasError('confirm_password')) ? 'border-red-500' : 'border-gray-300' ?>  text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
            <?php if (isset($validation) && $validation->hasError('confirm_password')) : ?>
              <div class="text-xs text-red-500">
                <?= $validation->getError('confirm_password') ?>
              </div>
            <?php endif; ?>
          </div>
          <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Update</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>