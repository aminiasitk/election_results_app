@extends('layouts.app')

@section('page_content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Showing {{ $data->count() }} of {{ $data->total() }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Identifier</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Area</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>                                   
                                    <td><strong>{{ $d->identifier }}</strong></td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $classification[$d->class] }}</td>
                                    <td>{{ App\Models\Area::find($d->area)->name }}</td>
                                    <td>{{ $d->created_at }}</td>
                                    <td>
                                        <a href="{{ route('party.edit', $d->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                        <a href="{{ route('party.delete', $d->id) }}" class="btn btn-sm btn-danger delete"><i class="la la-trash-o"></i></a>
                                    </td>												
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('page_js')
<script>
    $(document).on('click', '.delete', function(){
        let result = confirm('Are you sure you want to delete?');
        return result;
    });
</script>
@stop
