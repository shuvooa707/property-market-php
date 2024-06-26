@extends("admin.layout.DashboardLayout")

@section("script")
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
@endsection

@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 p-8 rounded rounded-md m-5 dark:bg-gray-500 mx-auto items-center"
             style="margin-left: 0px">
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
            <form method="post" action="{{ route('admin.property.update', ['id' => $property->id]) }}" enctype="multipart/form-data"
                  class="w-full grid grid-cols-1 px-8 pb-8 mx-auto">
                @csrf
                <!-- Image Uploader -->
                <div class="grid grid-cols-2 gap-4">

                    <!-- Property Thumbnail -->
                    <div class="mb-5 mx-5">
                        <label for="thumbnailFile"
                               class="cursor-pointer block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <span class="my-3"> Property Thumbnail</span>
                            <img title="Click to Change" id="thumbnailFilePreview" class="h-1/4 rounded border-white max-w-full mt-4"
                                 src="/{{ $property->thumbnail }}" alt="image description">
                        </label>
                        <input onchange="loadFile()"
                               accept="image/*"
                               type="file"
                               name="thumbnailFile"
                               id="thumbnailFile"
                               style="width: 0px; height: 0px;"
                               class=""
                               placeholder="title">
                    </div>
                    <!-- End Property Thumbnail -->

                    <!-- Property Images -->
                    <div class="mb-5 mx-5">
                        <label for="imageFiles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property
                            Images</label>
                        <input type="file" name="imageFiles[]" id="imageFiles"
                               class="shadow-sm bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               placeholder="title" multiple />
                        <div id="dvPreview" class="bg-gray-50 mt-5 border rounded">
                            @foreach($property->images as $image)
                            <img class="m-2 inline" src="/{{ $image->path }}" width="80px" height="80px" alt="">
                            @endforeach
                        </div>
                    </div>

                    <script language="javascript" type="text/javascript">
                        window.onload = function () {
                            var fileUpload = document.getElementById("imageFiles");
                            fileUpload.onchange = function () {
                                if (typeof (FileReader) != "undefined") {
                                    var dvPreview = document.getElementById("dvPreview");
                                    dvPreview.innerHTML = "";
                                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                                    for (var i = 0; i < fileUpload.files.length; i++) {
                                        var file = fileUpload.files[i];
                                        if (regex.test(file.name.toLowerCase())) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                var img = document.createElement("IMG");
                                                img.height = "100";
                                                img.width = "100";
                                                img.src = e.target.result;
                                                img.classList.add("d-inline")
                                                img.classList.add("inline")
                                                img.classList.add("m-2")
                                                dvPreview.appendChild(img);
                                            }
                                            reader.readAsDataURL(file);
                                        } else {
                                            alert(file.name + " is not a valid image file.");
                                            dvPreview.innerHTML = "";
                                            return false;
                                        }
                                    }
                                } else {
                                    alert("This browser does not support HTML5 FileReader.");
                                }
                            }
                        };
                    </script>
                    <!-- End Property Images -->

                </div>
                <!-- End Image Uploader -->

                <div class="w-full grid grid-cols-2 gap-4">
                    <!-- Property Name -->
                    <div class="mb-5 mx-5">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Property
                            Name</label>
                        <input type="text"
                               name="title"
                               id="title"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               placeholder="title"
                               value="{{ $property->title }}"
                               required>
                    </div>
                    <!-- End Property Name -->

                    <!-- Price -->
                    <div class="mb-5 mx-5">
                        <label for="price"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" step="1" min="0" max="9999999999"
                               placeholder="Price"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->price }}"
                               required>
                    </div>
                    <!-- End Price -->

                    <!-- Square Feet -->
                    <div class="mb-5 mx-5">
                        <label for="sqft" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Square
                            Feet</label>
                        <input type="number" name="sqft" id="sqft" placeholder="sqft"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->sqft }}"
                               required>
                    </div>
                    <!-- End Square Feet -->

                    <!-- Bedrooms -->
                    <div class="mb-5 mx-5">
                        <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bedrooms</label>
                        <input type="number" name="bedrooms" min="0" step="1" id="bedrooms" placeholder="bedrooms"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->bedrooms }}"
                               required>
                    </div>
                    <!-- End Bedrooms -->

                    <!-- bathrooms -->
                    <div class="mb-5 mx-5">
                        <label for="bathrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">bathrooms</label>
                        <input type="number" name="bathrooms" min="0" step="1" id="bathrooms" placeholder="bathrooms"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->bathrooms }}"
                               required>
                    </div>
                    <!-- End bathrooms -->

                    <!-- balconies -->
                    <div class="mb-5 mx-5">
                        <label for="balconies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">balconies</label>
                        <input type="number" name="balconies" min="0" step="1" id="balconies" placeholder="balconies"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->balconies }}"
                               required>
                    </div>
                    <!-- End balconies -->

                    <!-- garages -->
                    <div class="mb-5 mx-5">
                        <label for="garages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Garages</label>
                        <input type="number" name="garages" min="0" step="1" id="garages" placeholder="garages"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               value="{{ $property->garages }}"
                               required>
                    </div>
                    <!-- End garages -->


                    <!-- Company -->
                    <div class="mb-5 mx-5">
                        <label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                        <select id="company_id"
                                name="company_id"
                                value="{{ $property->company_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($companies as $company)
                                <option  value="{{ $company->id }}" {{ $property->company_id == $company->id ? "selected" : "" }}>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Company -->


                    <!-- Address -->
                    <div class="mb-5 mx-5">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <section class="flex">
                            <select id="address_id"
                                    name="address_id"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    style="min-width: 90%"
                                    value="{{ $property->address_id }}"
                                    required>
                                @foreach($addresses as $address)
                                    <option value="{{ $address->id }}" {{ $property->address_id == $address->id ? "selected" : "" }}>
                                        {{ $address->street }}, {{ $address->city }}, {{ $address->zip_code }}
                                        , {{ $address->state }}, {{ $address->country }},
                                    </option>
                                @endforeach
                            </select>
                            <a href="{{ route('admin.address.create', [ 'back' => route('admin.property.create') ]) }}" class="btn bg-gray-100 mx-2 p-2 rounded-xl border" style="max-width: 10%;">Add</a>
                        </section>
                    </div>
                    <!-- End Address -->


                    <!-- Category -->
                    <div class="mb-5 mx-5">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category_id"
                                name="category_id"
                                value="{{ $property->category_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            @foreach($categories as $category)
                                <option {{ $property->category_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Category -->


                    <!-- Is Available -->
                    <div class="mb-5 mx-5">
                        <label for="is_available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is
                            Available</label>
                        <select id="is_available"
                                name="is_available"
                                value="{{ $property->is_available }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1" {{ $property->is_available == 1 ? "selected" : "" }}>Yes</option>
                            <option value="0" {{ $property->is_available != 1 ? "selected" : "" }}>No</option>
                        </select>
                    </div>
                    <!-- End Available -->


                    <!-- location -->
                    <div class="mb-5 mx-5 ">
                        <label for="location" class="block m-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" id="location" name="location" rows="4"
                               class="block m-3 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="location..."
                               value="{{ $property->location }}"
                        />
                    </div>
                    <!-- End location -->

                    <!-- Summery -->
                    <div class="mb-5 mx-5 col-span-2">
                        <label for="summery" class="block mb-2 m-3 text-sm font-medium text-gray-900 dark:text-white">Summery</label>
                        <!-- The toolbar will be rendered in this container. -->
                        <textarea name="summery" class="block m-3 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $property->summery }}
                        </textarea>
                    </div>
                    <!-- End Summery -->

                    <!-- Description -->
                    <div class="mb-5 mx-5 col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <!-- The toolbar will be rendered in this container. -->
                        <div id="toolbar-container"></div>
                        <textarea name="description"></textarea>
                    </div>
                    <!-- End Description -->
                    <script>
                        let editor = CKEDITOR.replace( 'description', {
                            height: 300,
                            filebrowserUploadUrl: "{{ route('admin.property.create.image-upload') }}"
                        });
                        console.clear()
                        console.log(editor.insertHtml);
                        setTimeout(()=>{
                            editor.insertHtml( `{!!  $property->description !!}` );
                        },500)
                    </script>

                </div>

                <div class="mb-5 mx-5 mt-5">
                    <button type="submit"
                            class="w-full py-0 text-white bg-red-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">
                        Update
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