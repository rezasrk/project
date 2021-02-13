<div class="col-md-12">
    <div class="card card-success card-outline direct-chat direct-chat-success">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
            <div class="direct-chat-messages">

                @foreach($rq->comments as $comment)
                    @if(auth()->id() != $comment->creator->id)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">{{ $comment->creator->name }}</span>
                                <span class="direct-chat-timestamp float-left">{{ $comment->created_at_jalali }}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('images/default-receiver.jpeg') }}"
                                 alt="Message User Image">
                            <div class="direct-chat-text">
                                {{ $comment->description }}
                            </div>
                        </div>
                    @else
                    <!-- current user -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $comment->creator->name }}</span>
                                <span class="direct-chat-timestamp float-right">{{ $comment->created_at_jalali }}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('images/default-sender.jpeg') }}"
                                 alt="Message User Image">
                            <div class="direct-chat-text">
                                {{ $comment->description }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>

        <div class="card-footer">
            <form action="{{ route('action.requestComment') }}" method="post">
                <div class="input-group">
                    <textarea type="text" name="description" placeholder="متن پیام رو بنویسید"
                              class="form-control"></textarea>
                    <span class="input-group-append">
                      <button type="button" class="btn btn-success store-comment"
                              data-url="{{ route('action.requestCommentForm') . '?request_id=' .$requestId }}">ارسال پیام</button>
                    </span>
                </div>
                <input type="hidden" name="request_id" value="{{ $requestId }}">
            </form>
        </div>
    </div>
</div>
