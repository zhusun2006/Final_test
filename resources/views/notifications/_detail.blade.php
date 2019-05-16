<li class="media @if ( ! $loop->last) border-bottom @endif">
  <div class="media-left">
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <br/>
      @if( $reply->status == "待审核")
      申请标题：{{ $reply->title }}
      <span class="meta float-right" title="{{ $reply->created_at }}">
        <i class="far fa-clock"></i>
      申请时间：{{ $reply->created_at->diffForHumans() }}
      </span>
    </div>
    <form action="{{ route('replies.destroy', $reply->id ) }}" method="post" class="float-right" onsubmit="return confirm('您确定要执行撤销操作吗？');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn" >撤销</button>
    </form>
    <div class="reply-content">
      类型：{!! $reply->kind !!}
      <br/>
      状态：{!! $reply->status !!}
    </div>
    @else
      @if( $reply->status == "被驳回" )
      申请标题：<a href="{{ route('resultofedit', $reply->id) }}">{{ $reply->title }}</a>
      @else
      申请标题：<a href="{{ route('resultofreply', $reply->id) }}">{{ $reply->title }}</a>
      @endif
      <span class="meta float-right" title="{{ $reply->updated_at }}">
        <i class="far fa-clock"></i>
      申请时间：{{ $reply->updated_at->diffForHumans() }}
      </span>
      <div class="reply-content">
      类型：{!! $reply->kind !!}   
      <br/>
      状态：{!! $reply->status !!}
      </div>
    @endif
  </div>
</li>



