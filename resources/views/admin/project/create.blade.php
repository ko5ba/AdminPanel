@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление проекта</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Добавление нового проекта</li>
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
                        <form class="w-25" action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Введите название проекта" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <textarea id="summernote" name="description">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="m-3"></div>
                            <div>
                                <label for="dateDeadline">Выберите дату крайнего срока</label>
                                <input type="date" class="form-control" name="date_deadline" placeholder="Введите крайний срок" value="{{ old('date_deadline') }}">
                                @error('date_deadline')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="timeDeadline">Выберите время крайнего срока</label>
                                <input type="time" class="form-control" name="time_deadline" placeholder="Введите время крайнего срока" value="{{ old('time_deadline') }}">
                                @error('time_deadline')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Сотрудники</label>
                                <select class="select2" multiple="multiple" data-placeholder="Выберите сотрудников в проект" style="width: 100%;" name="worker_ids[]">
                                    @foreach($workers as $worker)
                                        <option {{ is_array( old('worker_ids')) && in_array($worker->id, old('worker_ids')) ? ' selected' : '' }} value="{{ $worker->id }}">{{ $worker->last_name . ' ' . $worker->first_name . ' ' . $worker->patronymic }}</option>
                                    @endforeach
                                </select>
                                @error('worker_ids[]')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="m-3"></div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
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
