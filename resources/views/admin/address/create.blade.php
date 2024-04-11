@extends("admin.layout.DashboardLayout")


@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-1 w-2/4 rounded rounded-md  m-5 mt-7 bg-white dark:bg-gray-500 mx-auto items-center"
	         style="margin-left: 480px">
		@if(request()->has("back"))
		<h2 class="bg-gray-50 p-2 my-3 border rounded-sm">
			<a class="text-blue-500" href="{{ request()->get("back") }}">Back</a>
		</h2>
		@endif
		<h2 class=" bg-gray-900 text-white text-center p-5 py-4 mb-2 w-full">
			<span>Add New Address</span>
		</h2>
		<form method="post"
		      action="{{ route('admin.address.store') }}"
		      enctype="multipart/form-data"
		      class="w-full grid grid-cols-1 px-8 pb-8 mx-auto">
			@csrf

			@if(request()->has("back"))
				<input type="hidden" name="back" value="{{ request()->get("back") }}">
			@endif

			<div class="w-full grid grid-cols-1">
				<!-- street -->
				<div class="mb-5 mx-5">
					<label for="street"
					       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
					<input type="text" name="street" id="name"
					       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
					       placeholder="Street" required>
				</div>
				<!-- End street -->
			</div>

			<!-- City -->
			<div class="w-full grid grid-cols-1">
				<div class="mb-5 mx-5">
					<label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
					<input type="text" name="city" id="city"
					       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
					       placeholder="city" required>
				</div>
			</div>
			<!-- End City -->

			<!-- State -->
			<div class="w-full grid grid-cols-1">
				<div class="mb-5 mx-5">
					<label for="state"
					       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
					<input type="text" name="state" id="state"
					       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
					       placeholder="State" required>
				</div>
			</div>
			<!-- End State -->

			<!-- country -->
			<div class="w-full grid grid-cols-1">
				<div class="mb-5 mx-5">
					<label for="country"
					       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
					<input type="text" name="country" id="country"
					       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
					       placeholder="Country" required>
				</div>
			</div>
			<!-- End country -->

			<!-- zip_code -->
			<div class="w-full grid grid-cols-1">
				<div class="mb-5 mx-5">
					<label for="zip_code"
					       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip Code</label>
					<input type="text" name="zip_code" id="zip_code"
					       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
					       placeholder="zip_code" required>
				</div>
			</div>
			<!-- End zip_code -->


			<div class="mb-5 mx-5 mt-5 w-full">
				<button type="submit"
				        class=" w-full py-0 text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
					Create
				</button>
			</div>

		</form>
	</section>
	<!-- End Main Content  -->
@endsection