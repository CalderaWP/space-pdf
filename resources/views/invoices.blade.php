<?php
use Collective\Html\HtmlFacade as HTML;
use \Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')
<style>
    a#braintree-paypal-button {margin-top: 48px;}
</style>
@section('content')
    <div class="container">
        @if( Input::get( 'message' ) )
            @if( Input::get( 'success', false ) )
                <div class="alert alert-success">
                    @else
                <div class="alert alert-danger">
                    @endif
                    <?php echo urldecode(  Input::get( 'message' ) ); ?>
                </div>
        @endif



        <div class="row">

            <div class=" col-sm-12">
                @forelse ($invoices as $invoice)

                @empty
                    <p>No invoices found</p>
                @endforelse
            </div>
        </div>

@endsection