@extends('admin.layouts.admin')

@section('content')
{{--
<div class="main-panel">
    <div class="content-wrapper"> --}}
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">About me</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.aboutme.update', $user->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <p class="card-description"> Personal info </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Name <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="John Doe"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Email <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="email@exa.ple" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Phone <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phone" value="{{$user->phone}}"  placeholder="+201012345678"  />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Address <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="address" value="{{$user->address}}"  placeholder="Cairo, Egypet" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        Job <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="job" value="{{$user->job}}" placeholder="Senior software developer at xyz" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                          Degree <span style="color:red">*</span>
                        </label>
                        <div class="col-sm-9">
                      <input type="text" class="form-control" name="degree" value="{{$user->degree}}" placeholder="Senior, phd, BCS, ..." />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Experience <span style="color:red">*</span>
                        </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="experience" value="{{$user->experience}}" placeholder="+5 yox"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                          Birth Day <span style="color:red">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="birth_day" value="{{ $user->birth_day}}" placeholder="yyyy-mm-dd" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
          </div>
      </div>

{{-- </div>
</div> --}}

@endsection
