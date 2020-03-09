@extends('layouts.app')


@section('content')

@if(isset($msg))
<h4 class="mb-3 pull-right"> עריכה <i class="fa fa-edit"></i>  </h4>


<form method="POST" action="{{ url('edit/todo/'.$msg->id) }}">

{{ csrf_field() }}


<input type="text" placeholder="Edit Message" value="{{$msg->message}}" class="form-control" name="message" style="" required />


   <div class="row mt-4">
    <div class="col-sm">
     <input type="text" placeholder="Icon" class="form-control " value="{{$msg->icon}}" name="icon"  />
    </div>
    <div class="col-sm">
     <input type="text" placeholder="Color Code" class="form-control  " value="{{ $msg->color }}" name="color" />
    </div>
    <div class="col-sm">
     <input type="submit" class="btn btn-primary btn-block  " value="Edit Todo" />
    </div>
  </div>

</form>
@else

<h4 class=" title-div">
    <button type="button" class="btn btn-plus" data-toggle="collapse" data-target="#todolist">
        <i class="fa fa-plus"></i>
    </button>
    <span class="rightp">משימות</span>
</h4>

<form method="POST" action="{{ url('add/todo') }}" class="collapse form-add" id="todolist">

{{ csrf_field() }}

<input type="text" placeholder="Add Message" class="form-control" name="message" style="" required />


   <div class="row mt-4">
    <div class="col-sm">
     <input type="text" placeholder="Icon" class="form-control " name="icon"  />
    </div>
    <div class="col-sm">
     <input type="text" placeholder="Color Code" class="form-control  " name="color" />
    </div>
    <div class="col-sm">
     <input type="submit" class="btn btn-success btn-block  " value="Add Todo" />
    </div>
  </div>

</form>
@endif



<div class="lists ">


    <ul class="list-group">
        @foreach($messages as $msg)
            <li style="border: 1px solid {{ $msg->color }}" class="list-group-item">
                <span class="pull-right">
                    <i class="fa fa-{{$msg->icon}}"></i><span class="format-date"> {{ date("h:i A d/m/Y", strtotime( $msg->created_at)) }}</span>
                {{ $msg->message }}
                </span>
                <span class="pull-left">
                  <a href="{{ url('edit/'.$msg->id) }}"> <i class="fa fa-edit"></i> </a>
                  <a href="{{ url('delete/'.$msg->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">  <i class="fa fa-remove"></i></a>
                </span>
        </li>
      @endforeach

      @if(count($messages) == 0)
      <li style="border: 1px solid " class="list-group-item"> ✉  Currently there is no messages </li>
      @endif
    </ul>
</div>

@stop
