@extends('dashboard.layout')

@section('konten')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h2>Profile</h2>
                @if (get_meta_velue('_foto'))
                    <img style="max-width:100px;max-heigth:100px" src="{{ asset('foto') . '/' . get_meta_velue('_foto') }}">
                @endif
                <div class="mb-3">
                    <label for="_foto" class="form-label">Photo</label>
                    <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">
                </div>
                <div class="mb-3">
                    <label for="_provinsi" class="form-label">Province</label>
                    <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi"
                        value="{{ get_meta_velue('_provinsi') }}">
                </div>
                <div class="mb-3">
                    <label for="_kota" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" name="_kota" id="_kota"
                        value="{{ get_meta_velue('_kota') }}">
                </div>
                <div class="mb-3">
                    <label for="_nohp" class="form-label">Number</label>
                    <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp"
                        value="{{ get_meta_velue('_nohp') }}">
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email"
                        value="{{ get_meta_velue('_email') }}">
                </div>
            </div>
            <div class="col-5">
                <h2>Social Media</h2>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin"
                        value="{{ get_meta_velue('_linkedin') }}">
                </div>
                <div class="mb-3">
                    <label for="_facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control form-control-sm" name="_Facebook" id="_Facebook"
                        value="{{ get_meta_velue('_fecebook') }}">
                </div>
                <div class="mb-3">
                    <label for="_twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control form-control-sm" name="_twitter" id="_twitter"
                        value="{{ get_meta_velue('_twitter') }}">
                </div>
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github" id="_github"
                        value="{{ get_meta_velue('_github') }}">
                </div>

            </div>
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
