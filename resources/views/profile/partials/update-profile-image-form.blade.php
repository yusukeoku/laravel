<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('プロフィール画像') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("プロフィール画像を変更します。") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profileimage.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-picture-input />
            <x-input-error class="mt-2" :messages="$errors->get('picture')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('変更') }}</x-primary-button>

            @if (session('status') === 'profileimage-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('変更しました。') }}</p>
            @endif
        </div>
    </form>
</section>
