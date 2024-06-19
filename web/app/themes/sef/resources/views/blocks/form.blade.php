<form class="{{ $block->classes }} block-form" @method('post') style="{{ $block->inlineStyle }}">
  @foreach($fields as $field)
    @if($field->type === 'text_input')
      <label class="form__label">{{ $field->label }}</label>
      <input type="text" name="{{ $field->label }}" class="form__input" placeholder="{{ $field->placeholder }}">
    @endif
  @endforeach
  <button type="submit" class="block-form__submit">{{ $submit }}</button>
</form>
