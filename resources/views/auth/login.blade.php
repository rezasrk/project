<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>{{ trans('title.login-title') }}</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>{{config('app.name')}}</b>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form class="login-form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="control-label">{{ trans('validation.attributes.email') }}</label>
                    <input class="form-control text-left" type="text" name="email" autofocus autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('validation.attributes.password') }}</label>
                    <input class="form-control text-left" type="password" name="password" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('validation.attributes.project_id') }}</label>
                    <select class="form-control text-left" type="password" name="project_id" autocomplete="off">
                        <option value>انتخاب نمایید...</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ trans('validation.attributes.captcha') }}</label>
                    <i class="fa fa-refresh text-danger" onclick="refreshCaptcha()"></i>
                    <input type="text" name="captcha" autocomplete="off" class="form-control text-left">
                    <div class="captcha mt-1">
                        {!! captcha_img() !!}
                    </div>

                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="rememberme"><span
                                    class="label-text">{{ trans('validation.attributes.rememberme') }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block request-ajax-form login"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>{{ trans('button.login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
