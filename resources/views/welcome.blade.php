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
</style>
@section('content')
    <div style="width:100%" id="banner">
        <img src="//d1dy2qw4671tuy.cloudfront.net/images/space-banner.png" alt="caldera-space-banner" style="width: 100%;height: auto;"/>
    </div>
    <div class="container">

            <span class="symbol">
                <img src="//d1dy2qw4671tuy.cloudfront.net/images/caldera-globe-logo-sm.png" alt="Caldera Labs Globe Logo" style="
    width: 48px;
    height: 48px;
    margin-top: 16px;
    margin-right: 12px;
"/>
            </span>
            <span class="title" style="display: inline-block">
                <h1>Caldera Forms PDF</h1>
            </span>



    </div>
    <div class="container">
        <div class="jumbotron">
            <h2>Your Form Submissions Capture As PDFs</h2>
            <p><a href="https://calderawp.com/caldera-forms">Caldera Forms</a> is a powerful and intuitive, drag and drop form builder for WordPress. Make it more awesome with Caldera Forms PDF.</p>
            <p>Caldera Forms email messages transformed into PDFs. Your site visitors want to download a PDF of their submission? We got you covered.</p>
        </div>
        <div class="jumbotron jumbotron-alt">
            <h2>No Drain On Your Server</h2>
            <p>Generating PDFs is a memory-intensive process. With Caldera Forms PDF, the PDF is generated in space (or the cloud) with no hit on your server.</p>
        </div>
        <div class="jumbotron">
            <h2>Custom Styles and Templates</h2>
            <em>Coming soon!</em>
            <p>Add cuist</p>
        </div>
    </div>

    <div class="container" id="features-container">
        <div class="row" id="main-features-row">
            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-envelope circle-icon" aria-hidden="true"></i>
                </p>

                <h2>Download</h2>
                <p>Add a link to download form submission as a PDF</p>
            </div>
            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-envelope circle-icon" aria-hidden="true"></i>
                </p>

                <h2>Attach</h2>
                <p>Attach the submission PDF to Caldera Forms email.</p>
                <em>Coming soon</em>
            </div>
            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-print circle-icon" aria-hidden="true"></i>
                </p>

                <h2>Print</h2>
                <p>Print-friendly downloads of your forms.</p>
                <em>Coming soon</em>
            </div>
        </div>
        <div class="row" id="secondary-features-row">

            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-cloud circle-icon" aria-hidden="true"></i>
                </p>

                <h2>No Memory Drain</h2>
                <p>PDF generating is memory intensive. Our cloud service doesn't consume resources on your servers.</p>
            </div>
            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-css3 circle-icon" aria-hidden="true"></i>
                </p>

                <h2>Custom Templates</h2>
                <p>Make your PDFs stylish with custom templates.</p>
                <em>Coming soon</em>
            </div>
            <div class="col-md-4 col-sm-12">
                <p class="center-block text-center">
                    <i class="fa fa-print circle-icon" aria-hidden="true"></i>
                </p>

                <h2>Print</h2>
                <p>Print-friendly downloads of your forms.</p>
                <em>Coming soon</em>
            </div>

        </div>
    </div>
    <style>
        .panel.price,
        .panel.price>.panel-heading{
            border-radius:0px;
            -moz-transition: all .3s ease;
            -o-transition:  all .3s ease;
            -webkit-transition:  all .3s ease;
        }
        .panel.price:hover{
            box-shadow: 0px 0px 30px rgba(0,0,0, .2);
        }
        .panel.price:hover>.panel-heading{
            box-shadow: 0px 0px 30px rgba(0,0,0, .2) inset;
        }
        .panel.price>.panel-heading{
            box-shadow: 0px 5px 0px rgba(50,50,50, .2) inset;
            text-shadow:0px 3px 0px rgba(50,50,50, .6);
        }
        .price .list-group-item{
            border-bottom-:1px solid rgba(250,250,250, .5);
            font-weight:600;
            text-shadow: 0px 1px 0px rgba(250,250,250, .75);
        }
        .panel.price .list-group-item:last-child {
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .panel.price .list-group-item:first-child {
            border-top-right-radius: 0px;
            border-top-left-radius: 0px;
        }
        .price .panel-footer {
            color: #fff;
            border-bottom:0px;
            background-color:  rgba(0,0,0, .1);
            box-shadow: 0px 3px 0px rgba(0,0,0, .3);
        }
        .panel.price .btn{
            background-color:#7e943d;
            box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
            border:0px;
        }
        .panel.price .btn:hover{
            background-color:#ff7e30;
            box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
            border:0px;
        }
        /* green panel */
        .price.panel-green>.panel-heading {
            color: #fff;
            background-color: #a3bf61;
            border-color: #a3bf61;
            border-bottom: 1px solid #a3bf61;
        }
        .price.panel-green>.panel-body {
            color: #fff;
            background-color: #a3bf61;
        }
        .price.panel-green>.panel-body .lead{
            text-shadow: 0px 3px 0px rgba(50,50,50, .3);
        }
        .panel.price.panel-green .btn {
            background-color: #a3bf61;
        }
        .panel.price.panel-green .btn:hover {
            background-color: #ff7e30;
        }
        /* orange price */
        .price.panel-orange>.panel-heading {
            color: #fff;
            background-color: #ff7e30;
            border-color: #fff;
            border-bottom: 1px solid #000;
        }
        .price.panel-orange>.panel-body {
            color: #fff;
            background-color: #ff7e30;
        }
        .price.panel-orange>.panel-body .lead{
            text-shadow: 0px 3px 0px rgba(50,50,50, .3);
        }
        .price.panel-orange .list-group-item {
            color: #000;
            background-color: rgba(50,50,50, .01);
            font-weight:600;
            text-shadow: 0px 1px 0px rgba(250,250,250, .75);
        }
        .panel.price.panel-orange .btn {
            background-color: #ff7e30;
        }
        .panel.price.panel-orange .btn:hover {
            background-color: #a3bf61;
        }
        /* grey price */
        .price.panel-grey>.panel-heading {
            color: #fff;
            background-color: #6D6D6D;
            border-color: #B7B7B7;
            border-bottom: 1px solid #B7B7B7;
        }
        .price.panel-grey>.panel-body {
            color: #fff;
            background-color: #808080;
        }
        .price.panel-grey>.panel-body .lead{
            text-shadow: 0px 3px 0px rgba(50,50,50, .3);
        }
        .panel.price.panel-grey .btn {
            background-color: #cfcfcf;
        }
        .panel.price.panel-grey .btn:hover {
            background-color: #a3bf61;
        }
        #prices-options-row p.text-center {
            margin-top: 12px;
        }
        button.cf-bundle-modal-open {
            background-color: initial;
            color: #7e943d;
        }
        button.cf-bundle-modal-open:hover {
            color: #4b4b4b ;
        }
    </style>
    <div class="container">

            <h2 id="pricing">Pricing</h2>
            <div class="row" id="pricing-table-row">
                <div class="col-sm-12 col-md-6">
                    <div class="panel price panel-green">
                        <div class="panel-heading arrow_box text-center">
                            <h3>
                                Small Plan
                            </h3>
                            <div class="panel-body text-center">
                                <p itemprop="price" class="lead" style="font-size:40px"><strong>
                                        $5/month
                                    </strong></p>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><i class="icon-ok text-success"></i>Up To 1,000 PDFs A Month</li>
                        </ul>
                        <div class="panel-footer">
                            <a href="/subscription/join" class="btn" style="width: 100%">Sign Up</a>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="panel price panel-orange">
                        <div class="panel-heading arrow_box text-center">
                            <h3>
                                Big Plan
                            </h3>
                            <div class="panel-body text-center">
                                <p itemprop="price" class="lead" style="font-size:40px"><strong>
                                        $10/month
                                    </strong></p>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><i class="icon-ok text-success"></i>Up To 5,000 PDFs A Month</li>
                        </ul>
                        <div class="panel-footer">
                            <a href="/subscription/join" class="btn" style="width: 100%">Sign Up</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row"><div class="col-sm-12 col-md-6 col-md-offset-4 col-md-6"><ul class="list-inline ">
                <li><a class="btn btn-block" href="{{ url('/login') }}">Login</a></li>
                <li><a class="btn btn-block" href="{{ url('/register') }}">Register</a></li>
            </ul></div></div>

    </div>
    <div class="container" id="faq-container">
        <h2>FAQ</h2>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="faq-q">
                    <h5>Is This A WordPress Plugin?</h5>
                    <p>Caldera Forms PDF is a service. It requires <a href="https://calderawp.com/caldera-forms?utm_source=caldera-space&utm_medium=landing-page&utm_campaign=pdf">Caldera Forms</a>, and the <a href="https://github.com/CalderaWP/cf-pdf">Caldera Forms PDF client plugin</a>. Both are free.</p>
                </div>
                <div class="faq-q">
                    <h5>Why Caldera Space?</h5>
                    <p>This is the Caldera cloud, but in space... We thought it was funny.</p>
                </div>
                <div class="faq-q">
                    <h5>Can I Create Custom Templates</h5>
                    <p>Soon...</p>
                </div>

            </div>

            <div class="col-sm-12 col-md-6">
                <div class="faq-q">
                    <h5>How Does Pricing Work?</h5>
                    <p>Every time a PDF is generated, that counts as one PDF. The same PDF can be downloaded an unlimited time within the same 5 day period. After 5 days the PDF file is cleared, and a new one must be generated.</p>
                </div>
                <div class="faq-q">
                    <h5>Who Makes Caldera Forms PDF?</h5>
                    <p>Caldera Forms PDF is a product of <a href="http://calderalabs.org.com?utm_source=caldera-space&utm_medium=landing-page&utm_campaign=pdf">Caldera Labs</a> the makers of Caldera Forms.
                </div>
                <div class="faq-q">
                    <h5>Can I Run This On My Own Server?</h5>
                    <p>Yes. The PDF app is open-source Laravel app, licensed under the terms of the GNU AGPL. If you would like help setting up your own server, <a href="https://calderawp.com/caldera-space?utm_source=caldera-space&utm_medium=landing-page&utm_campaign=pdf">contact us.</a></p>
                </div>
            </div>

        </div>
    </div>


@endsection

