@extends("layout.layout")

@section("styles")
	<style type="text/css">
        #thumbnail-carousel .splide__track {
            height: 100px;
        }
        #thumbnail-carousel ul.splide__list li.splide__slide {
	        width: 150px!important;
	        height: 100%!important;
        }
        #thumbnail-carousel .splide__slide img {
            width: 150px;
            height: 100%;
        }

	</style>
@endsection

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

				<!-- Slider Carousel -->
				<section class="splide" style="cursor: move; max-height: 600px; overflow: hidden;"
				         aria-label="Splide Basic HTML Example">
					<div class="splide__track">
						<ul class="splide__list">
							<li class="splide__slide zoom" style="max-height: 600px">
								<img style="width: 100%; height: 100%" src="/{{ $property->thumbnail }}" class="w-full">
							</li>
							@foreach($property->images as $image)
								<li class="splide__slide zoom" style="max-height: 600px">
									<img style="width: 100%; height: 100%" src="/{{ $image->path }}" class="w-full"
									     alt="image"/>
								</li>
							@endforeach
						</ul>
					</div>
				</section>
				<!-- End Slider Carousel -->

				<!-- Slider Thumbnail Carousel -->
				<section
						id="thumbnail-carousel"
						class="splide bg-blue-50 p-2"
						aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."
				>
					<div class="splide__track">
						<ul class="splide__list">
							<li class="splide__slide">
								<img src="/{{ $property->thumbnail }}" alt="">
							</li>
							@foreach($property->images as $image)
								<li class="splide__slide">
									<img src="/{{ $image->path }}" class="w-full" alt="image"/>
								</li>
							@endforeach
						</ul>
					</div>
				</section>
				<!-- End Slider Thumbnail Carousel -->

				<script>
					const main = new Splide('.splide', {
						type: 'fade',
						rewind: true,
						pagination: false,
						arrows: false,
					});
					// for the thumbnail
					const thumbnails = new Splide('#thumbnail-carousel', {
						fixedWidth: 100,
						fixedHeight: 60,
						gap: 10,
						rewind: true,
						pagination: true,
						isNavigation: true,
						arrows: true,
						breakpoints: {
							600: {
								fixedWidth: 60,
								fixedHeight: 44,
							},
						},
					});
					main.sync(thumbnails);
					main.mount();
					thumbnails.mount();
				</script>
				<!-- End slider carousel-->
				<script>
					$(document).ready(function () {
						$('.zoom').zoom({
							magnify: 2,
						});
					});
				</script>
			</div>
			<!-- End Left Section -->

			<!-- Right Section -->
			<div class="col-span-4 px-2" id="right-section">
				<div class="container mx-auto">
					<section class="my-3 p-2 shadow-gray-500 rounded bg-gray-50">
						<strong class="text-gray-950 block underline">Summery</strong>
						<span class="text-gray-800">{{ $property->summery }}</span>
					</section>
					<table class="min-w-full divide-y text-gray-950 divide-gray-200">
						<thead class="">
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-relative-scale"></span>
								Total Area
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
                                <span>
                                    {{ $property->sqft }}
                                </span><sup>sqft</sup>
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<strong class="mdi mdi-balcony"></strong>
								Balconies
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
								{{ $property->balconies }} m<sup>2</sup>
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-garage"></span>
								Garages
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
								{{ $property->garages }}
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-bed-clock"></span>
								Bedrooms
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
								{{ $property->bedrooms }}
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-bathtub"></span>
								Bathrooms
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
								{{ $property->bathrooms }}
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-star"></span>
								Rating
							</td>
							<td class="px-6 py-2 whitespace-nowrap">
								@if( $property->reviews->count() )
									@for($i = 0; $i< $property->avgrating; $i++)
										<span class="mdi mdi-star text-green-600"></span>
									@endfor
								@else
									--
								@endif
							</td>
						</tr>
						<tr>
							<td class="px-6 py-2 whitespace-nowrap">
								<span class="mdi mdi-balcony"></span>
								Address
							</td>
							<td class="px-6 py-2">
								<i class="fa-solid fa-location-dot fa-fw text-red-600"></i>
								{{ $property->address->street }},
								{{ $property->address->zip_code }},
								{{ $property->address->city }},
								{{ $property->address->state }},
								{{ $property->address->country }}
							</td>
						</tr>
						</tbody>
					</table>
					<div class="bg-gray-100 px-10 py-2 text-center my-4">
						<p>Estimated Price</p>
						<h1 class="text-4xl text-gray-700">
							RUB <span>{{ $property->price }}</span><sup>₽</sup>
						</h1>
					</div>
					<div>
						<button onclick="openModal()" class="py-5 mt-1 px-10 w-full text-white bg-blue-700">
							<h1>TO GET A CONSULTATION</h1>
						</button>
						@if(\Illuminate\Support\Facades\Auth::check())
						<button onclick="openReviewModal()" class="py-5 mt-1 px-10 w-full text-white bg-green-700">
							<h1>
								Review
								<span class="mdi mdi-comment-account-outline text-xxl"></span>
							</h1>
						</button>
						@else
						<a href="{{ route('login', ['back' => route('property.show', [ 'id' => $property->id]) ]) }}" class="w-full block py-5 mt-1 px-10 w-full text-white bg-green-700">
							<h1>
								Review
								<span class="mdi mdi-comment-account-outline text-xxl"></span>
							</h1>
						</a>
						@endif
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
			<!-- Description -->
			<section class="grid grid-cols-5">
				<div class="col-span-3">
					<div class="bg-blue-500 text-blue-50 mt-5 p-3">Description</div>
					<div id="description" class="bg-gray-50 p-2">
						{!! $property->description !!}
					</div>
				</div>

				<div class="col-span-2">
					<!-- Reviews -->
					<div class="col-span-1 bg-gray-50 ml-2 mt-5 rounded-sm" style="height: auto; overflow-y: hidden">
						<div class="w-full py-3 px-5 bg-blue-900 text-white">
							Reviews
						</div>
						<div style="max-height: 480px; overflow-y: auto" class=" p-2">
							@foreach($property->reviews as $review)
								<div class="w-full p-2 rounded-sm border shadow-sm mb-2 bg-gray-100">
									<div class="content text-gray-500">
										<small>
											{{ $review->content }}
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
			<!-- End Description -->

			<div class="bg-blue-50 text-blue-900 mt-5 p-3">Location on Map</div>
			<!-- End Map Section -->
			<div class="rounded-md border" style="max-height: 480px; overflow: hidden">
				<div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:100vw;height:100vh;">
					<div id="gmap-canvas" style="height:100%; width:100%;max-width:100%;">
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
			<!-- End Map Section -->
		</div>

		<!-- Consultation Modal -->
		<div class="fixed inset-0" style="z-index: 99999; background: rgba(49,49,49,0.72)">
			<!-- Modal Content -->
			<div style="width: 580px; z-index: 999999; opacity:1;"
			     class="fixed top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-0 rounded-md shadow-md">
				<!-- Modal Header -->
				<div class="flex justify-between items-center mb-4 bg-gray-800 text-gray-50 p-3">
					<h2 class="text-lg font-semibold">Write Your Message</h2>
					<!-- Close Button -->
					<button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						     xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							      d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
				<!-- Modal Body -->
				<div class="text-gray-700 p-3">
				<textarea
						class="w-full bg-gray-100 px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
						placeholder="Enter your feedback"></textarea>
					<!-- Button -->
					<button onclick="send()" type="submit"
					        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
						Submit
					</button>
				</div>
			</div>
		</div>

		<!-- Script Consultation Modal -->
		<script>
			function openModal() {
				document.body.classList.add('overflow-hidden');
				document.querySelectorAll('.fixed').forEach(element => {
					element.style.display = 'block';
				});
			}

			function closeModal() {
				document.body.classList.remove('overflow-hidden');
				document.querySelectorAll('.fixed').forEach(element => {
					element.style.display = 'none';
				});
			}

			closeModal();

			const send = () => {

				closeModal();
			}
		</script>
		<!-- End Consultation Modal -->
		<!-- End Consultation Modal -->


		<!-- Review Modal -->
		<div id="add-review-modal" class="fixed inset-0" style="z-index: 99999; background: rgba(49,49,49,0.72)">
			<!-- Modal Content -->
			<div style="width: 580px; z-index: 999999; opacity:1;"
			     class="fixed top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-0 rounded-md shadow-md">
				<!-- Modal Header -->
				<div class="flex justify-between items-center mb-4 bg-gray-800 text-gray-50 p-3">
					<h2 class="text-lg font-semibold">Add Review </h2>
					<!-- Close Button -->
					<button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">
						<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						     xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							      d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
				<!-- Modal Body -->
				<div class="text-gray-700 p-3">
					<form action="{{ route('admin.reviews.store') }}" method="post">
						@csrf
						<div class="mb-5">
							<label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
							<select id="rating"
							        name="rating"
							        class="border bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
								<option value="1">1 star</option>
								<option value="2">2 star</option>
								<option value="3">3 star</option>
								<option value="4">4 star</option>
								<option value="5">5 star</option>
							</select>
						</div>
						<div class="mb-5">
							<label for="content" class="block mb-2 text-sm font-medium text-gray-900">Comment</label>
							<textarea
									name="content"
									class="w-full bg-gray-100 px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
									placeholder="Write Your Review"></textarea>
						</div>
						<input type="hidden" name="property_id" value="{{ $property->id }}">
						<!-- Button -->
						<button type="submit"
						        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
							Add
						</button>
					</form>
				</div>
			</div>
		</div>

		<!-- Script Review Modal -->
		<script>
			function openReviewModal() {
				document.body.classList.add('overflow-hidden');
				document.querySelector('#add-review-modal').style.display = 'block';
			}

			function closeReviewModal() {
				document.body.classList.remove('overflow-hidden');
				document.querySelector('#add-review-modal').style.display = 'none';
			}

			closeReviewModal();


		</script>
		<!-- End Script Review Modal -->
		<!-- End Review Modal -->

	</section>
	<!-- End Main Content  -->
@endsection