<div class="col-md-6 mt-4">
    <div class="card card-widget widget-user-2">
        <div class="widget-user-header bg-success">
            <h3 class="widget-user-username">  درخواست های سامانه  </h3>
        </div>
        <div class="card-footer p-0">
            <ul class="nav flex-column">
                @foreach($dashboardService->requestCount() as $requestCount)
                    <li class="nav-item">
                        <span class="nav-link">
                            {{ $requestCount->value }} <span
                                class="float-right badge bg-success">{{ $requestCount->countStatus }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

