@extends("layout.layout")

@section("title")
	<title>Property Market</title>
@endsection

@section("scripts")
	<script type="text/javascript" defer>
		let title = document.title;
		let flag = 1;
		setInterval(()=>{
			if(flag) {
				document.title = `🚃`;
				flag = 0;
			}
			else {
				document.title = title;
				flag = 1;
			}
		}, 2000)
	</script>
@endsection

@section("styles")
	<style type="text/css">
        .review .content {
            position: relative;
        }
        .review .content::after {
            content: '';
            position: absolute;
            top: 100%;
            z-index: 9999;
            left: 4px;
            transform: translateY(0%);
            border: 15px solid transparent;
            border-top-color: #e8eaed;
        }
	</style>
@endsection

@section("main")
	<form class="" id="searchForm" method="get" action="/property/search">
		<!--  Main Content  -->
		<section class="px-8 mx-8 mt-8 flex">

		<!--  Search Panel  -->
		<div class="col-span-1 bg-gray-50 shadow-md p-1" style="max-width: 380px">
			<div class="text-center">
				<strong>Price</strong>
				<div class="flex">
					<div class="w-2/4 p-1">
						<input value="{{ \request()->get('from') }}" type="text" class=" bg-gray-50  rounded-md w-full border-gray-300" name="from">
						<small>From</small>
					</div>
					<div class="w-2/4 p-1">
						<input value="{{ \request()->get('to') }}" type="text" class=" bg-gray-50  rounded-md w-full border-gray-300" name="to">
						<small class="">To</small>
					</div>
				</div>
			</div>
			<div class="w-full">
				<div class="w-full bg-blue-900 flex justify-between text-white p-2 mt-4">
					<strong>Categories</strong>
					<small class="text-white cursor-pointer">
						clear
					</small>
				</div>
				<!--  Category Container  -->
				<div class="w-full p-2" style="max-height: 600px; overflow-x: hidden;">
					<div class="w-full pb-3">
						<input oninput="filterCategory(this)" type="text"
						       class=" bg-gray-50  p-1 py-0 m-1.5 rounded-md w-full border-gray-200" placeholder="Search Category">
					</div>
					<div style="max-height: 600px; overflow-y: auto; overflow-x: hidden;">
						@foreach($categories as $category)
							<div data-value="{{ $category->name }}"
							     class=" flex items-center mb-4 cursor-pointer" style="overflow: hidden;">
								{{--								<input type="hidden" id="categoriesSelected" name="category" value="{{ \request()->get('category') }}">--}}

								<input name="categories[]" onchange="updateCategories()"
								       id="category-{{ $category->id }}" type="checkbox"
								       value="{{ $category->id }}"
								       {{ in_array($category->id, \request()->get('categories') ?? []) ? 'checked' : '' }}
								       class=" bg-gray-50  category w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 dark:bg-gray-700">
								<label for="category-{{ $category->id }}"
								       class=" bg-gray-50  ms-2 cursor-pointer text-sm font-medium text-gray-900">
									{{ $category->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
				<!-- End Category Container  -->
			</div>

			<!--  Search Button  -->
			<div class="w-full mt-4">
				<button class="bg-blue-500 text-white p-2 w-full rounded-md">Search</button>
			</div>
			<div class="w-full mt-4 text-right pr-3">
				<span class="text-blue-400 cursor-pointer mr-2 ">reset all</span>
			</div>
			<!-- End Search Button  -->
		</div>
		<!--  End Search Panel  -->

		<!--  Property List  -->
		<div class="col-span-3" style="">
			<!--  Search Input  -->
			<div class="px-8 m-5">
				<div class="bg-gray-50 py-2 shadow-md flex justify-between">
					<input value="{{ \request()->get('propertyName') }}" id="search-property" type="text"
					       name="propertyName" class="w-full bg-gray-50 p-1 outline-0 border-0" placeholder="Search By Property Name">

					<div class="w-100 cursor-pointer flex text-gray-900">
						<select autocomplete="on" name="city" onchange="search()" style="max-width: 220px" class="mx-8 cursor-pointer border-0 bg-gray-50">
							@if( \request()->has('city') && strlen(\request()->get('city')) )
							<option value="">
								all
							</option>
							<option value="{{ \request()->get('city') }}" selected>
								{{ \request()->get('city') }}
							</option>
							@else
								<option value="">
									all
								</option>
							@endif
							@foreach($cities as $city)
								<option value="{{ $city }}">
									{{ $city }}
								</option>
							@endforeach
						</select>
						<select autocomplete="on" name="sort" onchange="search()" class="cursor-pointer border-0 bg-gray-50 mr-4">
							<option value="price_desc" {{ \request()->get('sort') == "price_desc" ? "selected" : "" }}>
								Price High
							</option>
							<option value="price_asc" {{ \request()->get('sort') == "price_asc" ? "selected" : "" }}>
								Price Low
							</option>
							{{--                        <option value="popularity_desc">Popularity High</option>--}}
							{{--                        <option value="popularity_asc">Popularity Low</option>--}}
						</select>
						<script>
							var search = function (selectNode) {
								document.querySelector("#searchForm").submit();
							}
						</script>
					</div>
				</div>

				<div class="w-full flex justify-end mt-1 pr-5">
					<h1 id="list-view-switch" onclick="switchView('list')" style="font-size: 30px"
					    class="mdi mdi-view-list cursor-pointer"></h1>
					<h1 id="grid-view-switch" onclick="switchView('grid')" style="font-size: 30px"
					    class="text-gray-500 mdi mdi-view-grid cursor-pointer"></h1>
				</div>

				<script type="text/javascript" defer>

					const switchView = (type) => {
						let listViewSwitch = document.querySelector("#list-view-switch");
						let gridViewSwitch = document.querySelector("#grid-view-switch");
						let gridViewContainer = document.querySelector("#properties-container");
						let listViewContainer = document.querySelector("#properties-container-list");
						if (type === 'list') {
							listViewContainer.classList.remove("hidden");
							gridViewContainer.classList.add("hidden");

							listViewSwitch.classList.add("text-gray-500");
							gridViewSwitch.classList.remove("text-gray-500");
						} else {
							listViewSwitch.classList.remove("text-gray-500");
							gridViewSwitch.classList.add("text-gray-500");

							gridViewContainer.classList.remove("hidden");
							listViewContainer.classList.add("hidden");
						}
					}
				</script>

				<!--  Search Input Field Animation  -->
				<script>
					let pageSearchInput = document.querySelector("#search-property");
					let text = "Search By Property Name";
					let index = 0;
					let interval = setInterval(() => {
						pageSearchInput.placeholder = "🔍 " + text.slice(0, index);
						index++;
						if (index > text.length) index = 1
					}, 100);
				</script>
				<!--  End Search Input Field Animation  -->
			</div>
			<!--  End Search Input  -->

			<div class="px-0">
				<div id="properties-container-list"
				     class="hidden grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 px-8 m-5">
					@foreach($properties as $property)
						<div class="property flex bg-white overflow-hidden shadow-md my-4 mx-2">
							<img style="width: 220px;" class="m-2 object-cover" src="/{{$property->thumbnail}}"
							     alt="Card image cap">
							<div class="p-3">
								<h5 class="mb-2">
									<a href="{{ route('property.show', ['id' => $property->id]) }}"
									   class="text-blue-900 text-xl">
										{{$property->title}}
									</a>
									<sup class="text-xxl">.</sup>
									<i class="text-gray-700">
										{{$property->sqft}} <sup>2</sup>
									</i>
								</h5>
								<h5 class="mb-2">
									<i class="text-red-50 bg-gray-300 p-1 px-3 border border-black rounded-md">
										{{$property->price}}₽
									</i>
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
				<div id="properties-container" class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-5">
					@foreach($properties as $property)
						@include("layout.parts.CardProperty", [ "property" => $property ])
					@endforeach
				</div>
			</div>
			@if($properties->hasPages())
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
		<!-- End Property List  -->


	</section>
		<!--  End Main Content  -->
	</form>
@endsection