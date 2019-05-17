@extends('layouts.default')
@section('title','事务申请')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            事务申请
          </h2>
          <hr>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="is_check" value="0"/>
              @include('shared._errors')

              <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请类型：</label>
                <select class="form-control" id="test" name="category_id" required style="display: inline;width:85%;">
                  <option value="" name="kind" hidden disabled selected>分类</option>
                  <option value="报销申请">报销申请</option>
                  <option value="请假申请">请假申请</option>
                  <option value="物资申请">物资申请</option>
                </select>
              </div>
              @if(Auth::user()->is_admin == 0)
              <div class="form-group">           
                <label class="input-group-addon" style="font-size: 17px;">接收用户：</label>
                <select class="form-control" name="user_name" required style="display: inline;width:85%;">
                  <option value="" hidden disabled selected>下拉显示部门管理员</option>
                  @foreach ($admin_list as $value)
                      <option value="{{ $value->name }}">
                        {{ $value->name }}
                      </option>
                  @endforeach
                </select>
              </div>
              @else
              <div class="form-group" > 
                <label class="input-group-addon" style="font-size: 17px;">接收用户：</label>
                <input class="form-control" type="hidden" name="user_name" id="hidden" value="" style="display: inline;width:85%;"/>
                <input class="form-control" type="text" name="user_name" id="selected" value="" style="display: inline;width:85%;" disabled />
              </div>
              @endif
              <div class="form-group" > 
                <label class="input-group-addon" style="font-size: 17px;">申请标题：</label>
                <input class="form-control" type="text" name="title" value="" style="display: inline;width:85%;" placeholder="请填入申请标题"/>
              </div>
          
              <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="15" placeholder="请填入内容" required style="width:98.5%;"></textarea>
              </div>

      			  <div class="form-group">
      			    <label class="sr-only" for="inputfile">添加附件</label>
      			    <input type="file" id="file" name="file" >
      			  </div>

              <div class="well well-sm">
                <button type="submit" name="comfirm" value="待审核" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>提交</button>          
              </div>          
            </form>         
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  
  $('#test').on("change",function(){      
    var option = $('#test option:selected').val();
    $.ajax({
        type: 'POST',
        url: '/getadmin',
        data: { content : option, _token:"{{csrf_token()}}"},
        dataType: 'json',                
        success: function(msg,data){            
              $("#selected").val(msg.data);
              $("#hidden").val(msg.data);
        },
        error: function(msg){
            console.log(msg);
        }
    }); 
  });  
</script>

@endsection