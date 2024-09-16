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
                        <form class="w-25" action="{{ route('workers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Введите ФИО">
                                @error('name')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="age" placeholder="Введите возраст">
                                @error('age')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div>
                                <textarea class="form-control" name="description" placeholder="Введите описание сотрудника"></textarea>
                                @error('description')
                                    <div class="text-danger">Превышено количество символов</div>
                                @enderror
                            </div>
                            <div class="m-3"></div>
                            <div>
                                <input type="email" class="form-control" name="email" placeholder="Введите рабочую почту">
                                @error('email')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите должность</label>
                                <select class="form-control" name="position_id">
                                    @foreach($positions as $position)
                                        <option value = {{ $position->id }}
                                            {{ $position->id == old('position_id') ? ' selected' : '' }}
                                        >{{ $position->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">Выберите должность</div>
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
