(function($) {
  "use strict";

  $(function(){
      var container = $('.pflistingtype-selector-main-top');
      var pfurl = container.data('pfajaxurl');
      var pfnonce = container.data('pfnoncef');
      var pfplaceh = container.data('pfplaceh');

      $('#post_author_override').select2({
         placeholder: pfplaceh,
         minimumInputLength: 3,
         ajax: {
           type: 'POST',
           dataType: "json",
           url: pfurl,
           quietMillis: 250,
           data: function (term, page) {
               return {
                   q: term,
                   action: 'pfget_authorchangesystem',
                   security: pfnonce
               };
           },
           results: function (data) {
               return {results: data};
           }
         },
         formatResult: formatValues,
         formatSelection: formatValues
      });

      function formatValues(data) {
          return data.nickname;
      }

  });

})(jQuery);