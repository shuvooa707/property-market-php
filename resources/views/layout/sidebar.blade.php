<aside style="max-width: 380px;" id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-0 py-0 overflow-y-auto bg-gray-50 dark:bg-gray-50">
        <ul class="font-medium">
            @foreach(\App\Models\Category::all() as $category)
            <li class="{{ $category->slug == request()->url() ? 'text-gray-950 bg-blue-50 p-4 mb-0 hover:bg-blue-900 cursor-pointer' : 'text-white bg-blue-500 p-4 mb-0 hover:bg-blue-900 cursor-pointer' }}">
                <a class="w-full h-full block" href="/property/category/{{$category->id}}" >
                    <span  class="inline-flex items-center rounded-md bg-gray-800 text-white px-1 py-0.5 text-xs font-medium ring-1 ring-inset ring-pink-700/10">
                        {{ $category->properties->count() }}
                    </span>
                    <span>
                        {{ $category->name }}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
