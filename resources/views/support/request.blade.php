<?php
use Collective\Html\FormFacade as Form;

use Collective\Html\HtmlFacade as HTML;
?>

@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::open(['url' => 'support/send']) !!}
            <div class="container" style="margin-top: 100px; padding: 40px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Open A Support Ticket</div>

                    <div class="panel-body">
                        <div class="row">
                            <p>
                                Please use this form for Caldera Forms PDF support only. If you need support for Caldera Forms or a Caldera Forms add-on, please use <a href="https://CalderaWP.com/support">CalderaWP.com/support</a>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="name">
                                    Your Name
                                </label>
                                <input type="text" id="name" name="name" value="{{ $name }}" class="form-control" />
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="email">
                                    Email
                                </label>
                                <input type="text" id="email" name="email" value="{{ $email }}" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12"> <label for="message">Your Message</label>
                            <textarea id="message"  class="form-control" name="message">

                            </textarea></div>
                        </div>
                        <div class="row">
                           <input type="submit" value="Send" class="btn-primary btn-orange col-sm-12" />
                        </div>
                    </div>
                </div>


            </div>

        {!! Form::close() !!}

    </div>
@endsection