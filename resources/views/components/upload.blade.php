<div id="filesFields">
    <div class="form-group">
        <input type="file" name="images[]">
    </div>
</div>

<div class="form-group">
    <button class="btn btn-secondary" onclick="addFileField(event)">New image field</button>
</div>
<script>
function addFileField (e) {
  e.preventDefault();
  const filesFields = $('#filesFields');
  filesFields.append("<div class=\"form-group\"><input type=\"file\" name=\"images[]\"></div>");
}
</script>
