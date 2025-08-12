<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ilets test</title>

</head>
<body>

    <div class="container">
        <h1>IELTS Test</h1>

        @foreach ($sections as $section)
            <h2>{{ $section->name }} (Duration: {{ $section->duration }} minutes)</h2>

            @foreach ($section->questionGroups as $group)
                <h3>{{ $group->title }}</h3>
                {{-- @if ($group->media_file)
                <audio controls>
                    <source src="{{ asset('media/' . $group->media_file) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                @endif --}}

                @foreach ($group->questions as $question)
                    <div style="margin-bottom: 20px;">
                        <p><strong>Q{{ $question->order_no }}: </strong>{!! nl2br(e($question->text)) !!}</p>

                        @if ($question->type == 'mcq')
                        @foreach ($question->options as $option)
                        <div>
                            <input type="radio" name="answers[{{ $question->question_id }}]" id="option_{{ $option->option_id }}" value="{{ $option->option_id }}">
                            <label for="option_{{ $option->option_id }}">{{ $option->text }}</label>
                        </div>
                        @endforeach

                        @elseif ($question->type == 'fill_blank')
                        <input type="text" name="answers[{{ $question->question_id }}]" class="form-control" />

                        @elseif ($question->type == 'essay')
                        <textarea name="answers[{{ $question->question_id }}]" class="form-control" rows="6"></textarea>
                        @endif
                    </div>
                @endforeach
            @endforeach
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Test</button>
    </div>
</body>
</html>
