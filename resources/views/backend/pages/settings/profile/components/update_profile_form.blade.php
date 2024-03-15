<div class="col-lg-6">
    <div class="bg-white shadow-sm rounded-lg mb-4">
        <div class="max-w-xl">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">{{ __('Profile Information') }}</h3>
                        @if (session('status') === 'profile-updated')
                                <div class="alert alert-success" role="alert">
                                    {{ __('Profile Information Updated') }}
                                </div>
                        @endif
                    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" readonly>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-muted">
                                        {{ __('Your email address is unverified.') }}
                                        <button form="send-verification" class="btn btn-link btn-sm">{{ __('Resend verification email') }}</button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="text-success">{{ __('A new verification link has been sent to your email address.') }}</p>
                                    @endif
                                </div>
                            @endif
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