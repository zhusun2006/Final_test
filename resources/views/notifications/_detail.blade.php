<li class="media @if ( ! $loop->last) border-bottom @endif">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      @if( $reply->admin_reply == null)
      您提交了一份名为：{{ $reply->title }}的申请，目前正在等待管理员审核，请耐心等待！
      <span class="meta float-right" title="{{ $reply->created_at }}">
        <i class="far fa-clock"></i>
        {{ $reply->created_at->diffForHumans() }}
      </span>
    </div>
    <form action="{{ route('replies.destroy', $reply->id ) }}" method="post" class="float-right" onsubmit="return confirm('您确定要执行撤销操作吗？');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn" >撤销</button>
    </form>
    <div class="reply-content">
      类型：{!! $reply->kind !!}
      
    </div>
    @else
      <br/>
      标题为“{{ $reply->title }}”的申请已经被管理员审批了，请注意查看消息通知！</a>
      <span class="meta float-right" title="{{ $reply->updated_at }}">
        <i class="far fa-clock"></i>
        {{ $reply->updated_at->diffForHumans() }}
      </span>
      <div class="reply-content">
      类型：{!! $reply->kind !!}   
      </div>
    @endif
  </div>
</li>