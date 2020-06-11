<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <input class="mdl-textfield__input" type="text" id="field_title" value="{{ $blog_post->title }}" name="title" maxlength="255">
  <label class="mdl-textfield__label" for="field_title">Title</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
  <textarea class="mdl-textfield__input" type="text" rows="3" id="field_excerpt" name="excerpt" maxlength="255">{{ $blog_post->excerpt }}</textarea>
  <label class="mdl-textfield__label" for="field_excerpt">Excerpt</label>
</div>
<div class="mdl-cell mdl-cell--12-col">
  <textarea type="text" rows="7" id="field_content" name="content" class="mdl-textfield__input">{{ $blog_post->content }}</textarea>
  <label class="mdl-textfield__label" for="field_content"></label>
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
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col" id="blog_files">
  <!-- Template //-->
  <div class="mdl-grid mdl-grid--no-spacing file_template">
    <div class="mdl-cell mdl-cell--6-col">
      <input class="mdl-textfield__input" type="file"
        value="{{ $blog_post->theme_image }}" name="blog_file[]">
    </div>
    <div class="mdl-cell mdl-cell--4-col">
      <select name="blog_file_role[]">
        <option value="hero_image">Hero Image</option>
        <option value="slide">Slide</option>
      </select>
    </div>
    <div class="mdl-cell mdl-cell--2-col">
      <div class="mld-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text"
          id="blog_file_priority"
          value="" name="blog_file_priority[]">
        <label
          class="mdl-textfield__label"
          for="blog_file_priority">Priority</label>
      </div>
    </div>
  </div>
</div>
<!-- Template end //-->
<div class="mdl-cell mdl-cell--12-col">
  <button id="clone_file_field" type="button"
    class="mdl-button mdl-js-button mdl-button--raised">Add more files</button>
</div>
<div class="form-action mdl-cell mdl-cell--12-col">
  <button type="reset" class="mdl-button mdl-js-button mdl-button--raised">
    Cancel
  </button>
  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
    Save
  </button>
</div>