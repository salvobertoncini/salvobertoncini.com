(function($) {
  $.fn.textExcerpt = function(options) {
    var settings = $.extend({}, $.fn.textExcerpt.defaults, options);
    return this.each(function() {
      var $container = $(this);
      var fullText = $container.text();
      var fullTextLength = fullText.length;
      var excerpt = fullText.substring(0, settings.excerptLength);
      var showMoreText = fullText.substring(settings.excerptLength).trim();
      if (fullTextLength > settings.excerptLength) {
        $container.html(excerpt + ('<span class="tl_dot">...</span>&nbsp;<span class="tl_show_more_text">' + showMoreText + '</span>'));
        $('<span id="tl_show_more">' + settings.revealLabel + '</span>')
          .appendTo($container)
          .toggle(function() {
            $container.find('span.tl_dot').hide();
            $container.find('span.tl_show_more_text').show();
            $(this).text(' ' + settings.hideLabel);
          }, function() {
            $container.find('span.tl_dot').show();
            $container.find('span.tl_show_more_text').hide();
            $(this).text(settings.revealLabel);
          });
        $container.find('span.tl_show_more_text').hide();
      }
    });
  };
  $.fn.textExcerpt.defaults = {
    excerptLength: 100,
    revealLabel: "Show More",
    hideLabel: "Show Less"
  };
})( jQuery );