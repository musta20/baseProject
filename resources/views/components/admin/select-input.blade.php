@props([
'disabled' => false,
'label' => '',
'name' => '',
'options'=>[],
'selected' => '',
])
<div class="mb-5 w-1/2 ">
    <label class="block mb-2 text-sm font-medium text-gray-700 ">
        {{ $label }}
    </label>
    @php
    $class = $errors->has($name) ? '!border-red-500' : 'border-gray-300';
    @endphp

    <select

    name="{{ $name }}" {{ $disabled ? 'disabled' : '' }}   {!!
        $attributes->merge(["class"=>"shadow-sm bg-gray-50 pr-10 $class border
     text-gray-900 text-sm rounded-lg focus:ring-blue-500
    focus:border-blue-500 block w-full p-2.5 "]) !!}  >

        @foreach ($options as $key => $value)

        @if ($options instanceof  Illuminate\Support\Collection )
        <option @if ($selected == $value->id) selected @endif value="{{ $value->id }}">{{ __($value->name ?? $value->title) }}</option>

        @else
        <option @if ($selected == $value->value) selected @endif value="{{ $value->value }}">{{ __('messages.'.$value->name) }}</option>

        @endif
        @endforeach
    </select>



    <x-input-error :messages="$errors->get($name)" class="pt-1" />

</div>