<div class="row text-center">
    <div class="col-4 col-md-4 mb-3 mb-md-0">
        <div class="box position-relative p-1">
            <div class="boxinner">
                <span
                    class="position-absolute top-0 start-50 translate-middle badge @if($weekUsers <= 0) bg-danger @else bg-success @endif shadow px-2 py-1"
                    style="font-size: 0.65rem;">
                    @if($weekUsers <= 0)@else+@endif{{ $weekUsers }} This Week</span>
                        <div class="pt-2">
                            <p class="bignumber fw-bold">{{ $registeredUsers }}</p>
                            <p class="biginformation mb-2">Registered Users</p>
                        </div>
            </div>
        </div>
    </div>

    <div class="col-4 col-md-4 mb-3 mb-md-0">
        <div class="box position-relative p-1">
            <div class="boxinner">
                <span
                    class="position-absolute top-0 start-50 translate-middle badge @if($mealsReceivedThisWeek <= 0) bg-danger @else bg-success @endif shadow px-2 py-1"
                    style="font-size: 0.65rem;">
                    @if($mealsReceivedThisWeek <= 0)@else+@endif{{ $mealsReceivedThisWeek }} This Week </span>
                        <div class="pt-2">
                            <p class="bignumber fw-bold">{{ number_format($mealsReceived) }}</p>
                            <p class="biginformation mb-2">Meals Received</p>
                        </div>
            </div>
        </div>
    </div>

    <div class="col-4 col-md-4 mb-3 mb-md-0">
        <div class="box position-relative p-1">
            <div class="boxinner">
                <span
                    class="position-absolute top-0 start-50 translate-middle badge @if($mealsOutThisWeek <= 0) bg-danger @else bg-success @endif shadow px-2 py-1"
                    style="font-size: 0.65rem;">
                    @if($mealsOutThisWeek <= 0)@else+@endif{{ $mealsOutThisWeek }} This Week </span>
                        <div class="pt-2">
                            <p class="bignumber fw-bold">{{ number_format($mealsOut) }}</p>
                            <p class="biginformation mb-2">Meals Given Out</p>
                        </div>
            </div>
        </div>
    </div>
</div>