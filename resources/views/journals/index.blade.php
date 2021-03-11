@extends('master')

@section('title','مجله')

@section('content')
    <section class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title p-3">مجله</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('journals.partials.journals')
                </div>
            </div>
        </div>
    </section>
@endsection
