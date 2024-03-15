<div class="col-lg-6">
    <div class="bg-white shadow-sm rounded-lg mb-4">
        <div class="max-w-xl">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="post" action="{{ url('/updateSystemInfo') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <div class="card-title text-center mb-4">
                                <h4 class="mb-sm-0 font-size-18">System Information</h4>
                            </div>
                            
                            {{-- Validation message --}}
                            @if (Session::has('SiteInfoSuccessMsg'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('SiteInfoSuccessMsg') }}
                                </div>
                            @endif
                            @if (Session::has('SiteInfoErrorMsg'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('SiteInfoErrorMsg') }}
                                </div>
                            @endif

                            <img class="img-fluid mt-2 w-25 h-25" src="{{ asset($siteInformationData->logo) }}" alt="logo">
                            <input id="logo" name="logo" type="file" class="form-control mt-2" autofocus autocomplete="logo">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="menu" class="form-label">{{ __('Title') }}</label>
            
                            <div class="mb-3">
                                <input type="text" class="form-control" name="title" value="{{ $siteInformationData->title }}">
                            </div>
            
                            @error('title')
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