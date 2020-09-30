@extends('layouts.template')
@section('title', "Assignments for {$type} '{$value->title}'")
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/assignment-page.js') }}"></script>
@endsection
@section('content')
    <form id="score-assignment-form" method="post">
        @csrf

    <div class="library courses w-100 text-center">
        <div class="row p-2">
            <div class="col-12">
                <h4>Action steps for {{ $type }} "{{ $value->title }}"</h4>
            </div>
        </div>

        <div class="row font-none">
            <div class="col-1">#</div>
            <div class="col-4 d-none d-sm-block">Email</div>
            <div class="col-7 col-sm-4">Action step</div>
            <div class="col-4 col-sm-3">Score</div>
        </div>
        {{--/libraryfiles/{{ $library->file }}--}}

        @forelse($assignments as $assignment)
            <div class="assignment-page course-wrapper no-hover-effect row mt-1 my-library">
                <div class="col-1"><span class="number">{{ $loop->index + 1 }}</span></div>
                <div class="col-4 d-none d-sm-block">
                    <a href="{{ route('user-page', ['id' => $assignment->user_id]) }}" class="text-color-link">{{ $assignment->email }}</a>
                </div>
                <div class="col-7 col-sm-4 my-title">
                    <a href="{{ route('assignmentfile', ['path' => $assignment->file]) }}" class="text-color-link">
                        <i class="icon-cloud-download"></i> {{ explode('/', $assignment->file)[1] }}
                    </a>
                </div>
                <div class="col-4 col-sm-3">
                    @if($assignment->score == null)
                        <input type="hidden" name="id[]" value="{{ $assignment->id }}">
                        <input type="number" name="score[]" class="form-control d-inline-block w-50" placeholder="score..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="d-inline-block">%</div>
                    @elseif($assignment->score > 49)
                        <span class="access-student">{{ $assignment->score }}%</span>
                    @else
                        <span class="access-employee">{{ $assignment->score }}%</span>
                    @endif

                </div>
            </div>

        @empty
            <div class="text-center">No action steps Found here!</div>
        @endforelse

        @if(!$assignments->where('score', null)->isEmpty())
            <div class="text-center my-3">
                <button class="my-button-green" id="submit-scores">Submit Scores</button>
            </div>
        @endif

        {{ $assignments->links() }}


    </div>
    </form>
@endsection