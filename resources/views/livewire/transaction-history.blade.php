<div class="container mt-4">
    <livewire:header-stats />
    <div class="boxheader">
        <i class="fa-solid fa-chart-simple me-1"></i> Transaction History
    </div>

    <div class="box p-1">
        <div class="boxinner" style="padding: 0px;">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center;"><i class="fa-solid fa-hashtag"></i></th>
                            <th scope="col" style="text-align:center;"><i class="fa-solid fa-calendar me-1"></i> Date
                            </th>
                            <th scope="col" style="text-align:center;"><i class="fa-solid fa-credit-card me-1"></i>
                                Method</th>
                            <th scope="col" style="text-align:center;"><i class="fa-solid fa-barcode me-1"></i> Status
                            </th>
                            <th scope="col" style="text-align:center;"><i class="fa-solid fa-sterling-sign me-1"></i>
                                Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $transaction)
                        <tr>
                            <th scope="row" style="text-align:center;"><i class="fa-solid fa-hashtag"></i> {{
                                $transaction->id }}</th>
                            <td style="text-align:center;"><i class="fa-solid fa-calendar me-1"></i> {{
                                $transaction->created_at->format('M d, Y') }}</td>
                            <td style="text-align:center;"><i class="fa-brands fa-paypal me-1"></i> PayPal</td>
                            <td style="text-align:center;"><i class="fa-solid fa-circle-check me-1"
                                    style="color: #259929;"></i> {{
                                ucfirst(strtolower($transaction->status)) }}</td>
                            <td style="text-align:center;font-weight: 700;">&pound;{{
                                number_format($transaction->amount, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-3">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> No transactions found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($totalPages > 1)
    <div class="custom-pagination mb-4">
        {{-- Previous Page Link --}}
        <button class="page-btn {{ $currentPage == 1 ? 'disabled' : '' }}"
            wire:click="$set('page', {{ $currentPage - 1 }})" @disabled($currentPage==1)>
            <i class="fa-solid fa-angles-left"></i>
        </button>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $totalPages; $i++) <button class="page-btn {{ $currentPage == $i ? 'active' : '' }}"
            wire:click="$set('page', {{ $i }})">
            {{ $i }}
            </button>
            @endfor

            {{-- Next Page Link --}}
            <button class="page-btn {{ $currentPage == $totalPages ? 'disabled' : '' }}"
                wire:click="$set('page', {{ $currentPage + 1 }})" @disabled($currentPage==$totalPages)>
                <i class="fa-solid fa-angles-right"></i>
            </button>
    </div>
    @endif
</div>