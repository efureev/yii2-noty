var app = app || {};

(function ($) {
    "use strict";

    var $msg = (function ($) {

        var
            getCallBacks = function (callbacks) {
                return $.extend(true, $.noty.defaults.callback, callbacks);
            },

            info         = function (msg, callbacks) {
                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'information',
                    timeout : 2000,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            alert        = function (msg, callbacks) {
                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'alert',
                    timeout : 2000,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            success      = function (msg, callbacks) {
                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'success',
                    timeout : 2000,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            warning      = function (msg, callbacks) {
                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'warning',
                    timeout : 5000,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            error        = function (msg, callbacks) {

                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'error',
                    force   : true,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            confirm      = function (msg, onOkFn, onCancelFn, callbacks) {
                var opts = $.extend(true, $.noty.appOptions, {
                    text    : msg,
                    type    : 'confirm',
                    force   : true,
                    callback: getCallBacks(callbacks),
                    buttons : [{
                        addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                            // this = button element
                            // $noty = $noty element
                            $noty.close();
                            if (typeof (onOkFn) === 'function') {
                                onOkFn($noty, this);
                            }
                        }
                    }, {
                        addClass: 'btn btn-danger', text: 'Cancel', onClick: function ($noty) {
                            $noty.close();

                            if (typeof (onCancelFn) === 'function') {
                                onCancelFn($noty, this);
                            }
                        }
                    }]
                });
                noty(opts);
            };

        return {
            alert  : alert,
            error  : error,
            info   : info,
            success: success,
            warning: warning,
            confirm: confirm
        }
    })($);
    app.msg = app.msg || $msg;
    window.app = app;
})($);