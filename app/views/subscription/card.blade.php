@extends('template.default')

@section('content')
    <form action="{{ URL::action('subscription-card') }}" method="post" id="subscription-form">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">

                @include('subscription.partials._card')

                <button class="btn btn-primary">Update Card</button>

            </div>
        </div>

        {{ Form::token() }}
    </form>
@stop

@section('scripts')
    <script src="https://js.stripe.com/v2"></script>
    <script src="{{ asset('js/stripe.js') }}"></script>
@stop