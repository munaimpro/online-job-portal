<div class="col-lg-6">
    <div class="bg-white shadow-sm rounded-lg mb-4">
        <div class="max-w-xl">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">{{ __('Update Password') }}</h3>
                        @if (session('status') === 'password-updated')
                                <div class="alert alert-success" role="alert">
                                    {{ __('Password Updated Successfully') }}
                                </div>
                        @endif
                    <!-- <p class="card-text text-center text-muted">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p> -->
                    
                    <form method="post" action="{{ route('password.update') }}" class="mt-4">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>