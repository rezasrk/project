@extends('master')
@section('title',trans('title.dashboard-title'))
@section('content')
    <div class="row mt-4">
        @can('all-project-request-count')
            @include('partials.all_project_request_count')
        @endcan
        @can('current-project-request-count')
            @include('partials.current_project_request_count')
        @endif
    </div>
@endsection

