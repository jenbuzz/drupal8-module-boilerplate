(function ($, Drupal) {
    'use strict';

    Drupal.behaviors.drupalBoilerplate = {
        attach: function (context, settings) {            
            $('#block-drupalboilerplateblock', context).once('blockBehavior').addClass('bg-black');

            $('#block-drupalboilerplateblock', context).once('anotherBlockBehavior').each(function () {
                console.log('Hello World!');
            });
        }
    };
})(jQuery, Drupal);
 
