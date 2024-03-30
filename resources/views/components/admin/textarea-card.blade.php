@props([
'disabled' => false,
'label' => '',
'name' => '',
'old'=>'',
'value' => '',
'oldVale' => '',
])

<div class="mb-5 w-full ">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-700 ">
        {{ $label }}
    </label>
    @php
        $class = $errors->has($name) ? '!border-red-500' : 'border-gray-300';
    @endphp
   
    <textarea 
   
    name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} type="password" id="password" {!!
        $attributes->merge(["class"=>"shadow-sm bg-gray-50  $class border
     text-gray-900 text-sm rounded-lg focus:ring-blue-500
    focus:border-blue-500 block w-full p-2.5 "]) !!} >
{{old($name,$value)}}    
</textarea>
    <x-input-error :messages="$errors->get($name)" class="pt-1" />

</div>