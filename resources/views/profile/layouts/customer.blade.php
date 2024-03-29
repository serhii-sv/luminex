<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    @include('partials.stylesheet')
  </head>
  <body class="body__lk">
    @include('partials.loader')
    @include('layouts.logout')
    <div class="wrapper">
      <div class="page-content">
        @include('layouts.admin_edit_lang')
        @include('profile.layouts.header')
        <main class="lk page" role="main">
          @include('profile.layouts.navigation')
          <div class="lk__content">
            
            @yield('content')
          </div>
        </main>
      </div>
      @include('profile.layouts.footer')
    </div>
    
    @include('modals.contact')
    @include('modals.call')
    
    @include('partials.jscripts')
    @stack('scripts')
    @stack('load-scripts')
    @if(canEditLang() && checkRequestOnEdit())
      <script>
        $(document).ready(function () {
          class Request {
            constructor() {
              this.protocol = '';
              this.domain = '';
              this.params = {};
            
            }
          
            postJsonRequestAjax(url, method, data, callbackSuccess, callbackFail, callbackBefore, callbackAfter) {
              callbackSuccess = callbackSuccess || function () {
              };
              callbackFail = callbackFail || function () {
              };
              callbackBefore = callbackBefore || function () {
              };
              callbackAfter = callbackAfter || function () {
              };
              method = method || 'POST';
              data = data || {};
              url = url || '';
            
              callbackBefore({}, data);
            
              $.ajax({
                type: method,
                url: url,
                data: data,
                headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                  if (data.error) {
                    callbackFail({}, data);
                    callbackAfter({}, data);
                    return;
                  }
                  callbackSuccess(data.data, data);
                  callbackAfter({}, data);
                },
                error: function (data) {
                  callbackFail({}, data);
                  callbackAfter({}, data);
                }
              });
            }
          
            queryAjax(url, data, success, fail, before, after) {
              data = data || {};
              this.postJsonRequestAjax(
                  url,
                  'POST',
                  this.objectMerge(data, this.params),
                  success,
                  fail,
                  before,
                  after
              );
            }
          
            objectMerge(a, b) {
              return Object.assign(a, b);
            }
          
            messageSuccess(mes, data) {
              return {
                error: false,
                message: mes,
                data: data || {}
              };
            }
          
            messageError(mes, data) {
              return {
                error: true,
                message: mes,
                data: data || {}
              };
            }
          }
        
          $('editor_block')
          .prop('contentEditable', true)
          .focusin(function () {
            let $this = $(this);
          })
          .focusout(function (e) {
            let $this = $(this);
          
            (new Request()).queryAjax('{{ route('ajax.change.lang') }}', {
                  name: $this.attr('data-name'),
                  text: $this.text()
                }, function (data, dataRaw) {
                  console.log('Сохранено!');
                }, function () {
                
                },
                function () {
                  console.log('Сохранение');
                }
            );
          });
        
        });
      </script>
    @endif
  </body>
</html>
