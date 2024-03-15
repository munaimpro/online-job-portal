<div class="col-lg-6">
    <div class="bg-white shadow-sm rounded-lg mb-4">
        <div class="max-w-xl">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <div class="card-title text-center mb-4">
                            <h4 class="mb-sm-0 font-size-18">Navigation Menu</h4>
                        </div>

                        {{-- Validation message --}}
                        @if (Session::has('systemMenuSuccessMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('systemMenuSuccessMsg') }}
                            </div>
                        @endif
                        @if (Session::has('systemMenuErrorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('systemMenuErrorMsg') }}
                            </div>
                        @endif
                            
                        <form method="post" action="{{ url('/createSystemMenu') }}" class="mt-4">
                            @csrf

                            <label for="menu" class="form-label">{{ __('New Menu') }}</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="menu_name" placeholder="Menu name" required>
                                <input type="text" class="form-control" name="menu_link" placeholder="Menu link" required>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>

                        <div class="mb-2">
                            <p class="m-0 fw-bold">{{ __('Current Menus') }}</p>
                        </div>
                        @forelse ($siteMenuData as $siteMenu)
                            <form method="post" action="{{ url('updateSystemMenu/'.$siteMenu['id']) }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="menu_name" value="{{ $siteMenu['navigation_menu_name'] }}" required>
                                    <input type="text" class="form-control" name="menu_link" value="{{ $siteMenu['navigation_menu_link'] }}" required>
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    <a href="../deleteSystemMenu/{{ $siteMenu['id'] }}" class="btn btn-danger" type="button">{{ __('Delete') }}</a>
                                </div>
                            </form>
                        @empty
                            <div class="mb-3">
                                {{ ('No menu available') }}
                            </div>
                        @endforelse
        
                        @error('logo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>