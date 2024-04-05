@extends("admin.layout.DashboardLayout")


@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-1 w-2/4 rounded rounded-md m-5 dark:bg-gray-500 mx-auto items-center"
	         style="margin-left: 480px">
		<div class="grid grid-cols-4 my-3 text-center">
			<a href="/admin/property/"
			   class="bg-red-50 text-blue-600 px-2 py-2 rounded rounded-m cursor-pointer w-full my-5 flex items-center">
				<i class="fa-solid fa-arrow-left mx-3"></i>
				<span class="px-1"> </span>
				<span class="mx-3">Cancel</span>
			</a>
		</div>
		<section class="bg-orange-50">
			<h2 class="text-gray-50 bg-gray-150 text-center p-5 bg-gray-950 mb-2">Add New Property</h2>
			<form method="post" action="{{ route('admin.property.store') }}" enctype="multipart/form-data"
			      class="w-full grid grid-cols-1 px-8 pb-8 mx-auto">
				@csrf
				<!-- Image Uploader -->
				<div class="grid grid-cols-2">
					<!-- Property Thumbnail -->
					<div class="mb-5 mx-5">
						<label for="thumbnailFile"
						       class="cursor-pointer block mb-2 text-sm font-medium text-gray-900 dark:text-white">
							<span class="my-3"> Property Thumbnail</span>
							<img id="thumbnailFilePreview" class="h-2/4 rounded border-white max-w-full mt-4"
							     src="https://flowbite.com/docs/images/examples/image-1@2x.jpg" alt="image description">
						</label>
						<input onchange="loadFile()" accept="image/*" type="file" name="thumbnailFile"
						       id="thumbnailFile" style="width: 0px; height: 0px;" class="" placeholder="title"
						       required>
					</div>
					<!-- End Property Thumbnail -->
					<!-- Property Images -->
					<div class="mb-5 mx-5">
						<label for="imageFiles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property
							Images</label>
						<input type="file" name="imageFiles[]" id="imageFiles"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       placeholder="title" multiple required>
					</div>
					<!-- End Property Images -->
				</div>
				<!-- End Image Uploader -->
				<div class="w-full grid grid-cols-2">
					<!-- Property Name -->
					<div class="mb-5 mx-5">
						<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property
							Name</label>
						<input type="text" name="title" id="title"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       placeholder="title" required>
					</div>
					<!-- End Property Name -->

					<!-- Price -->
					<div class="mb-5 mx-5">
						<label for="price"
						       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
						<input type="number" name="price" id="price" step="1" min="0" max="9999999999"
						       placeholder="Price"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End Price -->

					<!-- Square Feet -->
					<div class="mb-5 mx-5">
						<label for="sqft" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Square
							Feet</label>
						<input type="number" name="sqft" id="sqft" placeholder="sqft"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End Square Feet -->

					<!-- Bedrooms -->
					<div class="mb-5 mx-5">
						<label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bedrooms</label>
						<input type="number" name="bedrooms" min="0" step="1" id="bedrooms" placeholder="bedrooms"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End Bedrooms -->

					<!-- bathrooms -->
					<div class="mb-5 mx-5">
						<label for="bathrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">bathrooms</label>
						<input type="number" name="bathrooms" min="0" step="1" id="bathrooms" placeholder="bathrooms"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End bathrooms -->

					<!-- balconies -->
					<div class="mb-5 mx-5">
						<label for="balconies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">balconies</label>
						<input type="number" name="balconies" min="0" step="1" id="balconies" placeholder="balconies"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End balconies -->

					<!-- garages -->
					<div class="mb-5 mx-5">
						<label for="garages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Garages</label>
						<input type="number" name="garages" min="0" step="1" id="garages" placeholder="garages"
						       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
						       required>
					</div>
					<!-- End garages -->


					<!-- Company -->
					<div class="mb-5 mx-5">
						<label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
						<select id="company_id" name="company_id"
						        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							@foreach($companies as $company)
								<option value="{{ $company->id }}">{{$company->name}}</option>
							@endforeach
						</select>
					</div>
					<!-- End Company -->


					<!-- Address -->
					<div class="mb-5 mx-5">
						<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
						<select id="category_id" name="address_id"
						        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						        required>
							@foreach($addresses as $address)
								<option value="{{ $address->id }}">
									{{ $address->street }}, {{ $address->city }}, {{ $address->zip_code }}
									, {{ $address->state }}, {{ $address->country }},
								</option>
							@endforeach
						</select>
					</div>
					<!-- End Address -->


					<!-- Category -->
					<div class="mb-5 mx-5">
						<label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
						<select id="category_id" name="category_id" value="1"
						        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						        required>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
					<!-- End Category -->


					<!-- Is Available -->
					<div class="mb-5 mx-5">
						<label for="is_available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is
							Available</label>
						<select id="is_available" name="is_available" value="1"
						        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
					<!-- End Available -->

					<!-- Description -->
					<div class="mb-5 mx-5">
						<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
						<textarea id="description" name="description" rows="4"
						          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						          placeholder="Description..."></textarea>
					</div>
					<!-- End Description -->


					<!-- location -->
					<div class="mb-5 mx-5">
						<label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
						<textarea id="location" name="location" rows="4"
						          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
						          placeholder="location..."></textarea>
					</div>
					<!-- End location -->


				</div>

				<div class="mb-5 mx-5 mt-5">
					<button type="submit"
					        class=" w-full py-0 text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">
						Create
					</button>
				</div>

			</form>
		</section>
		<script>
			let loadFile = function (event) {
				let output = document.getElementById('thumbnailFilePreview');
				output.src = URL.createObjectURL(window.event.target.files[0]);
				output.onload = function () {
					URL.revokeObjectURL(output.src) // free memory
				}
			};
		</script>
	</section>
	<!-- End Main Content  -->
@endsection