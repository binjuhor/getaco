$.fn.dropdownMenu = function(opt) {
    return $(this).each(function() {
        var el = $(this),
            optsDefault = {
                menuClass: 'dropdown-menu-list',
                breakpoint: 1000,
                toggleClass: 'active',
                classButtonToggle: 'toggle-menu',
                subMenu: {
                    class: 'sub-menu',
                    parentClass: 'menu-item-has-children',
                    toggleClass: 'active'
                }
            },
            options = $.extend({}, optsDefault, opt);
        el.on('dropdownMenu', function() {
            $('.' + options.classButtonToggle, el).on('click', function(e) {
                e.stopPropagation();
                $('.' + options.menuClass, el).toggleClass(options.toggleClass);
            });
            $('.' + options.subMenu.parentClass, el).on('click', '> a', function(e) {
                e.preventDefault();
                var self = $(this);
                self.next('.' + options.subMenu.class).slideToggle(400);
                self.parent().toggleClass(options.subMenu.toggleClass);
            });
            $(document).on('click', function() {
                $('.' + options.menuClass, el).removeClass(options.toggleClass);
                $('.' + options.subMenu.parentClass, el).removeClass(options.subMenu.toggleClass);
                $('.' + options.subMenu.class, el).hide();
            });
            $('.' + options.menuClass).on('click', function(e) {
                e.stopPropagation();
            });
        });
        if (window.innerWidth <= options.breakpoint) {
            el.trigger('dropdownMenu');
        }
        $(window).resize(function() {
            if (window.innerWidth <= options.breakpoint) {
                el.trigger('dropdownMenu');
            } else {
                $('.' + options.classButtonToggle, el).off('click');
                $('.' + options.subMenu.parentClass, el).off('click', '> a');
                $('html, body').off('click');
                $('.' + options.menuClass).off('click');
            }
        });
    });
}

var dropdownMenu = function(el, opt) {
    var optDefault = {
        menuClass: 'wil-menu-list',
        breakpoint: 1000,
        toggleClass: 'active',
        classButtonToggle: 'toggle-menu',
        subMenu: {
            class: 'sub-menu',
            parentClass: 'menu-item-has-children',
            toggleClass: 'active'
        }
    };
    this.opts = $.extend(optDefault, opt);
    this.el = $(el);
    this.init();
}

dropdownMenu.prototype = {
    init: function() {
        var _this = this;
        var opts = this.opts;
        _this.el.each(function() {
            var self = $(this),
                buttonToggle = $('.' + opts.classButtonToggle, self),
                menu = $('.' + opts.menuClass, self),
                itemHasChild = $('.' + opts.subMenu.parentClass + ' > a', self);
            _this.toggleMenu(buttonToggle, menu, opts);
            _this.toggleSubMenu(itemHasChild, opts);
            _this.clickOut(menu, opts);
        });
    },
    handleClick: function(selector, cb, opts) {
        selector.on('click', function(event) {
            var ww = window.innerWidth;
            if (ww <= opts.breakpoint) cb(event);
        });
    },
    toggleMenu: function(buttonToggle, menu, opts) {
        this.handleClick(buttonToggle, function(event) {
            event.preventDefault();
            event.stopPropagation();
            menu.toggleClass(opts.toggleClass);
        }, opts);
    },
    toggleSubMenu: function(itemHasChild, opts) {
        this.handleClick(itemHasChild, function(event) {
            event.preventDefault();
            var subMenu = $(event.currentTarget).siblings('.' + opts.subMenu.class);
            subMenu.stop().slideToggle(400);
            subMenu.parent().toggleClass(opts.subMenu.toggleClass);
        }, opts);
    },
    clickOut: function(menu, opts) {
        this.handleClick($(document), function(event) {
            menu.removeClass(opts.toggleClass);
        }, opts);
        this.handleClick(menu, function(event) {
            event.stopPropagation();
        }, opts);
    }
}

$.fn.dropdownMenu = function(opt) {
    var _dropdownMenu = new dropdownMenu($(this), opt);
    return _dropdownMenu;
}



