
<div class="container">
            <div class="head-top">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}"></a>

                </div>
          <div class=" h_menu4">
                <ul class="memenu skyblue">
                      <li class="active grid"><a class="color8" href="{{route('home')}}">Home</a></li>

                     @foreach ($category as $category)


                      @if($category->id==$id)

                            <li class="active grid"><a  href="{{route('category.show', $category->id)}}">{{ $category->category_name }}</a></li>

                          @else

                            <li><a class="color4" href="{{route('category.show', $category->id)}}">
                              {{ $category->category_name }}</a></li>

                          @endif

                       @endforeach


                         <li><a class="color6" href="{{route('news')}}">News</a></li>
                       <li><a class="color6" href="{{route('contact')}}">Contact Us</a></li>
              </ul>
            </div>

                <div class="clearfix"> </div>
        </div>
        </div>
