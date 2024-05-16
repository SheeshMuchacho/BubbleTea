@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-red-300 focus:border-indigo-500 focus:ring-red-500 rounded-md shadow-sm']) !!}>
