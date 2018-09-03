@extends('layouts.app')

@section('content')
    <!-- Upload -->
    <div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome, {{ Auth::user()->name }}</div>
                <div class="card-body" style="width: 50%;margin: 0 auto; width: 400px;">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <h4 style="margin-bottom: 20px;">Upload request/response xml file</h4>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            </div>
                        @endif
                    <form action="{{ route('file.upload') }}" enctype="multipart/form-data" id="js-upload-form" method="post">
                        <div class="form-inline">
                            <div class="form-group">
                            <input type="file" name="file[]" id="js-upload-files" value="" multiple>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <button type="submit" name="button" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                        </div>
                    </form>

                        <h4 style="margin-top: 20px;">Or drag and drop files below</h4>

                        <div class="content" style="margin-top: 20px;">
                            <form class="dropzone" enctype="multipart/form-data" id="dropzone" method="post" action="{{ route('file.upload') }}">
                                <div class="dz-message">
                                    <h4>Drag files to Upload</h4>
                                    <span>Or click to browse</span>
                                </div>
                                <!-- Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                         </div>

                     </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Global statistics</div>
                    <div class="card-body">
                        <div class="row placeholders">
                            <div class="col-xs-6 col-sm-3 bg-primary text-white" style="border-radius: 28px;text-align: center;">
                                <img src="" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Card Holder</h4>
                                <span>{{print_r(\App\NewCardHolder::count())}}</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 bg-secondary text-white" style="border-radius: 28px;text-align: center;">
                                <img src="" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Card Issue</h4>
                                <span>{{print_r(\App\CardIssue::count())}}</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 bg-warning text-white" style="border-radius: 28px;text-align: center;">
                                <img src="" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Card Load</h4>
                                <span>{{print_r(\App\CardLoad::count())}}</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 bg-info text-white" style="border-radius: 28px;text-align: center;">
                                <img src="" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Card Reissue</h4>
                                <span>{{print_r(\App\CardReissue::count())}}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
