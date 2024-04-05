<!doctype html>
<html
		lang="en"
		xmlns:th="http://www.thymeleaf.org"
		th:fragment="layout(content)"
>

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--    <script src="https://cdn.tailwindcss.com"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
	      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
	      crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

	<!--  JQuery  -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"
	        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

	<title>Property Market</title>
</head>
<body class="bg-gray-300">

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
	<span class="sr-only">Open sidebar</span>
	<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
		<path clip-rule="evenodd" fill-rule="evenodd"
		      d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
	</svg>
</button>


<nav id="topbar" class="bg-blue-700 w-full fixed flex justify-between align-middle top-0 z-50 justify-items-end"
     aria-label="Sidebar">
	<div style="width: 380px" class="inline-block bg-gray-900 px-5 py-5 text-white text-center">
		<a href="/" class="w-full h-full block">Home</a>
	</div>
	<div class="right flex mt-5 mr-5 align-baseline justify-around">
		<div class="mr-8">
			<form class="p-0 m-0" method="get" action="/property/search">
				<input type="text" class="rounded-md p-0 px-2" placeholder="Search Property" name="propertyName"
				       id="search-property-input">
			</form>
		</div>
		<div class="ml-8 mr-5">
			<form class="p-0 m-0" method="post" action="/logout">
				<button type="submit" class="btn bg-blue-900 px-2 rounded-md text-white">
					Logout
				</button>
			</form>
		</div>
	</div>
</nav>


<!--  Main Content  -->

<!--  Main Content  -->
<form class="" id="searchForm" method="get" action="/property/search">
	<section class=" grid grid-cols-4"
	         style="margin-top:100px; width: 90vw; position: relative; margin-left: 50%;  transform: translateX(-50%);">

		<!--  Search Panel  -->
		<div class="col-span-1 bg-gray-50 shadow-md p-1" style="max-width: 480px">
			<div class="text-center">
				<strong>Price</strong>
				<div class="flex">
					<div class="w-2/4 p-1">
						<input value="{{ \request()->get('from') }}" type="text"
						       class="rounded-md w-full border-gray-300" name="from">
						<small>From</small>
					</div>
					<div class="w-2/4 p-1">
						<input value="{{ \request()->get('to') }}" type="text" class="rounded-md w-full border-gray-300"
						       name="to">
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
				<div class="w-full p-2" style="max-height: 600px; overflow-y: hidden;">
					<div class="w-full pb-3">
						<input oninput="filterCategory(this)" type="text"
						       class="p-1 py-0 m-1.5 rounded-md w-full border-gray-200" placeholder="Search Category">
					</div>
					<div style="max-height: 600px; overflow-y: auto;">
						@foreach($categories as $category)
							<div data-value="{{ $category->name }}"
							     class=" flex items-center mb-4 cursor-pointer">
{{--								<input type="hidden" id="categoriesSelected" name="category" value="{{ \request()->get('category') }}">--}}

								<input name="categories[]" onchange="updateCategories()" id="category-{{ $category->id }}" type="checkbox"
								       value="{{ $category->id }}"
								       {{ in_array($category->id, \request()->get('categories') ?? []) ? 'checked' : '' }}
								       class="category w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
								<label for="category-{{ $category->id }}"
								       class="ms-2 cursor-pointer text-sm font-medium text-gray-900 dark:text-gray-300">
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
				<div class="bg-gray-50 shadow-md flex justify-between">
					<input value="{{ \request()->get('propertyName') }}" id="search-property" type="text"
					       name="propertyName" class="w-full outline-0 border-0" placeholder="Search By Property Name">

					<div class="w-50 cursor-pointer">
						<select autocomplete="on" name="sort" onchange="search()" id=""
						        class="cursor-pointer border-0 bg-gray-50">
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
			</div>
			<!--  End Search Input  -->

			<div class="px-0">
				<div id="properties-container" class="grid grid-cols-3 md:grid-cols-3 xl:grid-cols-3 px-8 m-5">
					@foreach($properties as $property)
						<div class="property bg-white rounded-lg overflow-hidden shadow-md px-2 my-4 mx-2">
							<img class="w-full h-36 object-cover" src="/{{$property->thumbnail}}"
							     alt="Card image cap">
							<div class="p-3">
								<h5 class="text-xl mb-2">
									<strong class="text-xl">{{$property->title}}</strong>
									<small class="text-gray-400">
										x {{$property->sqft}}sqft
									</small>
								</h5>
								<h3>
									<i class="text-blue-900">
										{{$property->price}}<sup>₽</sup> RUB
									</i>
								</h3>
								<p class="text-gray-900">
									{{ substr($property->description, 0, 100) }}
								</p>
								<a href="/property/{{$property->id}}"
								   class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-md">Book</a>
							</div>
						</div>
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
</form>
<!-- End Main Content  -->


</body>
</html>
