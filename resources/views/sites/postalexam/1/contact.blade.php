@extends('layouts.default')

@section('content')
    <?php
    $data = [
            'email' => '',
            'subject' => ''
    ];
    ?>
    <main id="content">
        <section class="row-1">
            <div class="inner clear">
                <h2>Contact Us</h2>
                <h3>Please fill out your information so that we can contact you.</h3>
                {{--<figure class="map"></figure>--}}
                <div class="container">
                    <div class="row registration-page">
                        <div class="col-md-12">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('contact-us') }}">
                                {!! csrf_field() !!}

                                <div class="row">
                                    <div class="col-md-8 fields">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Your E-Mail *:</label>

                                            <div class="col-md-6 field">
                                                <input type="email" class="form-control" name="email" value="{{ old('email')? old('email') : $data['email'] }}">
                                                <i class="help-block" style="position: relative; top: -7px;"></i>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Contact Phone:</label>

                                            <div class="col-md-6 field">
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                                <i class="help-block" style="position: relative; top: -7px;">(optional)</i>
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">Subject *:</label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="subject" value="{{ old('subject') ? old('subject') : $data['subject'] }}">



                                                @if ($errors->has('subject'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                            <br/>
                                            <label class="col-md-4 control-label">Message/Issue *:</label>

                                            <div class="col-md-6 field">
                                                <textarea name="message" class="form-control input-lg" cols="40" rows="8">{{ old('message') }}</textarea>

                                                @if ($errors->has('message'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <br/><br/><br/>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-paper-plane"></i>Send Message
                                                </button>
                                                <a href="{{ url('contact-us') }}" class="btn btn-default btn-clear">
                                                    <i class="fa fa-btn fa-eraser"></i>Clear
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection