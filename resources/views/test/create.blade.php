<form action="{{ route('test.store') }}" method="post">
    @csrf
    <input type="text" name="test"/>
    <button type="submit" class="btn btn-success"> Save </button>
</form>

