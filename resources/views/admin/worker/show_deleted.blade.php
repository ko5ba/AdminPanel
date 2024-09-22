@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $worker->last_name . ' '. $worker->first_name . ' ' . $worker->patronymic }}</li>
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
                    <form action="{{ route('workers.restore.deleted', $worker->id) }}" method="POST" class="col-3 mb-3">
                        @csrf
                        @method('put')
                        <div>
                            <input type="submit" class="btn btn-block btn-primary" value="Восстановить">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $worker->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>ФИО</td>
                                        <td>{{ $worker->last_name . ' ' .$worker->first_name . ' ' . $worker->patronymic }}</td>
                                    </tr>
                                    <tr>
                                        <td>Возраст</td>
                                        <td>{{ $worker->age }}</td>
                                    </tr>
                                    <tr>
                                        <td>Описание</td>
                                        <td>{{ $worker->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Почта</td>
                                        <td>{{ $worker->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Должность</td>
                                        <td>{{  $positionForWorker }}</td>
                                    </tr>
                                    <tr>
                                        <td>Добавлен</td>
                                        <td>{{ $worker->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Удален</td>
                                        <td>{{ $worker->deleted_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
