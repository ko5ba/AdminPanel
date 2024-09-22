@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление сотрудника</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Добавление нового сотрудника</li>
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
                        <form class="w-25" action="{{ route('workers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="Введите имя" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Введите фамилию" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="patronymic" placeholder="Введите отчество" value="{{ old('patronymic') }}">
                                @error('patronymic')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="age" placeholder="Введите возраст" value="{{ old('age') }}">
                                @error('age')
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
                                <input type="email" class="form-control" name="email" placeholder="Введите рабочую почту" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-100">
                                <label>Выберите должность</label>
                                <select class="form-control" name="position_id">
                                    @foreach($positions as $position)
                                        <option value = {{ old('position_id') ?? $position->id }}
                                            {{ $position->id == old('position_id') ? ' selected' : '' }}
                                        >{{ $position->title }}</option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <div class="text-danger w-100">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3"></div>
                            <div class="form-group w-100">
                                <label for="exampleInputFile">Фото сотрудника</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="photo_worker" value="{{ old('photo_worker') }}">
                                        <label class="custom-file-label">Выберите файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                @error('photo_worker')
                                    <div class="text-danger">{{ $message }}</div>
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
