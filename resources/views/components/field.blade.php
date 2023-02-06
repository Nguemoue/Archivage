@if ($item->label)
    <label>{{ $item->label }}</label><br>
@endif
@if (Str::lower($item->nom) == 'input')
    <{{ $item->nom }} type="{{ $item->type }}" class="{{ $item->class }}" min="{{ $item->min }}"
        max="{{ $item->max }}" {{ $item->required ? 'required' : '' }} name="{{ $item->name ? $item->name : $item->nom . '-' . $item->id }}"
        value="{{ $item->value }}" {{$attributes}} />
@elseif(Str::lower($item->nom) == 'textarea')
    <textarea class="{{ $item->class }}" placeholder="{{ $item->placeholder }}">{{ $item->value }}</textarea>
@endif
