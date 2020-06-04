<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <input class="mdl-textfield__input" type="text" id="field_title" value="{{ $blog_post->title }}" name="title">
  <label class="mdl-textfield__label" for="field_title">Title</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <input class="mdl-textfield__input" type="text" id="field_theme_image" value="{{ $blog_post->theme_image }}" name="theme_image">
  <label class="mdl-textfield__label" for="field_theme_image">Theme Image</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <textarea class="mdl-textfield__input" type="text" rows="3" id="field_excerpt" name="excerpt">{{ $blog_post->excerpt }}</textarea>
  <label class="mdl-textfield__label" for="field_excerpt">Excerpt</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <textarea class="mdl-textfield__input" type="text" rows="7" id="field_content" name="content">{{ $blog_post->content }}</textarea>
  <label class="mdl-textfield__label" for="field_content">Content</label>
</div>
<div class="mdl-cell mdl-cell--12-col">
  <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="field_online">
    @if($blog_post->online == 'online')
      <input type="checkbox" id="field_online" class="mdl-switch__input" name="field_online" checked>
    @else
      <input type="checkbox" id="field_online" class="mdl-switch__input" name="online">
    @endif
    <span class="mdl-switch__label">Online</span>
  </label>
</div>
<div class="form-action mdl-cell mdl-cell--12-col">
  <button type="reset" class="mdl-button mdl-js-button mdl-button--raised">
    Cancel
  </button>
  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
    Save
  </button>
</div>