@extends("admin.layout.DashboardLayout")


@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-8 m-5 w-2/4" style="margin-left: 480px">
        <div class="grid grid-cols-6 mb-3 text-center">
            <a href="{{ route('admin.category.create') }}" class="bg-orange-50 text-pink-800 px-2 py-2 rounded rounded-m cursor-pointer w-full my-5 flex items-center">
                <i class="fa-solid fa-plus mx-3"></i>
                <span class="px-1"> </span>
                <span>Create</span>
            </a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"  th:each="category : ${categoryList}">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="/admin/category/{{ $category->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            View
                        </a>
                        <a class="text-white bg-amber-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 dark:bg-red-500 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Delete
                        </a>
                        <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="text-black bg-amber-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 dark:bg-amber-500 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <!--  Pagination  -->
        <nav aria-label="Page navigation example mt-5 bg-gray-100 shadow">
            {{ $categories->links() }}
        </nav>
        <!-- End Pagination  -->
    </section>
    <!-- End Main Content  -->
@endsection