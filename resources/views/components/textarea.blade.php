@props(['rows' => '2'])

<textarea {{$attributes->class([
    'form-control',
    'border',
    'border-secondary',
    'mb-3',
])->merge([
    'rows' => $rows,
])}}>{{$slot}}</textarea>


