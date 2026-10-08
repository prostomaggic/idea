@props(['label', 'name', 'type'])
<div class="space-y-2">
    <label for='{{ $name }}' class="label">{{ $label }}</label>
    <input type="{{ $type }}" class="input" id="{{ $name }}" name="{{ $name }}">
</div>