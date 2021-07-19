@extends('profile.layouts.customer')
@section('title', __('Dashboard'))
@section('content')
  
  <section class="lk-section">
    <div class="referral-link">
      <div class="referral-link__col">
        <h3 class="title">@if(canEditLang() && checkRequestOnEdit())
            <editor_block data-name='Your referral link' contenteditable="true">{{ __('Your referral link') }}</editor_block>
          @else
            {{ __('Your referral link') }}
          @endif
        </h3>
        <div class="input-row">
          <input class="input-row__input input input--accent2" id="refLink" value="{{ getUserReferralLink() }}" type="text" />
        </div>
      </div>
      <div class="referral-link__col">
        <h3 class="title">{{ __('Your upliner') }}
        </h3>
        <div class="input-row">
          <input class="input-row__input input input--accent2" value="{{ !empty(getPartnerArray()) ? (getPartnerArray()['phone'] ?? getPartnerArray()['email']) ?? 'undefined' : __('you don\'t have upliner') }}" type="text" />
        </div>
      </div>
    </div>
    
    <div class="info-section">
      <div class="info-section__item">
        <div class="info-card info-card--light-blue">
          <p class="info-card__title">@if(canEditLang() && checkRequestOnEdit())
              <editor_block data-name='Balance' contenteditable="true">{{ __('Balance') }}</editor_block>
            @else
              {{ __('Balance') }}
            @endif</p>
          <ul class="info-card__list">
            @foreach(getUserBalancesByCurrency(false) as $symbol => $balance)
              <li class="info-card__count">
                <span><span class="info-card__icon">{{ $symbol }}</span>{{ number_format($balance, 8) }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="info-section__item">
        <div class="info-card info-card--light-blue">
          <p class="info-card__title">@if(canEditLang() && checkRequestOnEdit())
              <editor_block data-name='Invested' contenteditable="true">{{ __('Invested') }}</editor_block>
            @else
              {{ __('Invested') }}
            @endif</p>
          <ul class="info-card__list">
            @foreach(getTotalDeposited(false) as $symbol => $balance)
              <li class="info-card__count">
                <span><span class="info-card__icon">{{ $symbol }}</span>{{ number_format($balance, 8) }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="info-section__item">
        <div class="info-card info-card--blue">
          <p class="info-card__title">@if(canEditLang() && checkRequestOnEdit())
              <editor_block data-name='Withdrawn' contenteditable="true">{{ __('Withdrawn') }}</editor_block>
            @else
              {{ __('Withdrawn') }}
            @endif
          </p>
          <ul class="info-card__list">
            @foreach(getUserTotalWithdrawn(false) as $symbol => $amount)
              <li class="info-card__count">
                <span><span class="info-card__icon">{{ $symbol }}</span>{{ number_format($amount, 8)  }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="info-section__item">
        <div class="info-card info-card--dark-blue">
          <p class="info-card__title">@if(canEditLang() && checkRequestOnEdit())
              <editor_block data-name='Earned' contenteditable="true">{{ __('Earned') }}</editor_block>
            @else
              {{ __('Earned') }}
            @endif
          </p>
          <ul class="info-card__list">
            @foreach(getUserTotalEarned(false) as $symbol => $amount)
              <li class="info-card__count">
                <span><span class="info-card__icon">{{ $symbol }}</span>{{ number_format($amount, 8) }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="info-section__item"><img src="/img/refferal.png" alt="">
      </div>
    </div>
  </section>
  <section class="lk-section">
    <h3 class="title">@if(canEditLang() && checkRequestOnEdit())
        <editor_block data-name='Deposits list' contenteditable="true">{{ __('Deposits list') }}</editor_block>
      @else
        {{ __('Deposits list') }}
      @endif
    </h3>
    <table id="deposits-table" style="width:100%;">
      <thead>
        <tr>
          <th>{{ __('Currency') }}</th>
          <th>{{ __('Rate') }}</th>
          <th>{{ __('Earnings') }}</th>
          <th>{{ __('Invested') }}</th>
          <th>{{ __('Status') }}</th>
          <th>{{ __('Closing') }}</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </section>
  <section class="lk-section">
    <h3 class="title">@if(canEditLang() && checkRequestOnEdit())
        <editor_block data-name='Operations list' contenteditable="true">{{ __('Operations list') }}</editor_block>
      @else
        {{ __('Operations list') }}
      @endif
    </h3>
    <table id="operations-table" style="width:100%;">
      <thead>
        <tr>
          <th>{{ __('Amount') }}</th>
          <th>{{ __('Currency') }}</th>
          <th>{{ __('Type') }}</th>
          <th>{{ __('Approved') }}</th>
          <th>{{ __('Batch ID') }}</th>
          <th>{{ __('Date') }}</th>
        </tr>
      </thead>
    </table>
  </section>
  
  <script>document.getElementById("profileProfilePageMenuItem").className = "navigation-icons__link navigation-icons__link--active";</script>

@endsection

@push('load-scripts')
  <script>
    //initialize basic datatable
    jQuery('#deposits-table').width('100%').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [[5, "desc"]],
      "ajax": '{{route('profile.deposits.dataTable')}}',
      "columns": [
        {"data": "currency.name"},
        {"data": "rate.name"},
        {
          "data": 'daily',
          "orderable": false,
          "searchable": false,
          "render": function (data, type, row, meta) {
            return row['daily'] + '% {{ __('per day') }}';
          }
        },
        {
          "data": 'invested',
          "orderable": false,
          "searchable": false,
          "render": function (data, type, row, meta) {
            return row['invested'] + row['currency']['symbol'];
          }
        },
        {
          "data": 'active',
          "orderable": false,
          "searchable": false,
          "render": function (data, type, row, meta) {
            return row['active'] == 1 ? '{{ __('active') }}' : '{{ __('closed') }}';
          }
        },
        {"data": "closing_at"},
        {
          "data": "weblink",
          "render": function (data, type, row, meta) {
            return '<a href="/deposits/' + row['id'] + '/reinvest">Реинвестировать</a>';
          }
        }
      ],
    });
    //*initialize basic datatable
  </script>
@endpush

@push('load-scripts')
  <script>
    //initialize basic datatable
    jQuery('#operations-table').width('100%').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [[4, "desc"]],
      "ajax": '{{route('profile.operations.dataTable')}}',
      "columns": [
        {
          "data": 'amount',
          "orderable": true,
          "searchable": true,
          "render": function (data, type, row, meta) {
            return row['amount'] + row['currency']['symbol'];
          }
        },
        {"data": "currency.name"},
        {"data": "type_name"},
        {
          "data": "approved", "render": function (data, type, row, meta) {
            if (row['approved'] == 1) {
              return '{{ __('yes') }}';
            }
            return '{{ __('no') }}';
          }
        },
        {"data": "batch_id"},
        {"data": "created_at"},
      ],
    });
    //*initialize basic datatable
  </script>
  
  <script>
    $(document).ready(function () {
      $('#refLink').click(function (obj) {
        copyToClipboard('refLink');
      });
      
      function copyToClipboard(elementId) {
        // Create a "hidden" input
        var aux = document.createElement("input");
        
        // Assign it the value of the specified element
        aux.setAttribute("value", document.getElementById(elementId).value);
        
        // Append it to the body
        document.body.appendChild(aux);
        
        // Highlight its content
        aux.select();
        
        // Copy the highlighted text
        document.execCommand("copy");
        
        // Remove it from the body
        document.body.removeChild(aux);
        
        alert('Скопировано');
      }
    });
  </script>
@endpush
