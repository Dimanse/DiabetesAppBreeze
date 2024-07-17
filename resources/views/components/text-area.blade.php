@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-300 dark:focus:border-indigo-500 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}></textarea>