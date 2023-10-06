@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Programming Language and Tools</label>
            <input type="text" class="form-control form-control-sm skill" name="_skill" id="judul"
                aria-describedby="helpId" placeholder="Your Skill & Tools" value="{{ get_meta_velue('_skill') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Workflow</label>
            <textarea class="form-control summernote" name="_workflow" cols="5">{{ get_meta_velue('_workflow') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
