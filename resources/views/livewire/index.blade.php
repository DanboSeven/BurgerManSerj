<div class="container mt-4">
  <div class="row">
    <div class="col-4 col-lg-4">
      <div class="box p-1">
        <div class="boxinner p-2">
          <p class="bignumber fw-bold">0</p>
          <p class="biginformation">Registered Users</p>
        </div>
      </div>
    </div>
    <div class="col-4 col-lg-4">
      <div class="box p-1">
        <div class="boxinner p-2">
          <p class="bignumber fw-bold">10,185</p>
          <p class="biginformation">Meal Donations Received</p>
        </div>
      </div>
    </div>
    <div class="col-4 col-lg-4">
      <div class="box p-1">
        <div class="boxinner p-2">
          <p class="bignumber fw-bold">10,185</p>
          <p class="biginformation">Meals Given Out</p>
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
        @foreach ($recentDonations as $donation)
  <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <div class="me-icon me-3">
        <i class="fa-solid fa-plus fa-2x"></i>
      </div>
      <div class="leaderboard-text">
        <div class="fw-bold">{{ $donation->user ? $donation->user->first_name . ' ' . $donation->user->last_name : $donation->payer_name }}</div>
        <div>from <strong>{{ $donation->user ? $donation->user->location : 'Hidden' }}</strong></div>
        <small>Donated <strong>{{ $donation->quantity }}</strong> Meal{{ $donation->quantity > 1 ? 's' : '' }}</small>
      </div>
    </div>
    <div class="rank-number text-end">
      <span class="badge rank fs-7">{{ $donation->created_at->diffForHumans() }}</span>
    </div>
  </div>
@endforeach
      </div>

      <div class="boxheader me-1">
        <i class="fa-solid fa-burger"></i> Meal Leaderboards
      </div>

      <div class="box p-1">
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">Daniel</div>
              <small class="text-muted">Donated 10 Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#1</span>
          </div>
        </div>
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">Daniel</div>
              <small class="text-muted">Donated 10 Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#1</span>
          </div>
        </div>
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">Daniel</div>
              <small class="text-muted">Donated 10 Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#1</span>
          </div>
        </div>
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">Daniel</div>
              <small class="text-muted">Donated 10 Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#1</span>
          </div>
        </div>
        <div class="leaderboard p-2 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="me-icon me-3">
              <i class="fa-solid fa-burger fa-2x"></i>
            </div>
            <div class="leaderboard-text">
              <div class="fw-bold">Daniel</div>
              <small class="text-muted">Donated 10 Meals</small>
            </div>
          </div>
          <div class="rank-number text-end">
            <span class="badge rank fs-7">#1</span>
          </div>
        </div>

      </div>


    </div>
  </div>