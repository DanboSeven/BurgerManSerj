<div wire:poll.30s>
  @if ($goal && $goal->active)
  @php
  $count1 = $goal->donated / $goal->goal;
  $count2 = $count1 * 100;
  $count = number_format($count2, 0);
  $current_percent = $count;
  @endphp
  <div class="boxheader">
    <i class="fa-solid fa-bullseye me-1" style="color: #52b256;"></i> <strong>Meal Donation Goal</strong>
  </div>
  <div class="box p-1">
    <div class="boxinner p-2">
      <div class="progress" style="height: 20px;border-radius: 4px;background-color: #d8d8d8;overflow: hidden;">
        <div id="progressBar" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="500"
          aria-valuenow="0" style="
         background-color: #259929;
         color: #fff;
         font-weight: 600;
         text-shadow: 1px 1px #00000059;
         font-size: 14px;
         display: flex;
         align-items: center;
         justify-content: center;
         width: {{ $current_percent }}%;
       ">
          {{ $current_percent }}%
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-1">
        <span><strong>Meals Donated:</strong> <span id="mealsCurrent">{{ $goal->donated }}</span></span>
        <span><strong>Goal:</strong> {{$goal->goal }}</span>
      </div>

      <div class="text-center">
        <a href="/donate">
          <button class="btn greenbtn"><i class="fa-solid fa-bowl-food me-1"></i> Donate a Meal</button>
        </a>
      </div>


    </div>
  </div>
  @endif
</div>