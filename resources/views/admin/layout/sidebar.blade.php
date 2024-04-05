<aside
        id="sidebar-multi-level-sidebar"
        class="bg-gray-100 fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100">
        <ul id="sidemenu-ul" class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li class="cursor-pointer">
                <a href="/admin/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard -->

            <!-- Property -->
            <li class="cursor-pointer text-blue-100">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="property-ul" data-collapse-toggle="property-ul">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Property</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="property-ul" class="hidden py-2 space-y-2 text-blue-100">
                    <li class="bg-blue-600 ">
                        <a href="/admin/property" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            <span class="inline-block ml-2">
                                View All
                            </span>
                        </a>
                    </li>
                    <li class="bg-blue-600">
                        <a href="/admin/property/create" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-plus mx-3"></i> <span class="inline-block ml-2">Create</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Property -->

            <!-- Categories -->
            <li class="cursor-pointer">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="category" data-collapse-toggle="category">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Category</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="category" class="hidden py-2 space-y-2">
                    <li class="bg-blue-600 ">
                        <a href="/admin/category" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            View
                        </a>
                    </li>
                    <li class="bg-blue-600 ">
                        <a href="/admin/category/create" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-plus mx-3"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Categories -->

            <!-- Company -->
            <li class="cursor-pointer">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="company" data-collapse-toggle="company">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Company</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="company" class="hidden py-2 space-y-2">
                    <li class="bg-blue-600 ">
                        <a href="/admin/company" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            View
                        </a>
                    </li>
                    <li class="bg-blue-600 ">
                        <a href="/admin/company/create" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-plus mx-3"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Company -->

            <!-- Address -->
            <li class="cursor-pointer">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="address" data-collapse-toggle="address">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Address</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="address" class="hidden py-2 space-y-2">
                    <li class="bg-blue-600 ">
                        <a href="/admin/address" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            View
                        </a>
                    </li>
                    <li class="bg-blue-600 ">
                        <a href="/admin/address/create" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-plus mx-3"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Address -->

            <!-- User -->
            <li class="cursor-pointer">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="user" data-collapse-toggle="user">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">User</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="user" class="hidden py-2 space-y-2">
                    <li class="bg-blue-600 ">
                        <a href="/admin/user" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            View
                        </a>
                    </li>
                    <li class="bg-blue-600 ">
                        <a href="/admin/user/create" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-plus mx-3"></i>
                            Create
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End User -->

            <!-- Review -->
            <li class="cursor-pointer">
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="review" data-collapse-toggle="review">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Review</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="review" class="hidden py-2 space-y-2">
                    <li class="bg-blue-600 ">
                        <a href="/admin/reviews" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-regular fa-eye mx-3"></i>
                            View
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Review -->
        </ul>
    </div>
</aside>