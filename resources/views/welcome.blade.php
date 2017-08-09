@extends('layouts.app')
<style>
    .circle-icon {
        background: #93af51;
        color: #fff;
        width: 100px;
        height: 100px;
        font-size: 2em !important;
        border-radius: 50%;
        text-align: center;
        line-height: 100px;
        vertical-align: middle;
        padding: 30px;
    }


    #features-container .row {
        margin: 24px 0;
        padding-bottom: 48px;
    }

    #main-features-row {
        padding: 48px;
        margin-bottom: 64px;
    }
    #header-wrap {
        background-image: url( 'https://s3.amazonaws.com/caldera-theme/images/carina-nebula.jpg' );
    }
</style>
@section('content')
<div id="header-wrap">

    <header class="container">
        <div class="jumbotron">
            <h1>Caldera Forms PDF</h1>
            <p><a href="https://calderaforms.com/">Caldera Forms</a> is a powerful and intuitive, drag and drop form builder for WordPress. Make it more awesome with Caldera Forms PDF.</p>
            <p>Caldera Forms email messages transformed into PDFs. Your site visitors want to download a PDF of their submission? We got you covered.</p>
        </div>
    </header>
</div>

<div class="container">
    <p class="alert alert-danger">
        <a href="https://calderaforms.com/pro?utm_source=caldera-space">Caldera Forms Pro</a> is here! Caldera Forms to PDF services are now offered by Caldera Forms Pro and are way better! Existing users of Caldera Forms Pro have received a special cross-grade offer.
    </p>
</div>

@endsection

