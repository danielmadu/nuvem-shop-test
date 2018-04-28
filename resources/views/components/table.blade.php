<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Nickname</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($superheroes as $superhero)
            <tr>
                <td><img style="height: auto; width: 100px" src="{{Storage::url($superhero->images()->first()->path ?? null)}}" alt=""></td>
                <td>{{$superhero->nickname}}</td>
                <td>
                    <a href="{{route('show', ['superheroId' => $superhero->id])}}" class="btn">Show</a>
                    <a href="{{route('edit', ['superheroId' => $superhero->id])}}" class="btn">Edit</a>
                    <a href="{{route('destroy', ['superheroId' => $superhero->id])}}" class="btn" onclick="destroy(event)">Destroy</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $superheroes->links() }}

<script>
    function destroy (e) {
      e.preventDefault();
      const c = confirm('Are you sure?');
      if (c) {
        window.location = e.target.href;
      }
    }
</script>