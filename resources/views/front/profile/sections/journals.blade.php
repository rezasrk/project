@if(request()->has('type') && request()->query('type') == 'create')
    @include('front.profile.sections.create_journal')
@elseif(request()->has('type') && request()->query('type') == 'numbers')
    @include('front.profile.sections.journal_number')
@else
    @include('front.profile.sections.index_journal')
@endif
