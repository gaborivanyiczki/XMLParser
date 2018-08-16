@extends('layouts.app')

@section('content')

    <div class="container">
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
                            <input type="file" name="file" id="js-upload-files" value="" multiple>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <button type="submit" name="button" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                        </div>
                    </form>

                        <h4 style="margin-top: 20px;">Or drag and drop files below</h4>

                        <div class="content" style="margin-top: 20px;">
                            <form class="dropzone" enctype="multipart/form-data" method="POST" action="{{ route('file.upload') }}">
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
</div>


<script type="text/javascript">

</script>
@endsection
