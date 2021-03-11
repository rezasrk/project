@if(request()->has('journal_id'))
    @include('front.profile.sections.create_journal')
@else
    @include('front.profile.sections.index_journal')
@endif
