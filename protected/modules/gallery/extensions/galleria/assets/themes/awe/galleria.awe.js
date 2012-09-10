/**
 * Galleria Awe Theme 2012-09-10
 * http://motorscript.com
 *
 * Licensed under the MIT license
 * Based on Galleria Classic theme
 *
 */

(function($) {

    /*global jQuery, Galleria */

    Galleria.addTheme({
        name: 'awe',
        author: 'Dipesh Acharya',
        version: 1,
        css: 'galleria.awe.css',
        defaults: {
            transition: 'slide',
            thumbCrop:  'height',

            // set this to false if you want to show the caption all the time:
            _toggleInfo: false
        },
        init: function(options) {

            this.addElement("bar");
            this.append({
                container: ["bar"],
                bar: ["info"]
            });
            this.prependChild("info", "counter");
            Galleria.requires(1.28, 'This version of Awe theme requires Galleria 1.2.8 or later');


            // cache some stuff
            touch = Galleria.TOUCH,
            click = touch ? 'touchstart' : 'click';

            // show loader & counter with opacity
            this.$('loader,counter').show().css('opacity', 0.4);

            // some stuff for non-touch browsers
            if (! touch ) {
                this.addIdleState( this.get('image-nav-left'), {
                    left:-50
                });
                this.addIdleState( this.get('image-nav-right'), {
                    right:-50
                });
                this.addIdleState( this.get('counter'), {
                    opacity:0
                });
            }

            // bind some stuff
            this.bind('thumbnail', function(e) {

                if (! touch ) {
                    // fade thumbnails
                    $(e.thumbTarget).css('opacity', 0.6).parent().hover(function() {
                        $(this).not('.active').children().stop().fadeTo(100, 1);
                    }, function() {
                        $(this).not('.active').children().stop().fadeTo(400, 0.6);
                    });

                    if ( e.index === this.getIndex() ) {
                        $(e.thumbTarget).css('opacity',1);
                    }
                } else {
                    $(e.thumbTarget).css('opacity', this.getIndex() ? 1 : 0.6);
                }
            });

            this.bind('loadstart', function(e) {
                if (!e.cached) {
                    this.$('loader').show().fadeTo(200, 0.4);
                }

                this.$('info').toggle( this.hasInfo() );

                $(e.thumbTarget).css('opacity',1).parent().siblings().children().css('opacity', 0.6);
            });

            this.bind('loadfinish', function(e) {
                this.$('loader').fadeOut(200);
            });
        }
    });

}(jQuery));
