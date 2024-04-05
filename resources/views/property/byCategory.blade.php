@extends("layout.layout")

@section("main")

    <!--  Main Content  -->
    <section class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-0 m-0">

        <!--  If filter By Category  -->
        <div th:if="${slug}" class="p-3 rounded rounded-md bg-white text-gray-950">
            <a href="/" class=" text-blue-600">All</a> \ <strong th:text="${slug}" class=""></strong>
        </div>
        <!--  End If filter By Category  -->

        <div class="px-8">
            <div class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-5">
                @foreach($properties as $property)
                <div class="bg-white rounded-lg overflow-hidden shadow-md px-2 my-4 mx-2">
                    <img class="w-full h-36 object-cover" src="/uploads/{{$property->thumbnail}}" alt="Card image cap">
                    <div class="p-3">
                        <h5 class="text-xl mb-2">
                            <strong class="text-xl">{{$property->title}}</strong> |
                            <sub class="text-blue-800">
                                {{$property->sqft}} <sup>sqft</sup>
                            </sub> |
                            <sup class="text-blue-800">
                                {{$property->price}} <sup>RUB</sup>
                            </sup>
                        </h5>
                        <small>
                            {{$property->location}}
                        </small>
                        <p class="text-gray-600">
                            {{ substr($property->description, 0, 100) }}
                        </p>
                        <a href="/property/{{$property->id}}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Book</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Main Content  -->

@endsection