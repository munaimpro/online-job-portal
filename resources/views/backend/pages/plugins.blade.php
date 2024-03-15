@extends('backend.layout.app')

@section('page-content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plugins</h1>
    </div>

    <!-- Company List Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                @if(Auth()->user()->role == 1)
                    @forelse ($plugins as $pluginsItem)
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card h-100 py-2">
                                <div class="card-body text-center">
                                    <div class="mb-5">
                                        <h2>{{ $pluginsItem->plugin }}</h2>
                                    </div>
                                    @if($pluginsItem->status == 0)
                                        <div class="plugin-button text-right">
                                            <a href="{{ url('activate_plugin/'.$pluginsItem->id) }}" class="btn btn-primary">Activate</a>
                                        </div>
                                    @else
                                        <div class="plugin-button text-right">
                                            <a href="{{ url('deactivate_plugin/'.$pluginsItem->id) }}" class="btn btn-danger float-end" type="submit">Deactivate</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> 
                    @empty
                        <div class="card-body text-center"><h5>No plugin available</h5></div>
                    @endforelse
                @else
                    @forelse ($companyPlugins as $pluginsItem)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card h-100 py-2">
                            <div class="card-body text-center">
                                <div class="mb-5">
                                    <h2>{{ $pluginsItem->plugin }}</h2>
                                </div>
                                @if($pluginsItem->status == 0)
                                    <div class="plugin-button text-right">
                                        <a href="{{ url('activate_plugin/'.$pluginsItem->id) }}" class="btn btn-primary">Activate</a>
                                    </div>
                                @else
                                    <div class="plugin-button text-right">
                                        <a href="{{ url('deactivate_plugin/'.$pluginsItem->id) }}" class="btn btn-danger float-end" type="submit">Deactivate</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div> 
                    @empty
                        <div class="card-body text-center"><h5>No plugin available</h5></div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection