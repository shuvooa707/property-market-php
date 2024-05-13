@extends("layout.layout")

@section("title")
	<title>Property Market</title>
@endsection

@section("scripts")
	<script type="text/javascript" defer>
		let title = document.title;
		let flag = 1;
		setInterval(() => {
			if (flag) {
				document.title = `🚃`;
				flag = 0;
			} else {
				document.title = title;
				flag = 1;
			}
		}, 2000)
	</script>

	{{-- Google Map --}}
	<script>
		(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
			key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg",
			v: "weekly",
			// Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
			// Add other bootstrap parameters as needed, using camel case.
		});
	</script>
	{{-- End Google Map --}}

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


			<!--  Property List  -->
			<div class="col-span-3" style="">

				<!-- Map Search Panel  -->
				<div class="col-span-1 bg-gray-50 shadow-md p-1 w-full" style="height: 300px">
					<div id="map"></div>

					<script>
						/**
						 * @license
						 * Copyright 2019 Google LLC. All Rights Reserved.
						 * SPDX-License-Identifier: Apache-2.0
						 */
						async function initMap() {
							// Request needed libraries.
							const { Map } = await google.maps.importLibrary("maps");
							const myLatlng = { lat: -25.363, lng: 131.044 };
							const map = new google.maps.Map(document.getElementById("map"), {
								zoom: 4,
								center: myLatlng,
							});
							// Create the initial InfoWindow.
							let infoWindow = new google.maps.InfoWindow({
								content: "Click the map to get Lat/Lng!",
								position: myLatlng,
							});

							infoWindow.open(map);
							// Configure the click listener.
							map.addListener("click", (mapsMouseEvent) => {
								// Close the current InfoWindow.
								infoWindow.close();
								// Create a new InfoWindow.
								infoWindow = new google.maps.InfoWindow({
									position: mapsMouseEvent.latLng,
								});
								infoWindow.setContent(
									JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
								);
								infoWindow.open(map);
							});
						}

						initMap();
					</script>
				</div>
				<!--  End Map Search Panel  -->

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