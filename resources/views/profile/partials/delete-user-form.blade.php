<section class="container mt-5 space-y-6">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">{{ __('Delete Account') }}</h2>
        </div>
        <div class="card-body">
            <p class="text-muted">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>

            <button
                class="btn btn-danger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >
                {{ __('Delete Account') }}
            </button>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h2 class="h6 mb-3">{{ __('Are you sure you want to delete your account?') }}</h2>

            <p class="text-muted mb-4">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

<!-- Ajouter le CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- Ajouter le JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>