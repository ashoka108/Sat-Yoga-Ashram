function toggleMobileMenu(){
  jQuery('.ui.sidebar')
  .sidebar('toggle');
}

jQuery(document)
  .ready(function() {

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
      offset:0,
      offsetBottom:30,
      observeChanges:true,
      context:'#sidebarContext'
    });
  });
