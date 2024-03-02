@props([
    'id' => '',
    'type',
    'name',
])

<div class="input-group">
    <label for="{{$id}}">{{$slot}}</label>
    <input
        id="{{$id}}"
        type="{{$type}}"
        name="{{$name}}"
        class="form-input"
        value="{{ old($name) }}"
        required
    >
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
