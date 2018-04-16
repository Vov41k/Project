@extends('adminlte::page')
@section('content')


<div class="container">

	<div class="row">
		<h3>Продукт : {{$product->title}}</h3>
		<table class="table">
			<th>Зображення</th>
			<th>Редагувати</th>
			<th>Видалити</th>






				@foreach($images as $image)
				<tr>

					<td>	<img width="50px" height="50px" src="{{asset($image->url)}}" alt=""></td>
					<td>

		 <form enctype="multipart/form-data"  action="{{route('admin.changeonephotoimageslider', ['id'=>$product->id,'idim'=>$image->id])}}" method="POST" class="form-inline">
                                   <!--  <input type="hidden" name="_method" value="DELETE"> -->
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">

                                    <input type="file" name="image" class="form-control">
                                    <button type="submit" class="btn btn-info">Change
                                    </button>
                                    </div>

                                </form>
                      </td>

                      <td>

                                <form action="{{route('admin.deleteimageslider', ['id'=>$product->id,'idim'=>$image->id])}}" method="POST" class="form-inline" >
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger">delete
                                    </button>
                                </form>
                      </td>


				</tr>












	@endforeach




		</table>





	</div>



</div>


@endsection
