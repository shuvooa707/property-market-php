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
			<section class="splide" style="max-height: 600px; overflow: hidden;" aria-label="Splide Basic HTML Example">
				<div class="splide__track">
					<ul class="splide__list">
						<li class="splide__slide" style="max-height: 600px">
							<img style="width: 100%; height: 100%" src="/{{ $property->thumbnail }}" class="w-full">
						</li>
						@foreach($property->images as $image)
							<li class="splide__slide">
								<img src="/{{ $image->path }}" class="w-full"  alt="image" />
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