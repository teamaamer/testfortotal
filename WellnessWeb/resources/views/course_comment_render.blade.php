@foreach ($comments as $comment)
    <li>
        <div class="user">
            
            <span class="bold-h6">{{ $comment->account->name }}</span>
            <span class="date number">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p>1
            {{ $comment->comment }}
        </p>
    </li>
@endforeach
