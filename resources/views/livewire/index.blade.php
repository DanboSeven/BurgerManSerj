<div class="container mt-4">
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

  <livewire:donation-goal />
  <div class="row">
    <div class="col-lg-8">
      <div class="boxheader">
        <i class="fa-solid fa-person me-1"></i> Our Story
      </div>
      <div class="box p-1">
        <div class="boxinner">
          <i class="fa-solid fa-person"></i> <strong>Who Am I?</strong><br />
          I'm <strong>Burgerman Serj</strong> — London-born, Medway-based restaurateur and TikToker. I use my platform
          to support the local community by providing free hot meals to the homeless and those facing hardship in
          Chatham and beyond.<br />
          Thanks to your generous donations and continued support, we're able to give away <strong>80-90 freshly cooked
            meals every week</strong> — right from our high street kitchen.
          <hr>
          <img src="{{asset('/build/assets/serj.jpeg')}}" align="right" width="180" style="border-radius: 100%;">

          <i class="fa-solid fa-burger"></i> <strong>From Burgers to Community Giving</strong><br />
          In 2021, I opened <strong>Hungry House Burgers & Kebab</strong> on Chatham High Street with little more than
          ambition and a love for food. I didn't come from a culinary background — just a desire to serve my
          community.<br />
          In December 2023, I started livestreaming my burger-making journey on TikTok. The support was overwhelming —
          thousands of you joined the stream, shared kind words, and donated to help us grow.<br />
          Today, we've built a family of nearly <strong>300,000 followers</strong> on TikTok, and I go live nearly every
          day to cook, chat, and raise funds for our outreach efforts.

          <br /><br />
          <i class="fa-solid fa-heart" style="color:red;"></i> <strong>Weekly Outreach to Those in Need</strong><br />
          Every Thursday, from <strong>3:00 PM to 7:00 PM</strong>, we serve hot meals to those in need — no questions
          asked. People travel from across Medway and Maidstone for a warm, freshly prepared meal and a moment of
          dignity.<br />
          Whether it's rain or shine, our mission remains the same: <em>nobody should go hungry if we can help
            it</em>.<br />
          Donations come through TikTok gifts, PayPal, and now directly through our website. Every penny you give goes
          towards ingredients, supplies, and serving the community.

          <br /><br />
          <i class="fa-solid fa-bolt-lightning" style="color:goldenrod;"></i> <strong>Powered by
            Livestreaming</strong><br />
          My livestream isn't just about cooking burgers — it's about connection. Every gift you send during a TikTok
          Live helps us turn digital support into real-life action. On busy nights, the TikTok community even helps
          decide what to give away and how many meals to make.<br />
          It's more than a kitchen — it's a movement powered by kindness.

          <br /><br />
          <i class="fa-solid fa-seedling" style="color:green;"></i> <strong>What's Next?</strong><br />
          I dream of expanding our outreach further — more meals, more nights, and perhaps even food trucks or pop-up
          kitchens that travel to where help is needed most.<br />
          With your support, anything is possible. Let's keep building this together — one burger, one livestream, and
          one act of kindness at a time.

          <br /><br />
          <i class="fa-solid fa-hands-holding-heart" style="color:#e63946;"></i> <strong>Thank You</strong><br />
          Whether you've donated, watched a stream, shared our story, or just sent a kind message — you're a part of
          this. From the bottom of my heart, thank you for helping us feed hope into the community.
        </div>
      </div>


    </div>
    <div class="col-lg-4">
      <div class="boxheader me-1">
        <i class="fa-solid fa-plus"></i> Recent Meal Donations
      </div>

      <div class="box p-1">
        @forelse ($recentDonations as $donation)
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-plus fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">
                @if ($donation->user->hide_full_name == '1')
                {{ $donation->user->first_name }}
                @else
                {{ $donation->user->first_name . ' ' . $donation->user->last_name }}
                @endif
              </div>
              @if ($donation->user->hide_location == '1')
              @else
              <div>from <strong>{{ $donation->user->location }}</strong></div>
              @endif
              <small>Donated <strong>{{ $donation->quantity }}</strong> Meal{{ $donation->quantity > 1 ? 's' : ''
                }}</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">{{ $donation->created_at->diffForHumans() }}</span>
          </div>
        </div>
        @empty
        <div class="alert alert-warning mb-0" role="alert">
        <i class="fa-solid fa-bowl-food me-1"></i> No recent meal donations yet.
      </div>
        @endforelse
      </div>

      <div class="boxheader me-1">
        <i class="fa-solid fa-burger"></i> Meal Leaderboards
      </div>

      <div class="box p-1">
        @php $i = 0; @endphp
        @forelse ($donationLeaderboards as $leaderboard)
        @php $i++; @endphp
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">
                @if ($leaderboard->hide_full_name == '1')
                {{ $leaderboard->first_name }}
                @else
                {{ $leaderboard->first_name . ' ' . $leaderboard->last_name }}
                @endif
              </div>
              @if ($leaderboard->hide_location == '1')
              @else
              <div>from <strong>{{ $leaderboard->location }}</strong></div>
              @endif
              <small class="text-muted">{{ $leaderboard->meals_donated }} Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#{{ $i }}</span>
          </div>
        </div>
        @empty
        <div class="alert alert-warning mb-0" role="alert">
        <i class="fa-solid fa-burger me-1"></i> No top meal donators yet
      </div>
        @endforelse
      </div>



    </div>
  </div>