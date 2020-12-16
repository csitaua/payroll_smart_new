<input
    x-data=""
    x-ref="input"
    x-init="
    $('#{{$attributes->wire('model')->value()}}').datepicker({
       language: '{{ auth()->user()->locale }}',
       autoclose: true
     });

     $('#{{$attributes->wire('model')->value()}}').on('change', function (e) {
           $wire.set('{{$attributes->wire('model')->value()}}', e.target.value);
    });
    "
    type="input"
    {{ $attributes }}
>
