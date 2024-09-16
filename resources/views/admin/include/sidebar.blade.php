<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('workers.index') }}" class="nav-link">
                    <i class="nav-icon fa-calendar-days"></i>
                    <p>
                        Сотрудники
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('positions.index') }}" class="nav-link">
                    <i class="nav-icon fa-calendar-days"></i>
                    <p>
                        Должности
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('projects.index') }}" class="nav-link">
                    <i class="nav-icon fa-calendar-days"></i>
                    <p>
                        Проекты
                    </p>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
