var app = app || {};

(function ($) {
    "use strict";

    var $modal = (function ($) {

        var
            POSITION_TOP        = 'top',
            POSITION_BOTTON     = 'bottom',
            POSITION_CENTER     = null,

            defaultTypesOptions = {
                alert: {
                    title   : 'Alert',
                    icon    : 'fa fa-exclamation-triangle',
                    color   : 'rgb(189, 91, 91)',
                    position: POSITION_CENTER
                },

                info: {
                    title   : 'Information',
                    icon    : 'fa fa-info',
                    color   : 'rgb(136, 160, 185)',
                    position: POSITION_BOTTON
                },

                success: {
                    title   : 'Success',
                    icon    : 'fa fa-check',
                    color   : 'rgb(0, 175, 102)',
                    position: POSITION_BOTTON
                },

                loading: {
                    title   : 'Loading',
                    icon    : 'fa fa-refresh fa-spin',
                    color   : 'rgb(136, 160, 185)',
                    position: POSITION_BOTTON
                }
            };

        var _win,
            options        = {},
            init           = function (el, opts) {
                el = $('#' + el);

                if (!el.length)
                    throw new Error('Missing `element` for modal window');

                if (!el.hasClass('iziModal'))
                    throw new Error('Missing `iziModal` plugin');

                options = $.extend(true, defaultTypesOptions, opts.typesOptions);

                _setEl(el);
                return $modal;
            },

            getEl          = function () {
                if (_win == undefined)
                    init();
                return _win;
            },

            _setEl         = function (win) {
                _win = win;
            },

            setTitle       = function (title) {
                if (title)
                    this.get().iziModal('setTitle', title);
                return this;
            },

            setSubTitle    = function (title) {
                if (title)
                    this.get().iziModal('setSubtitle', title);
                return this;
            },

            setIcon        = function (icon) {
                if (!icon)
                    icon = null;
                this.get().iziModal('setIcon', icon);
                return this;
            },

            setHeaderColor = function (color) {
                if (!color)
                    color = options.info.color;
                this.get().iziModal('setHeaderColor', color);
                return this;
            },

            setAttached    = function (position) {
                if (position !== POSITION_TOP && position !== POSITION_BOTTON && position !== POSITION_CENTER)
                    position = POSITION_CENTER;

                if (position === POSITION_TOP || position === POSITION_BOTTON || position === POSITION_CENTER)
                    this.get().iziModal('setAttached', position);

                return this;
            },

            show           = function () {
                this.get().iziModal('open');
            },

            alert          = function (msg, title) {
                this.custom(title ? title : options.alert.title, msg, options.alert.icon, POSITION_CENTER, options.alert.color)
            },

            success        = function (msg, title) {
                this.custom(title ? title : options.success.title, msg, options.success.icon, POSITION_BOTTON, options.success.color)
            },

            info           = function (msg, title) {
                this.custom(title ? title : options.info.title, msg, options.info.icon, POSITION_BOTTON, options.info.color)
            },

            loading        = function (msg, title) {
                this.custom(title ? title : options.loading.title, msg, options.loading.icon, POSITION_CENTER, options.loading.color)
            },

            custom         = function (title, msg, icon, position, headerColor) {
                this
                    .setTitle(title)
                    .setSubTitle(msg)
                    .setIcon(icon)
                    .setAttached(position)
                    .setHeaderColor(headerColor)
                    .show();
            };

        return {
            init          : init,
            get           : getEl,
            alert         : alert,
            info          : info,
            success       : success,
            loading       : loading,
            custom        : custom,
            setIcon       : setIcon,
            setTitle      : setTitle,
            setSubTitle   : setSubTitle,
            setAttached   : setAttached,
            setHeaderColor: setHeaderColor,
            show          : show
        }
    })($);
    app.modal = app.modal || $modal;
    window.app = app;
})($);