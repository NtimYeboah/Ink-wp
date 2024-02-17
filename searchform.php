<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="flex flex-row w-full">
        <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Type search term" class="w-full form-input border-r-0 dark:bg-gray-900 dark:text-gray-300">
        <button
            type="submit"
            class="bg-slate-600 hover:bg-slate-700 p-2"
            value="Search"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.0"
                stroke="currentColor"
                class="w-5 h-5 text-white dark:text-gray-200"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
            </svg>
        </button>
    </div>
</form>
