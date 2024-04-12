@extends("layout.layout")

@section("title")
    <title>{{ $category->name }}</title>
@endsection

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
                <div class="grid grid-cols-4 md:grid-cols-4 xl:grid-cols-4 px-8 m-5">
                    @foreach($properties as $property)
                        @include("layout.parts.CardProperty", [ "property" => $property ])
                    @endforeach
                </div>
            </div>
        @endif
    </section>
    <!-- End Main Content  -->

@endsection