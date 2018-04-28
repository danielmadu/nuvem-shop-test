<div class="row">
    <table class="table">
        <tbody>
            @foreach($superhero->images as $image)
                <tr>
                    <td><img style="height: auto; width: 100px" src="{{Storage::url($image->path)}}" alt=""></td>
                    <td>
                        <a href="{{route('image.destroy', ['imageId' => $image->id])}}" onclick="destroy(event)" class="btn">Destroy</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
  function destroy (e) {
    e.preventDefault();
    const c = confirm('Are you sure?');
    if (c) {
      window.location = e.target.href;
    }
  }
</script>