
<div>
<input
    x-data="{ open: @entangle($attributes->wire('model')) }"
    x-ref="input"
    x-init="
    new Pikaday({ field: $refs.input,
      onSelect: function(dateText) {
       @this.set('{{$attributes->wire('model')->value()}}', dateText);
     },
     yearRange: [{{ date('Y') - 90}}, {{ date('Y')}}] ,
   })"
    type="text"
    {{ $attributes }}
>
</div>
