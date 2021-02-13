<div class="col-md-6 mt-4">
    <div class="card card-widget widget-user-2">
        <div class="widget-user-header bg-primary">
            <h3 class="widget-user-username">  {{ projectInf()->project_title }}  </h3>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                @foreach($dashboardService->projectRequestCount(projectInf()->id) as $projectRequest)
                    <li class="nav-item">
                        <span class="nav-link">
                            {{ $projectRequest->value }} <span
                                class="float-right badge bg-primary">{{ $projectRequest->countStatus }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
