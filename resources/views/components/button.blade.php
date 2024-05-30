<a {{ $attributes->merge([ 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white font-bold dark:text-gray-800 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-white  dark:focus:bg-white  dark:active:bg-gray-300 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 w-full justify-center' ]) }}>
    {{ $slot }}
</a>
