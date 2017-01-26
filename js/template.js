function toggleMobileMenu(){
  jQuery('.ui.sidebar')
  .sidebar('toggle');
}

jQuery(document)
  .ready(function() {
    // fix main menu to page on passing
    jQuery('.main-menu.grid').visibility({
      type: 'fixed',
      offset: 16,
    });
    // show dropdown on hover
    jQuery('.secondary.menu .ui.dropdown')
    .dropdown({
      on: 'hover',
    })
    ;
    // accordion function
    jQuery('.ui.accordion')
    .accordion()
    ;
    // Sticky Sidenav
    jQuery('#right-sidebar')
      .sticky({
      offset:24,
      offsetBottom:60,
      observeChanges:true,
      context:'#sidebarContext'
    });
    //dimm on card
    jQuery('.special.cards .segment.perm').dimmer({
      on: 'hover'
    });
});
