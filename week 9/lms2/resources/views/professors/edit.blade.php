<form method="POST" action="{{ route('professors.update',$professor) }}" class="card p-3">
  @csrf @method('PUT')

  <input name="name"  class="form-control mb-3" value="{{ old('name',$professor->name) }}" required>
  <input name="email" class="form-control mb-3" value="{{ old('email',$professor->email) }}" type="email">

  @php $current = optional($professor->course)->id; @endphp
  <label class="form-label">Assign Course (optional)</label>
  <select name="course_id" class="form-select mb-3">
    <option value="">— None —</option>
    @foreach($availableCourses as $c)
      <option value="{{ $c->id }}" @selected(old('course_id',$current) == $c->id)>{{ $c->name }}</option>
    @endforeach
  </select>

  <button class="btn btn-primary">Update</button>
</form>
