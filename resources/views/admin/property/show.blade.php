@extends("admin.layout.DashboardLayout")


@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-1 px-5 py-5 bg-gray-300 justify-between h-full">
		<div class="grid grid-cols-2">

			<section class="col-span-1 px-2">
				<h3 class="bg-gray-50 mb-4 p-2">
					{{ $property->title }}
				</h3>
				<!-- slider carousel-->
				<section class="splide" style="max-height: 600px; overflow: hidden;" aria-label="Splide Basic HTML Example">
					<div class="splide__track">
						<ul class="splide__list">
							<li class="splide__slide" style="max-height: 600px">
								<img style="height: 100%" src="/{{ $property->thumbnail }}" class="">
							</li>
							@foreach($property->images as $image)
								<li class="splide__slide">
									<img src="/{{ $image->path }}" class=""  alt="image" />
								</li>
							@endforeach
						</ul>
					</div>
				</section>
				<script>
					var splide = new Splide( '.splide', {
						type   : 'loop',
						padding: '5rem',
					} );
					splide.mount();
				</script>
				<!-- End slider carousel-->
			</section>

			<!-- Right Section -->
			<div class="col-span-1 px-2">
				<table class="w-full divide-y text-gray-950 divide-gray-200">
					<thead class="">
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
					<tr>
						<td colspan="2" class="p-2">
							<strong class="text-gray-950 block underline">Description</strong>
							<span class="text-gray-800">{{ $property->description }}</span>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<i class="fa-solid fa-chart-area fa-fw"></i>
							Total Area
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
                                <span>
                                    {{ $property->sqft }}
                                </span><sup>sqft</sup>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<strong class="mdi mdi-balcony"></strong>
							Balconies
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							{{ $property->balconies }} m<sup>2</sup>
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<span class="mdi mdi-garage"></span>
							Garages
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							{{ $property->garages }}
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<span class="mdi mdi-bed-clock"></span>
							Bedrooms
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							{{ $property->bedrooms }}
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<span class="mdi mdi-bathtub"></span>
							Bathrooms
						</td>
						<td class="px-6 py-4 whitespace-nowrap">
							{{ $property->bathrooms }}
						</td>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<i class="fa-solid fa-location-dot fa-fw text-red-600"></i>
							Location
						</td>
						<td class="px-6 py-4 text-blue-900">
							{{ $property->address->full }}
						</td>
					</tr>
					<tr>
						<td colspan="2" class="p-2 text-center">
							<p>Estimated Price</p>
							<h1 class="text-4xl text-gray-700">
								RUB <span>{{ $property->price }}</span><sup>₽</sup>
							</h1>
						</td>
					</tr>
					<tr class="py-0">
						<td colspan="2" class="px-2 py-0">
							<button class="py-5 mt-5 px-10 w-full text-white bg-blue-400">
								<h1>TO GET A CONSULTATION</h1>
							</button>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<!-- End Right Section -->
		</div>
		<div class="col-span-12 m-5 mt-5 border-md shadow-md rounded">
			<div class="bg-blue-50 text-blue-900 p-3">
				Location on Map
				<i class="fa-solid fa-location-dot fa-fw text-red-600"></i>
			</div>
			<!-- End Map Section -->
			<div class="rounded-md border" style="max-height: 480px; overflow: hidden">
				<div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:100vw;height:100vh;">
					<div id="gmap-canvas" style="height:100%; width:100%;max-width:100%;">
						<iframe style="height:100%;width:100%;border:0;" frameborder="0"
						        src="https://www.google.com/maps/embed/v1/place?q=55A, Mikluho-Maklaya Str. 117279, Moscow&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
					</div>
					<style>
                        #gmap-canvas img {
                            max-height: none;
                            max-width: none !important;
                            background: none !important;
                        }
					</style>
				</div>
			</div>
			<!-- End Map Section -->
		</div>
	</section>
	<!-- End Main Content  -->
@endsection