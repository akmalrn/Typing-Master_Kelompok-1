<!-- resources/views/typing_lessons/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Typing Lesson</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create Typing Lesson</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('CreateTypingLessons') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="lesson_title">Title</label>
            <input type="text" class="form-control" id="lesson_title" name="lesson_title" value="{{ old('lesson_title') }}" required>
        </div>
        <div class="form-group">
            <label for="lesson_content">Content</label>
            <textarea class="form-control" id="lesson_content" name="lesson_content" rows="5" required>{{ old('lesson_content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="difficulty_level">Difficulty Level</label>
            <input type="text" class="form-control" id="difficulty_level" name="difficulty_level" value="{{ old('difficulty_level') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Lesson</button>
    </form>
</div>
</body>
</html>
