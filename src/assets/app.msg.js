var app = app || {};

(function ($) {
    "use strict";

    var $msg = (function ($) {

        var
            getCallBacks = function (callbacks) {
                return $.extend(true, $.noty.defaults.callback, callbacks);
            },

            cloneObj     = function (obj) {
                return $.extend(true, {}, obj);
            },


            info         = function (msg, callbacks) {
                if (!msg)
                    msg = $.noty.types.info.msg;

                if ($.noty.types.info.icon)
                    msg = '<i class="' + $.noty.types.info.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
                    text    : msg,
                    type    : 'information',
                    timeout : 2000,
                    buttons : false,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            alert        = function (msg, callbacks) {
                if (!msg)
                    msg = $.noty.types.alert.msg;

                if ($.noty.types.alert.icon)
                    msg = '<i class="' + $.noty.types.alert.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
                    text    : msg,
                    type    : 'alert',
                    timeout : 2000,
                    buttons : false,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            success      = function (msg, callbacks) {
                if (!msg)
                    msg = $.noty.types.success.msg;

                if ($.noty.types.success.icon)
                    msg = '<i class="' + $.noty.types.success.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
                    text    : msg,
                    type    : 'success',
                    timeout : 2000,
                    buttons : false,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            warning      = function (msg, callbacks) {
                if (!msg)
                    msg = $.noty.types.warning.msg;

                if ($.noty.types.warning.icon)
                    msg = '<i class="' + $.noty.types.warning.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
                    text    : msg,
                    type    : 'warning',
                    timeout : 5000,
                    buttons : false,
                    callback: getCallBacks(callbacks)
                });
                noty(opts);
            },

            error        = function (msg, callbacks) {
                if (!msg)
                    msg = $.noty.types.error.msg;

                if ($.noty.types.error.icon)
                    msg = '<i class="' + $.noty.types.error.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
                    text    : msg,
                    type    : 'error',
                    force   : true,
                    // buttons : false,
                    callback: getCallBacks(callbacks)
                });

                noty(opts);
            },

            confirm      = function (msg, onOkFn, onCancelFn, callbacks) {
                if (!msg)
                    msg = $.noty.types.confirm.msg;

                if ($.noty.types.confirm.icon)
                    msg = '<i class="' + $.noty.types.confirm.icon + '"></i> ' + msg;

                var opts = $.extend(true, cloneObj($.noty.appOptions), {
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
            },

            flash        = function (elementId, options) {
                var opts = $.extend(true, cloneObj($.noty.appOptions), options);

                if (opts.icon) {
                    opts.template = opts.template.replace('{{%icon}}', opts.icon);
                }

                return noty(opts);
            };

        return {
            alert  : alert,
            error  : error,
            info   : info,
            success: success,
            warning: warning,
            confirm: confirm,
            flash  : flash
        }
    })($);

    app.msg = $.extend(true, app.msg || {}, $msg);
    window.app = app;
})($);