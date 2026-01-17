@foreach ($comments as $comment)

<div class="comment mb-3 pb-2 border-bottom">

    <strong>{{ $comment->account->name }}</strong>
    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>

    <p class="mt-1 mb-0">{{ $comment->comment }}</p>

</div>
@endforeach
