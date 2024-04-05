@extends("layout.layout")

@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-12 px-5 py-5 bg-gray-300 justify-between h-full">
        <div class="grid grid-cols-12 col-span-12">
            <!-- Left Section -->
            <div class="col-span-7 px-2">
                <div class="bg-blue-200 px-2 rounded-md">
                    <h1 class="my-3 mr-10 text-3xl  text-blue-900 leading-normal uppercase font-medium	">
                        <span class="mdi mdi-home text-gray-950"></span>
                        <span>{{  $property->title }}</span>
                    </h1>
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
            <div class="col-span-4 px-2">
                <div class="container mx-auto">
                    <section class="my-3 p-2 shadow-gray-500 rounded bg-gray-50">
                        <strong class="text-gray-950 block underline">Description</strong>
                        <span class="text-gray-800">{{ $property->description }}</span>
                    </section>
                    <table class="min-w-full divide-y text-gray-950 divide-gray-200">
                        <thead class="">
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
                        </tbody>
                    </table>
                    <div class="bg-gray-100 px-10 py-3 text-center my-4">
                        <p>Estimated Price</p>
                        <h1 class="text-4xl text-gray-700">
                            RUB <span>{{ $property->price }}</span><sup>₽</sup>
                        </h1>
                    </div>
                    <div>
                        <button class="py-5 mt-5 px-10 w-full text-white bg-blue-400">
                            <h1>TO GET A CONSULTATION</h1>
                        </button>
                    </div>
                </div>
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
        </div>
        <div class="col-span-12 m-5 border-md shadow-md rounded">
            <div class="bg-blue-50 text-blue-900 p-3">Location on Map</div>
            <!-- End Map Section -->
            <div class="rounded-md border" style="max-height: 480px; overflow: hidden">
                <div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:100vw;height:100vh;">
                    <div id="gmap-canvas" style="height:100%; width:100%;max-width:100%;">
                        <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Dhaka,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                    </div>
                    <style>
                        #gmap-canvas img {
                            max-height:none;
                            max-width:none!important;
                            background:none!important;
                        }
                    </style>
                </div>
            </div>
            <!-- End Map Section -->
        </div>
    </section>
    <!-- End Main Content  -->
@endsection