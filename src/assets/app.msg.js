var app = app || {};

(function ($) {
    "use strict";

    var $msg = (function ($) {

        var
            alert = function (msg) {
                var opts = $.extend(true, notyOpts, {
                    text   : msg,
                    type   : 'alert',
                    theme  : 'relax',
                    timeout: 2000,
                    force  : true

                });
                noty(opts);
            };

        return {
            alert: alert
        }
    })($);
    app.msg = app.msg || $msg;
    window.app = app;
})($);