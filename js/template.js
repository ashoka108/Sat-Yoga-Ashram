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
    jQuery('#sideNav')
      .sticky({
      offset:120,
      offsetBottom:10,
      observeChanges:true,
      context:'#componentContainer'
    });
  });
