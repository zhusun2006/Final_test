<li class="media @if ( ! $loop->last) border-bottom @endif">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      用户<a href="{{ route('users.show', $notification->sender) }}">{{ $notification->sender }}</a>
      提交了一份
      <a href="{{ route('check', $notification->id) }}">{{ $notification->kind }}</a>

      {{-- 回复删除按钮 --}}
      <span class="meta float-right" title="{{ $notification->created_at }}">
        <i class="far fa-clock"></i>
        {{ $notification->created_at->diffForHumans() }}
      </span>
    </div>
    <div class="reply-content">
      {!! $notification->content !!}
    </div>
  </div>
</li>