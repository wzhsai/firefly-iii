<div class="list-group">
@foreach($transactions as $journal)
<a class="list-group-item" title="{{$journal->date->format('jS M Y')}}" href="{{route('transactions.show',$journal->id)}}">

    @if(is_null($journal->type))
        @if($journal->transactiontype->type == 'Withdrawal')
            <i class="fa fa-long-arrow-left fa-fw" title="Withdrawal"></i>
        @endif
        @if($journal->transactiontype->type == 'Deposit')
            <i class="fa fa-long-arrow-right fa-fw" title="Deposit"></i>
        @endif
        @if($journal->transactiontype->type == 'Transfer')
                <i class="fa fa-fw fa-exchange" title="Transfer"></i>
        @endif
    @else
        @if($journal->type == 'Withdrawal')
            <i class="fa fa-long-arrow-left fa-fw" title="Withdrawal"></i>
        @endif
        @if($journal->type == 'Deposit')
            <i class="fa fa-long-arrow-right fa-fw" title="Deposit"></i>
        @endif
        @if($journal->type == 'Transfer')
                <i class="fa fa-fw fa-exchange" title="Transfer"></i>
        @endif
    @endif

    {{{$journal->description}}}

<span class="pull-right small">
    {!! Amount::formatJournal($journal) !!}
</span>

</a>
@endforeach
</div>
