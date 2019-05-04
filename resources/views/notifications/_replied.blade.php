<li class="media @if ( ! $loop->last) border-bottom @endif">
  <div class="media-left">
    
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      @if( $notification->kind == '部门个人事务通告')
        管理员<span style="font-weight: bold;">{{ $notification->sender }}</span></a>
        给你发送了一份私人通告：
          <a href="{{ route('adminnotice', $notification->id) }}">{{ $notification->title }}</a>
          的申请，请注意及时查看！
          <span class="meta float-right" title="{{ $notification->created_at }}">
            <i class="far fa-clock"></i>
            {{ $notification->created_at->diffForHumans() }}
          </span>
      </div>
      <div class="reply-content">
        类型：{!! $notification->kind !!}
      </div>
      @else
        @if( $notification->admin_reply == null)
          用户<span style="font-weight: bold;">{{ $notification->sender }}</span></a>
          提交了一份名为：
          <a href="{{ route('check', $notification->id) }}">{{ $notification->title }}</a>
          的申请，请注意查看审核！
          <span class="meta float-right" title="{{ $notification->created_at }}">
            <i class="far fa-clock"></i>
            {{ $notification->created_at->diffForHumans() }}
          </span>
      </div>
      <div class="reply-content">
        类型：{!! $notification->kind !!}
      </div>
        @else
          <br/>
          标题为“{{ $notification->title }}”的申请已经被管理员审批了！<a href="{{ route('result', $notification->id) }}">点此查看详情</a>
          <span class="meta float-right" title="{{ $notification->created_at }}">
            <i class="far fa-clock"></i>
            {{ $notification->created_at->diffForHumans() }}
          </span>
        @endif
      @endif
  </div>
</li>