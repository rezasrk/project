@if(request()->query('type') == 'create')
    @include('front.profile.sections.create_publisher')
@else
    @include('front.profile.sections.index_publisher')
@endif
