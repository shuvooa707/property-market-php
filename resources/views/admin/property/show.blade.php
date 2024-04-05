@extends("admin.layout.DashboardLayout")


@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-12 px-5 bg-gray-300 justify-between h-full" style="overflow: hidden">
		<!-- Left Section -->
		<div class="col-span-12 px-2">
			<div class="bg-blue-100 shadow px-2 py-.5 rounded-md">
				<h4 class="my-3 mr-10  text-blue-900 leading-normal uppercase font-medium	">
					<a class="text-blue-500" href="{{ route('admin.property.index') }}">All</a> \
					<span class="mdi mdi-home text-gray-950"></span>
					<span>{{  $property->title }}</span>
				</h4>
			</div>
			<!-- slider carousel-->
			<div class="grid grid-cols-2">
				<div class="carousel" style="max-height: 600px">
					<div id="slide1" class="carousel-item relative w-full">
						<img src="{{ $property->thumbnail }}" class="">
						<div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
							<a href="#slide4" class="btn btn-circle">❮</a>
							<a href="#slide2" class="btn btn-circle">❯</a>
						</div>
					</div>
					@foreach($property->images as $image)
						<div id="slide2"
						     class="carousel-item relative w-full transition-transform duration-500 ease-in-out">
							<img src="{{ $image->path }}"
							     class="w-full">
							<div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
								<a href="#slide1" class="btn btn-circle">❮</a>
								<a href="#slide3" class="btn btn-circle">❯</a>
							</div>
						</div>
					@endforeach
				</div>
				<div class="rounded-md border" style="max-height: 600px; overflow: hidden">
					<div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:100vw;max-height: 600px;">
						<div id="gmap-canvas" style="max-height:600px; width:100%;max-width:100%;">
							<iframe style="height:100%;width:100%;border:0;" frameborder="0"
							        src="https://www.google.com/maps/embed/v1/place?q=Dhaka,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
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
			</div>
		</div>
		<!-- End Left Section -->

		<!-- Right Section -->
		<div class="col-span-8 grid grid-cols-2 mt-2 align-between px-2">
            <section>
                <table class="col-span-2 p-2 w-full divide-y text-gray-950 divide-gray-200">
                    <thead class="bg-blue-600 text-blue-50 py-2">
                    <tr>
                        <th class="bg-blue-600 text-blue-50 py-2" colspan="2">Details</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="mdi mdi-relative-scale"></span>
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
                                <span class="mdi mdi-balcony"></span>
                                Location
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $property->location }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="px-6 py-4 whitespace-nowrap">
                                <strong class="block underline">Description</strong>
                                <span class="text-gray-800">{{ $property->description }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="bg-gray-100 px-10 py-3 text-center my-4">
                    <p>Estimated Price</p>
                    <h1 class="text-4xl text-gray-700">
                        RUB <span>{{ $property->price }}</span><sup>₽</sup>
                    </h1>
                </div>
            </section>
		</div>
		<!-- End Right Section -->
		<script>
			const tabs = document.querySelectorAll('.tabs');
			tabs.forEach(tab => {
				tab.addEventListener('click', e => {
					if (e.target.tagName === 'A') {
						// Remove 'active' class from all tabs
						tabs.forEach(tab => {
							tab.querySelectorAll('a').forEach(link => {
								link.classList.remove('active');
							});
						});

						// Add 'active' class to the clicked tab
						e.target.classList.add('active');

						const target = e.target.getAttribute('href').substr(1);
						const contents = document.querySelectorAll('.content');
						contents.forEach(content => {
							if (content.getAttribute('id') === target) {
								content.classList.remove('hidden');
							} else {
								content.classList.add('hidden');
							}
						});
					}
				});
			});

		</script>
	</section>
	<!-- End Main Content  -->
@endsection