<?php
use Collective\Html\HtmlFacade as HTML;
use \Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Management Links</div>

                <div class="panel-body" id="subscriptions-panel">


                    <div class="row">

                        <div class=" col-sm-12">
                            <ul>
                                <li>
                                    <a href="{{ url( 'manage/users') }}">
                                        Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url( 'manage/subscriptions') }}">
                                        Subscriptions
                                    </a>
                                </li>
                                <li>
                                    You can use <em>caldera.space/manage/switch/{user-id}</em> to switch to a user and <em>caldera.space/manage/switch/stop</em> to switch back.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection