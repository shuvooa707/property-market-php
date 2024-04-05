@extends("admin.layout.DashboardLayout")


@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 w-2/4 rounded rounded-md  m-5 mt-7 bg-white dark:bg-gray-500 mx-auto items-center" style="margin-left: 480px">
        <h2 class=" bg-gray-900 text-white text-center p-5 mb-2 w-full">
            <span>Update Category</span>
        </h2>
        <form method="post" action="{{ route('admin.category.update', ['id' => $category->id]) }}" enctype="multipart/form-data" class="w-full grid grid-cols-1 px-8 pb-8 mx-auto">
            @csrf
            <div class="w-full grid grid-cols-1">
                <!-- Category Name -->
                <div class="mb-5 mx-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                    <input value="{{ $category->name }}" type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Name" required>
                </div>
                <!-- End Category Name -->
            </div>

            <div class="mb-5 mx-5 mt-5 w-full">
                <button type="submit" class=" w-full py-0 text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>

        </form>
    </section>
    <!-- End Main Content  -->
@endsection