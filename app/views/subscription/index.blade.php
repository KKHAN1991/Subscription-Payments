@extends('template.default')

@section('content')
    @if($user->subscribed())
        <p>You are subscribed. Thanks!</p>

        @if($user->cancelled())
            <p>Your subscription will end on {{$user->subscription_ends_at->format('D d M Y')}}</p>
        @endif

        <ul>
            @if(!$user->cancelled())
                <li><a href="{{URL::route('subscription-cancel')}}?_token={{ csrf_token() }}">Cancel my subscription</a></li>
            @else
                <li><a href="{{URL::route('subscription-resume')}}?_token={{ csrf_token() }}">Resume Subscription</a></li>
            @endif
                @if($user->subscribed())

                    <li><a href="{{ URL::route('subscription-card') }}">Update Card</a></li>

                @endif
        </ul>

    @else
        <p>Looks Like you're not subscribed.
            <a href="{{ URL::action('subscription-join') }}">Join Now!</a>
        </p>
    @endif
@stop