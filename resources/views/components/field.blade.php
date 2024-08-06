@if ($item->label)
	<label>{{ $item->label }}</label><br>
@endif
@if (str($item->nom)->lower() === 'input')
	<input type="{{ $item->type }}" class="{{ $item->class }}" min="{{ $item->min }}"
	max="{{ $item->max }}" {{ $item->required ? 'required' : '' }} name="{{ $item->name ?: $item->nom . '-' . $item->id }}"
	value="{{ $item->value }}" {{$attributes}} />
@elseif(str($item->nom)->lower() == 'textarea')
	<textarea class="{{ $item->class }}" placeholder="{{ $item->placeholder }}">{{ $item->value }}</textarea>
@endif
