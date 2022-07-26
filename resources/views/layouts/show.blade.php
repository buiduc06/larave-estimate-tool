@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Estimation</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('layouts.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card" style="height: 100vh">
            <div class="card-body">
                <div class="row w-100 h-100">
                    @include('layouts.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
