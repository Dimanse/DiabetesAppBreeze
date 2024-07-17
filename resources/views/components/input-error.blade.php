@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm font-bold uppercase text-center  bg-red-200 py-2 border-s-4 border-red-400 text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
