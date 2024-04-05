@extends("admin.layout.DashboardLayout")


@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 w-2/3 rounded rounded-md m-5 mt-3 bg-gray-100 mx-auto items-center" style="margin-left: 280px">
        <h2 class="text-gray-50 text-center p-5 bg-gray-950 mb-2 flex justify-between">
            <span>Update Property Details</span>
            <a href="/admin/property/" class="bg-green-700 text-white px-4 py-2 rounded rounded-m">Cancel</a>
        </h2>
        <form method="post" action="{{ route('admin.property.update', ['id' => $property->id]) }}" enctype="multipart/form-data" class="w-full grid grid-cols-1 px-8 pb-8 mx-auto">
            @csrf
            <input type="hidden" name="id" value="{{ $property->id }}">
            <!-- Image Uploader -->
            <div class="grid grid-cols-2">
                <!-- Property Thumbnail -->
                <div class="mb-5 mx-5">
                    <label for="thumbnailFile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property Thumbnail</label>
                    <input type="file" name="thumbnailFile" id="thumbnailFile" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="title">
                </div>
                <!-- End Property Thumbnail -->
                <!-- Property Images -->
                <div class="mb-5 mx-5">
                    <label for="imageFiles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property Images</label>
                    <input type="file" name="imageFiles" id="imageFiles" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="title" multiple>
                </div>
                <!-- End Property Images -->
            </div>
            <!-- End Image Uploader -->
            <div class="w-full grid grid-cols-2">
                <!-- Property Name -->
                <div class="mb-5 mx-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property Name</label>
                    <input value="{{$property->title}}"  type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="title" required>
                </div>
                <!-- End Property Name -->

                <!-- Price -->
                <div class="mb-5 mx-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input value="{{$property->price}}" type="number" name="price" id="price" step="1" min="0" max="9999999999" placeholder="Price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End Price -->

                <!-- Square Feet -->
                <div class="mb-5 mx-5">
                    <label for="sqft" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Square Feet</label>
                    <input value="{{$property->sqft}}" type="number" name="sqft" id="sqft" placeholder="sqft" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End Square Feet -->

                <!-- Bedrooms -->
                <div class="mb-5 mx-5">
                    <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bedrooms</label>
                    <input value="{{ $property->bedrooms }}" type="number" name="bedrooms" min="0" step="1" id="bedrooms" placeholder="bedrooms" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End Bedrooms -->

                <!-- bathrooms -->
                <div class="mb-5 mx-5">
                    <label for="bathrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">bathrooms</label>
                    <input value="{{ $property->bathrooms }}" type="number" name="bathrooms" min="0" step="1" id="bathrooms" placeholder="bathrooms" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End bathrooms -->

                <!-- balconies -->
                <div class="mb-5 mx-5">
                    <label for="balconies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">balconies</label>
                    <input value="{{ $property->balconies }}" type="number" name="balconies" min="0" step="1" id="balconies" placeholder="balconies" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End balconies -->

                <!-- garages -->
                <div class="mb-5 mx-5">
                    <label for="garages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Garages</label>
                    <input value="{{ $property->garages }}" type="number" name="garages" min="0" step="1" id="garages" placeholder="garages" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <!-- End garages -->


                <!-- Company -->
                <div class="mb-5 mx-5">
                    <label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                    <select id="company_id" name="company_id" value="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($companies as $company)
                        <option selected="{{ $company->id == $property->company_id ? 'true' : 'false' }}" value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Company -->

                <!-- Category -->
                <div class="mb-5 mx-5">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @foreach($categories as $category)
                            <option selected="{{ $category->id == $property->category_id ? 'true' : 'false' }}" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Category -->


                <!-- Is Available -->
                <div class="mb-5 mx-5">
                    <label for="is_available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Available</label>
                    <select id="is_available" name="is_available" value="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="1" selected="{{ $property->is_available ? 'true' : 'false' }}">Yes</option>
                        <option value="0" selected="{{ $property->is_available ? 'false' : 'true' }}">No</option>
                    </select>
                </div>
                <!-- End Available -->

                <!-- Description -->
                <div class="mb-5 mx-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea value="{{ $property->description }}"id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description...">
                        {{ $property->description }}
                    </textarea>
                </div>
                <!-- End Description -->


                <!-- location -->
                <div class="mb-5 mx-5">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <textarea th:value="${property.getLocation()}" th:text="${property.getLocation()}" id="location" name="location" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="location..."></textarea>
                </div>
                <!-- End location -->



            </div>

            <div class="mb-5 mx-5 mt-5">
                <button type="submit" class=" w-full py-0 text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create
                </button>
            </div>

        </form>
    </section>
    <!-- End Main Content  -->
@endsection