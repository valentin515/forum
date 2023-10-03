@props(['name' => ''])

@error($name)
    <span class="text-danger d-block">{{$message}}</span>
@enderror