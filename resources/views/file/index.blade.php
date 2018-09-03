@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-weight: bold;">Files manager</div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>
                                No.
                            </th>
                            <th>
                                File Name
                            </th>
                            <th>
                                Path
                            </th>
                            <th>
                                Uploaded by
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                            <tr>
                                <td>{{ $file->id }}</td>
                                <td>
                                    {{ $file->file_name }}
                                </td>
                                <td>
                                    {{ $file->path }}
                                </td>
                                <td>
                                    {{ $file->user->name }}
                                </td>
                                <td>
                                    {{ $file->created_at->diffForHumans() }}
                                </td>
                                <td align="right">
                                    <a href="{{ route('file.parse',$file->id) }}" class="btn btn-primary btn-xs">Parse</a>
                                    {{ Form::open(array('url' => 'file/' . $file->id)) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md'] )  }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection