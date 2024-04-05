@extends("layout.layout")

@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-0 m-0" style="max-height: 100vh; overflow-y: auto;">

        <!--  Slider  -->
        <section class="splide px-8" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($properties as $property)
                        <li class="splide__slide cursor-pointer" onclick="window.location=`${this.dataset.href}`"
                            data-href="'/property/'{{ $property->id }}">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md my-4 mx-2">
                                <img class="w-full h-56 object-cover"
                                     src="{{ $property->thumbnail }}"
                                     alt="Card image cap">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!--  Slider Script  -->
        <script>
			new Splide('.splide', {
				pagination: false,
				type: 'loop',
				drag: 'free',
				focus: 'center',
				perPage: 4,
				autoScroll: {
					speed: 1,
				},
			}).mount();
        </script>
        <!--  Slider Script  -->

        <!--  End Slider  -->

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
                    <div class="w-full bg-blue-500 rounded-s text-blue-50 px-5 py-3">Top Properties</div>
                    <div id="properties-container" class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-5">
                        @foreach($properties as $property)
                        <div class="property bg-white rounded-lg overflow-hidden shadow-md px-2 my-4 mx-2">
                            <img class="w-full h-36 object-cover" src="/{{$property->thumbnail}}"
                                 alt="Card image cap">
                            <div class="p-3">
                                <h5 class="text-xl mb-2">
                                    <strong class="text-xl">{{$property->title}}</strong>
                                    <small class="text-gray-400">
                                        {{$property->sqft}}sqft
                                    </small>
                                </h5>
                                <h3>
                                    <small class="text-gray-400">
                                        {{$property->price}}RUB
                                    </small>
                                </h3>
                                <p class="text-gray-600">
                                    {{ substr($property->description, 0, 100) }}
                                </p>
                                <a href="/property/{{$property->id}}"
                                   class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Book</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full my-4 text-center">
                    <button onclick="loadMoreProperties()"
                            class="px-5 py-2 text-white bg-blue-700 cursor-progress rounded-md shadow-md">Load More
                    </button>
                </div>
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
							url: "/scroll-more?page=2&size=33",
							context: document.body
						}).done(data => {
							console.log(data);
							if (data.status == "success") {
								let properties = [...data.properties].reduce((accumulator, property) => {
									return accumulator + makeCard(property)
								}, "");
								$("#properties-container").append(properties);
							} else {

							}


							disableLoadMoreButton = !disableLoadMoreButton;
							loadMoreButton.classList.remove("bg-blue-400");
							loadMoreButton.classList.remove("cursor-progress");
							loadMoreButton.classList.add("bg-blue-700");
							loadMoreButton.classList.add("cursor-pointer");
						});
					}

					const makeCard = property => {
						let card = `<div class="bg-white rounded-lg overflow-hidden shadow-md px-2 my-4 mx-2">
                            <img class="w-full h-36 object-cover" src="uploads/${property.thumbnail}" alt="Card image cap">
                            <div class="p-3">
                                <h5 class="text-xl mb-2">
                                    <strong class="text-xl">${property.title}</strong>
                                    <small class="text-gray-400"> x ${property.sqft} sqft</small>
                                </h5>
                                <p class="text-gray-600">
                                    ${property.description}
                                </p>
                                <a href="/property/+${property.id}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Book</a>
                            </div>
                        </div>`

						return card;
					}
                </script>
            </div>
            <!--  End Property List  -->

            <!-- Reviews -->
            <div class="col-span-1 bg-gray-50 p-0 rounded-sm" style="max-height: 60vh; overflow-y: hidden">
                <div class="w-full py-3 px-5 bg-blue-900 text-white">
                    Reviews
                </div>
                <div style="max-height: 100%; overflow-y: auto">
                    @foreach($reviews as $review)
                    <div class="w-full p-2 rounded-sm border shadow-sm mb-2 bg-gray-100">
                        <div class="content">
                            <small>
                                {{ $review->content }}
                            </small>
                        </div>
                        <div class="reviewer mt-4">
                            <img src="{{ $review->user->image }}" class="inline-block" width="50px" height="50px" alt="">
                            <a href="/" class="inline-block">{{ $review->user->name }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <!-- End Reviews -->

        </div>
    </section>
@endsection