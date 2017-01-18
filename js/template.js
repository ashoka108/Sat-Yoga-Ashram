 $(document)
    .ready(function() {
    $('.ui.sidebar')
    .sidebar('attach events', '.mobile.item'
    );
    // fix main menu to page on passing
    $('.masthead')
      .visibility({
      once: false,
      onBottomPassed: function() {
        $('.fixed.menu').transition('fade in');
      },
      onBottomPassedReverse: function() {
        $('.fixed.menu').transition('fade out');
      }
    });
    // show dropdown on hover
    $('.secondary.menu .ui.dropdown').dropdown({
    on: 'hover'
    });
    // show dropdown on hover follow menu
    $('.fixed.menu .ui.dropdown').dropdown({
    on: 'hover'
    });
    // accordion function in mobile sidebar
    $('.ui.accordion')
    .accordion();
    });
