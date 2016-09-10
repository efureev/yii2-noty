var app = app || {};

(function ($) {
    "use strict";

    var $modal = (function ($) {

        var
            doc                 = $(document),

            POSITION_TOP        = 'top',
            POSITION_BOTTON     = 'bottom',
            POSITION_CENTER     = null,

            styles              = {
                footerCls: 'iziModal-footer'
            },

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
            _contentEl,
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

            setContent     = function (content) {
                if (content) {
                    this.get().iziModal('setContent', content);
                }
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

            setEvents      = function (events) {
                for (var name in events) {
                    doc.on(name, this.get(), events[name]);
                }
                return this;
            },

            _getContentEl  = function () {
                if (_contentEl == undefined)
                    _contentEl = getEl().find('.iziModal-content');
                return _contentEl;
            },

            setFooter      = function (footerObj) {
                var footer = _getContentEl().find('> .' + styles.footerCls);

                if (!footer.length) {
                    footer = $('<div class="' + styles.footerCls + '">').css('padding', '10px 30px');

                    if (footerObj.border)
                        footer.css({'border-top': '1px solid ' + options.info.color});

                    _getContentEl().append(footer);
                }

                if (typeof (footerObj) === 'string') {
                    footer.html(footerObj);
                    return this;
                }

                if (Array.isArray(footerObj.items) && footerObj.items.length) {
                    footer.empty();
                    footerObj.items.forEach(function (b) {
                        var btn = $('<' + b.tag + '>').addClass(b.class).text(b.title);

                        if (typeof(b.onClick) === 'function') {
                            btn.click(b.onClick);
                        }

                        if (typeof(b.data) === 'object') {
                            Object.keys(b.data).forEach(function (d) {
                                btn.attr('data-' + d, b.data[d]);
                            });
                        }

                        footer.append(btn);
                    });
                } else {
                    footer.remove();
                }

                return this;
            },

            show           = function () {
                this.get().iziModal('open');
            },

            normalizeTitle = function (val) {
                if (typeof(val) === 'string') {
                    val = {
                        msg: val
                    };
                }
                return val;
            },

            configureType  = function (type, val) {
                val.title = val.title ? val.title : options[type].title;
                val.icon = val.icon ? val.icon : options[type].icon;
                val.color = val.color ? val.color : options[type].color;
                val.position = val.position ? val.position : POSITION_CENTER;

                this.custom(val);
            },

            alert          = function (val) {
                val = normalizeTitle(val);
                val.position = val.position ? val.position : POSITION_CENTER;
                this.custom(configureType('alert', val));
            },

            success        = function (val) {
                val = normalizeTitle(val);
                val.position = val.position ? val.position : POSITION_BOTTON;
                this.custom(configureType('success', val));
            },

            info           = function (val) {
                val = normalizeTitle(val);
                val.position = val.position ? val.position : POSITION_BOTTON;
                this.custom(configureType('info', val));
            },

            loading        = function (val) {
                val = normalizeTitle(val);
                val.position = val.position ? val.position : POSITION_CENTER;
                this.custom(configureType('loading', val));
            },

            custom         = function (properties) {

                if (typeof(properties) !== 'object')
                    throw new Error('value "' + properties + '" must be a Object!: {title:"' + properties + '"}');

                this
                    .setTitle(properties.title)
                    .setSubTitle(properties.msg)
                    .setIcon(properties.icon)
                    .setAttached(properties.position)
                    .setHeaderColor(properties.headerColor)
                    .setContent(properties.content)
                    .setFooter(properties.footer)

                    .setEvents(properties.events)

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
            setContent    : setContent,
            setFooter     : setFooter,
            setTitle      : setTitle,
            setSubTitle   : setSubTitle,
            setAttached   : setAttached,
            setEvents     : setEvents,
            setHeaderColor: setHeaderColor,
            show          : show
        }
    })($);
    app.modal = app.modal || $modal;
    window.app = app;
})($);