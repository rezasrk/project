<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <select style="background-color: #9999ff;color: #ffffff" class="form-control switch-project" name="project">
            @foreach(getProjects() as $project)
                <option @if(projectInf()->id == $project->id) selected
                        @endif value="{{ $project->id  }}">{{  $project->project_title }}</option>
            @endforeach
        </select>
    </div>
</nav>
