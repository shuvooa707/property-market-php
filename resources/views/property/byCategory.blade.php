@extends("layout.layout")

@section("main")

    <!--  Main Content  -->
    <section style="" class="grid grid-cols-1 h-full md:grid-cols-1 xl:grid-cols-1 p-0 m-0">
        @if($properties->count() == 0)
            <h1 class="bg-gray-50 pt-5 text-gray-900"
                style="font-size: 44px; text-align: center;">
                <br>
                <br>
                <br>
                No Properties
            </h1>
        @else
            <!--  If filter By Category  -->
            <div class="p-3 m-5 mx-8 rounded rounded-md bg-white text-gray-950">
                <strong>
                    {{ $category->name }}
                </strong>
                <strong class="bg-gray-300 text-gray-900 rounded-md p-1">
                    {{ $category->properties->count() }}
                </strong>
            </div>
            <!--  End If filter By Category  -->
            <div class="px-8">
                <div class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-5">
                    @foreach($properties as $property)
                        <div class="property bg-white rounded overflow-hidden shadow-md my-4 mx-2">
                            <img class="w-full h-36 object-cover" src="/{{$property->thumbnail}}"
                                 alt="Card image cap">
                            <div class="p-3">
                                <h5 class="mb-2">
                                    <a href="{{ route('property.show', ['id' => $property->id]) }}" class="text-blue-900 text-xl">
                                        {{$property->title}}
                                    </a>
                                    <sup class="text-xxl">.</sup>
                                    <small class="text-gray-700">
                                        {{$property->sqft}}<b>sqft</b>
                                    </small>
                                    <sup class="text-xxl">.</sup>
                                    <small class="text-gray-700">
                                        {{$property->price}}<b>₽</b>
                                    </small>
                                </h5>
                                <h5 class="">
                                    <span class="bg-gray-100 px-2 py-1 m-0 mdi mdi-map-marker text-red-400"></span>
                                    <small class="bg-gray-100 px-2 py-1">{{ $property->address->city }}</small>
                                </h5>
                                <hr>
                                <small class="text-gray-600 text-xm ">
                                    {{ substr($property->summery, 0, 100) }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
    <!-- End Main Content  -->

@endsection