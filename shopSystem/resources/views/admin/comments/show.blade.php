@extends('adminlte::page')
<style>
  .rating {
    overflow: hidden;
    display: inline-block;
}

.rating-input {
    float: right;
    width: 16px;
    height: 16px;
    padding: 0;
    margin: 0 0 0 -16px;
    opacity: 0;
}

.rating-star {
    cursor: pointer;
    position: relative;
    display: block;
    width: 16px;
    height: 16px;
    background: url('/images/stars.png') 0 -16px;
}

.rating-star:hover {
    background-position: 0 0;
}
.rating-star {
    position: relative;
    float: right;
    display: block;
    width: 16px;
    height: 16px;
    background: url('/images/stars.png') 0 -16px;
}

.rating-star:hover,
.rating-star:hover ~ .rating-star {
    background-position: 0 0;
}
.rating-star:hover,
.rating-star:hover ~ .rating-star,
.rating-input:checked ~ .rating-star {
    background-position: 0 0;
}

.rating:hover .rating-star:hover,
.rating:hover .rating-star:hover ~ .rating-star,
.rating-input:checked ~ .rating-star {
    background-position: 0 0;
}

.rating-star,
.rating:hover .rating-star {
    position: relative;
    float: right;
    display: block;
    width: 16px;
    height: 16px;
    background: url('/images/stars.png') 0 -16px;
}
</style>
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<h1>Comments</h1>

  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Body</th>
        <th>Vote</th>


        <th>Activate</th>
         <th>Delete</th>

      </tr>
    </thead>
     <tbody>



<ul class="star-footer">

  @foreach($comments as $comment)
      <tr>
        <td>{{$comment->user->name}}</td>

        <td>{{$comment->body}} </td>

         <td>{{$comment->vote}}</td>

           <td><input data-action="{{route('admin.comments.activate', ['id'=>$comment->id])}}" type="checkbox"
                                       name="activatebtnnew" value="{{$comment->id}}"
                                        {{($comment->active==1)?'checked="checked"' : ''}}>
          </td>
         <td><form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
           {{ csrf_field() }}
             <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Delete</button>
         </form></td>

      </tr>

   


  @endforeach


  </tbody>
  </table>
  </div>
  <div class="card">

                        <div class="card-block">

                          <form action="{{route('admin.comments.store')}}" method="POST">
                             {{ csrf_field() }}



                            <div class="form-group">
                              <textarea name="body" cols="30" class="form-control" rows="10" placeholder="YOUR Comments here"></textarea>
                              <input type="hidden" name="product_id" value="{{ $id }}" />

                            </div>
                              <div class="form-group">
                                <span class="rating">
                            <input type="radio" class="rating-input"
                                   id="rating-input-1-5" name="rating-input-1" value="5">
                            <label for="rating-input-1-5" class="rating-star" ></label>
                            <input type="radio" class="rating-input"
                                   id="rating-input-1-4" name="rating-input-1" value="4">
                            <label for="rating-input-1-4" class="rating-star"></label>
                            <input type="radio" class="rating-input"
                                   id="rating-input-1-3" name="rating-input-1" value="3">
                            <label for="rating-input-1-3" class="rating-star"></label>
                            <input type="radio" class="rating-input"
                                   id="rating-input-1-2" name="rating-input-1" value="2">
                            <label for="rating-input-1-2" class="rating-star"></label>
                            <input type="radio" class="rating-input"
                                   id="rating-input-1-1" name="rating-input-1" value="1">
                            <label for="rating-input-1-1" class="rating-star"></label>
                        </span>
                              </div>



                            <div class="form-group">
                              <button type="submit" class="btn btn-danger">SAVE</button>
                            </div>
                          </form>

                        </div>



                    </div>


 <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- </ul> -->
@section('js')
<script>
        $(document).ready(function () {
            checkbox2 = $('input[name="activatebtnnew"]');
            checkbox2.change(function () {
                var url = $(this).data('action');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: url,
                    contentType: 'json',
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                    }
                })
            })
        });
    </script>
@endsection
@endsection

