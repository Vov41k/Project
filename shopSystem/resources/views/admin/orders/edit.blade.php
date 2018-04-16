@extends('adminlte::page')
@section('content')

 <form action="{{route('admin.orders.update',$productOrder->id)}}" method="post" enctype="multipart/form-data">
                   {{csrf_field ()}}
      {{ method_field('PATCH') }}
        <div class="form-group">
                        <label for="id">ID</label>
                        <p name="id">{{$productOrder->id}}</p>
                   
                    </div>
                      <div class="form-group">
                        <label for="name">ПІБ покупця</label>
                        <p name="name">{{$productOrder->order->user->name}}</p>
                   
                    </div>
                  <div class="form-group">
                      @foreach($arrOptionValue as $key=>$value)
										  <label for="{{$key}}">{{$key}}</label>
										  
										  <!-- exemple $key =Color than Size -->
                        			<select name="{{$key}}" id="{{$key}}" class="form-control" >

                            @foreach($value as $key2=>$val)
                         <!--    exemple $key2 == Red than XXL -->
                                <option value="{{$val}}" id="{{$key2}}">{{$val}}</option>
                                
<!--                                key2 on value-->
                                @endforeach

                        </select>
                          @endforeach

                  </div>
                       <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="text" name="qty" value="{{$productOrder->quantity}}">
                     
                   
                    </div>

                  <hr>







                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success">
                                Зберегти
                            </button>
                        </div>
                    </div>







                </form>






@endsection
