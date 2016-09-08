var app = app || {};

(function ($) {
    "use strict";

    var $modal = (function ($) {
        var _win,
            init = function (el) {
                if (!(el instanceof iziModal))
                    throw new Error('Missing `iziModal` plugin');
                _setEl(el);
                return $modal;
            },

            getEl = function () {
                if (_win == undefined)
                    init();
                return _win;
            },

            _setEl = function (win) {
                _win = win;
            };

        return {
            init: init,
            get: getEl
        }
    })($);

    app.modal = app.modal || $modal;
    window.app = app;
})($);

