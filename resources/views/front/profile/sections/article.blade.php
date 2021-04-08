@if(request()->has('type') && request()->has('article_id'))
    @include('front.profile.sections.edit_article')
@elseif(request()->has('type'))
    @include('front.profile.sections.create_article')
@else
    @include('front.profile.sections.index_article')
@endif
