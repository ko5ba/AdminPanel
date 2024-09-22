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
                            <li class="breadcrumb-item active">Удаленные данные</li>
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
                    <div class="col-3 mb-3">
                        <a href="{{ route('workers.index.deleted') }}" type="button" class="btn btn-block btn-primary">Удаленные сотрудники</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 mb-3">
                        <a href="{{ route('positions.index.deleted') }}" type="button" class="btn btn-block btn-primary">Удаленные должности</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 mb-3">
                        <a href="{{ route('projects.index.deleted') }}" type="button" class="btn btn-block btn-primary">Удаленные проекты</a>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
