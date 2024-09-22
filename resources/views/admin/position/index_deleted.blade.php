@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Должности</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Название</th>
                                                <th colspan="2" class="text-center">Действие</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($positions as $position)
                                                <tr>
                                                    <td>{{ $position->id }}</td>
                                                    <td>{{ $position->title }}</td>
                                                    <td><a href="{{ route('positions.show.deleted', $position->id) }}" class="btn btn-block btn-primary">Просмотр</a></td>
                                                    <td>
                                                        <form action="{{ route('positions.restore.deleted', $position->id) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <input class="btn btn-block btn-primary" type="submit" value="Восстановить">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="m-3 svg-width-20px">
                                        {{ $positions->links('pagination::default', ['class' => 'small-icon']) }}
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
