<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <?php echo e(__('プロフィール画像')); ?>

        </h2>

        <p class="mt-1 text-sm text-gray-600">
            <?php echo e(__("アカウントのプロフィール画像を更新できます")); ?>

        </p>
    </header>

    <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>">
        <?php echo csrf_field(); ?>
    </form>

    <img src="<?php echo e(asset('storage/'.$user->profile_image)); ?>" alt="プロフィール画像">

</section>
<?php /**PATH /Applications/MAMP/htdocs/laravel/resources/views/profile/partials/update-profile-image-form.blade.php ENDPATH**/ ?>