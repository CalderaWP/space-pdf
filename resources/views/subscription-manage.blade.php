<?php
use Collective\Html\HtmlFacade as HTML;
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscriptions</div>

                    <div class="panel-body" id="subscriptions-panel">
                        @if ( empty( $subscriptions ) )
                            <p>You do not have an active subscription.</p>
                            {{ HTML::link('/subscription/join', 'Create New Subscription', array('id' => 'space-pdf-sign-up', 'class' => 'btn btn-primary btn-orange'))}}
                        @else
                            <h3>Current Subscription</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    Created
                                </div>
                                <div class="col-sm-4">
                                    Usage
                                </div>
                                <div class="col-sm-4">
                                    Manage
                                </div>
                            </div>
                                @foreach( $subscriptions as $subscription )
                                    <div class="row">
                                        <div class="col-sm-4">
                                            {{ Carbon\Carbon::parse($subscription->created_at)->format('m/d/Y') }}
                                        </div>
                                        <div class="col-sm-4">
                                            Usage
                                        </div>
                                        <div class="col-sm-4">
                                            {{ HTML::link('/subscription/cancel', 'Cancel', array('id' => 'space-pdf-cancel', 'class' => 'btn btn-secondary'))}}
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-sm-12">
                                        Code: <pre style="text-align: center">{{ $code }}</pre>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="https://wordpress.org/plugins/caldera-forms-pdf">
                                                    <i class="fa fa-wordpress" aria-hidden="true"></i>Client Plugin
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://calderaforms.com/doc/caldera-forms-pdf-getting-started/">
                                                    <i class="fa fa-book" aria-hidden="true"></i>Documentation
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url( '/subscription/invoices') }}">
                                                    <i class="fa fa fa-envelope-open-o" aria-hidden="true"></i>Invoices
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection