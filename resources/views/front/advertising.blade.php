<div class="side__options">
    <h3 class="side__options_title">دوره های آموزشی</h3>
    <div class="side__options_items">
    @foreach($advertisings as $advertising)
        <a href="{{ $advertising->link }}" title="{{ $advertising->title }}" class="side__options_item_image">
            <img src="{{ url('storage/'.$advertising->path) }}">
        </a>
    @endforeach
    </div>
</div>