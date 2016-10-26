<?php
use Collective\Html\HtmlFacade as HTML;
use \Illuminate\Support\Facades\Input;
?>
@extends('layouts.app')

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
                            <p style="margin-top:48px"> You can use <em>caldera.space/manage/switch/{user-id}</em> to switch to a user and <em>caldera.space/manage/switch/stop</em>
                                to switch back.
                            </p>
                            @if (count( $users) > 0)


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Registered</th>

                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->created_at }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

@endsection