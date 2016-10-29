<?php
use ConsoleTVs\Charts\Charts as Charts;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Charts</title>

    {!! Charts::assets() !!}

</head>
<body>
<div class="container">
    @foreach ( $charts  as $chart )
        <div class="row" style="border: 1px #D1D1D1 solid; margin: 12px 0;">  {!! $chart->render() !!}</div>
    @endforeach

</div>
</body>
</html>