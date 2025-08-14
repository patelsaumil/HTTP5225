<form method="POST" action="{{ route('professors.store') }}" class="card p-3">
  @csrf
  <input name="name"  class="form-control mb-3" value="{{ old('name') }}"  placeholder="Name" required>
  <input name="email" class="form-control mb-3" value="{{ old('email') }}" placeholder="Email (optional)" type="email">

  <label class="form-label">Assign Course (optional)</label>
  <select name="course_id" class="form-select mb-3">
    <option value="">— None —</option>
    @foreach($availableCourses as $c)
      <option value="{{ $c->id }}" @selected(old('course_id') == $c->id)>{{ $c->name }}</option>
    @endforeach
  </select>

  <button class="btn btn-primary">Save</button>
</form>
