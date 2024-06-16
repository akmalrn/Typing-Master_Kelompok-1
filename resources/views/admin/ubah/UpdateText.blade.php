<div class="container mt-5">
    <h2>Edit Typing Lesson</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('UpdateText', $typing_lessons->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="lesson_tittle">Lesson Title:</label>
            <input type="text" class="form-control" id="lesson_tittle" name="lesson_tittle" value="{{ old('lesson_tittle', $lesson->lesson_tittle) }}" required>
        </div>

        <div class="form-group">
            <label for="lessons_content">Lesson Content:</label>
            <textarea class="form-control" id="lessons_content" name="lessons_content" rows="5" required>{{ old('lessons_content', $lesson->lessons_content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="difficulty_level">Difficulty Level:</label>
            <input type="number" class="form-control" id="difficulty_level" name="difficulty_level" value="{{ old('difficulty_level', $lesson->difficulty_level) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Lesson</button>
    </form>
</div>
