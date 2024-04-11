@extends("layout.layout")

@section("script")

@endsection

@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-0 m-0" style="max-height: 100vh; overflow-y: auto;">

        <!--  Slick Slider  -->
        <div class="slick-slider">
            @foreach($properties as $property)
                <div class="bg-white rounded-lg overflow-hidden shadow-md my-4 mx-2">
                    <img class="w-full h-56 object-cover"
                         src="{{ $property->thumbnail }}"
                         alt="Card image cap">
                </div>
            @endforeach
        </div>
        <script>
            $('.slick-slider').slick({
                arrows:  false,
                autoplay: true
            });
        </script>
        <!--  End Slick Slider  -->




        <!--  If filter By Category  -->
{{--        <div th:if="${slug}" class="p-3 rounded-md bg-white text-gray-950">--}}
{{--            <a href="/" class=" text-blue-600">All</a> \ <strong th:text="${slug}" class=""></strong>--}}
{{--        </div>--}}
        <!--  End If filter By Category  -->

        <!--  Property List  -->
        <div class="grid grid-cols-4 px-3">
            <!--  Property List  -->
            <div class="col-span-3">
                <div class="px-5">
{{--                    <div class="w-full bg-blue-500 rounded-s text-blue-50 px-5 py-3">Top Properties</div>--}}
                    <div id="properties-container" class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-0">
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
                                        {{$property->sqft}}sqft
                                    </small>
                                    <sup class="text-xxl">.</sup>
                                    <small class="text-gray-700">
                                        {{$property->price}} <b>₽</b>
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
                @if($properties->hasMorePages())
                <div class="w-full my-4 text-center">
                    <button onclick="loadMoreProperties()"
                            class="px-5 py-2 text-white bg-blue-700 cursor-progress rounded-md shadow-md">Load More
                    </button>
                </div>
                @endif
                <script>
					let page = 0;
					let size = 33;
					let disableLoadMoreButton = false;
					const loadMoreProperties = function (event) {
						if (disableLoadMoreButton) return;
						disableLoadMoreButton = !disableLoadMoreButton;
						let loadMoreButton = window.event.target;
						loadMoreButton.classList.remove("bg-blue-700");
						loadMoreButton.classList.remove("cursor-pointer");
						loadMoreButton.classList.add("bg-blue-400");
						loadMoreButton.classList.add("cursor-progress");
						$.ajax({
							url: "{{ route('property.scroll-more', [ 'page' => 1, 'size' => 9 ]) }}",
							context: document.body
						}).done(res => {
                            let accumulator = ``;
                            for (property of res.data) {
                                accumulator = accumulator + makeCard(property)
                            }
                            $("#properties-container").append(accumulator);


							disableLoadMoreButton = !disableLoadMoreButton;
							loadMoreButton.classList.remove("bg-blue-400");
							loadMoreButton.classList.remove("cursor-progress");
							loadMoreButton.classList.add("bg-blue-700");
							loadMoreButton.classList.add("cursor-pointer");
						});
					}

					const makeCard = property => {
						let card = `
                        <div class="bg-white rounded-lg overflow-hidden shadow-md px-2 my-4 mx-2">
                            <img class="w-full h-36 object-cover" src="/${property.thumbnail}" alt="Card image cap">
                            <div class="p-3">
                                <h5 class="text-xl mb-2">
                                    <a href='/property/${property.id}' class="text-blue-900 text-xl">${property.title}</a>
                                    <sup class="text-xxl">.</sup>
        						    <small class="text-gray-400"> x ${property.sqft} sqft</small>
                                    <sup class="text-xxl">.</sup>
                                    <small class="text-gray-700">
                                        ${property.price} <b>₽</b>
                                    </small>
                                </h5>
                                <p class="text-gray-600">
                                    ${property.summery}
                                </p>
                            </div>
                        </div>`

						return card;
					}
                </script>
            </div>
            <!--  End Property List  -->

            <!-- Reviews -->
            <div class="col-span-1 bg-gray-50 ml-2 mt-43 rounded-sm" style="height: auto; overflow-y: hidden">
                <div class="w-full py-3 px-5 bg-blue-900 text-white">
                    Reviews
                </div>
                <div style="max-height: 100%; overflow-y: auto" class=" p-2">
                    @foreach($reviews as $review)
                        <div class="w-full p-2 rounded-sm border shadow-sm mb-2 bg-gray-100">
                            <div class="content text-gray-500">
                                <div class="flex">
                                    <img class="m-2 rounded-sm" style="width: 50px; height: 50px;" src="{{ url($review->property->thumbnail) }}">
                                    <div>
                                        <a class=" mx-1" href="{{ route('property.show', [ 'id' => $review->property->id ]) }}">{{ $review->property->title }}</a>
                                        <sup>.</sup>
                                        @for($i = 0; $i< $review->rating; $i++)
                                            <span class="mdi mdi-star text-green-600"></span>
                                        @endfor
                                    </div>
                                </div>
                                <small>
                                    {{ substr($review->content,0, 150) }}...
                                </small>
                            </div>
                            <hr>
                            <div class="reviewer mt-4 flex">
                                <img src="{{ url($review->user->image) }}"
                                     class="inline-block"
                                     alt=""
                                     style="width:50px; height:50px; border: 5px solid white; outline: 1px solid #ddd; border-radius: 50%;"
                                >
                                <span class="inline-block text-blue-700">
											<strong>
												{{ $review->user->name }}
											</strong>
											<br>
											<span class="text-red-500" style="font-size: 10px!important;">
												{{ \Illuminate\Support\Carbon::make($review->created_at)->diffForHumans() }}
											</span>
										</span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- End Reviews -->

        </div>
    </section>
@endsection