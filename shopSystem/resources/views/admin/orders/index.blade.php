@extends('adminlte::page')
@section('content')
<div class="row">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover table-responsive table-bordered text-sm-center" id="table">
                    <tr class="text-align-center">
                        <thead class="bg-primary">
                        <th>
                            №
                        </th>
                        <th>
                            ПІБ покупця
                        </th>
                        <th>
                            Товар
                        </th>
                        <th>
                            Опції
                        </th>
                        <th>
                            Ціна, грн
                        </th>
                        <th>
                            К-сть, шт
                        </th>
                        <th>
                            Дата замов-ння
                        </th>
                        <th>
                            Статус
                        </th>
                        <th>
                            Mенеджер
                        </th>
                        <th>
                            Управління замовленням
                        </th>
                        </thead>
                    </tr>
                    <tbody>
                    @foreach($productsOrder as $productOrder)
                     <tr>
                         <td>
                             {{$productOrder->id}}
                         </td>
                     
                         <td>
                            {{$productOrder->order->user->name}}
                         </td>
                        <td><p>{{$productOrder->product->title}}</p>
                                <p><a href="{{route ('admin.product.show', ['id'=>$productOrder->product->id])}}">
                                        <img src="{{$productOrder->product->image}}" height="72" width="72"></a><p></td>
                                            <td>{{$productOrder->choisen_options}}</td>
                         <td>
                             {{$productOrder->product->price}}
                         </td>
                         <td>{{$productOrder->quantity}}</td>
                         <td>{{$productOrder->created_at}}</td>
                          <td>Статус</td>
                          <td>ПІБ МЕНЕДЖЕРА</td>
                           <td><a href="" class="btn btn-success btn-lg">Оформити</a>
                                    <form action="{{route('admin.orders.delete',['id'=>$productOrder->id])}}" method="POST">
                                     <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                     
                               </form>
                               <a href="{{route('admin.orders.edit', ['id'=>$productOrder->id])}}" class="btn btn-info btn-lg">Змінити</a>
                               </td>
                         






                     </tr>











                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
