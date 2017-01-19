function toggleMobileMenu(){
  jQuery('.ui.sidebar')
  .sidebar('toggle');
}

jQuery('#sideNav')
  .sticky({
  offset:120,
  offsetBottom:10,
  observeChanges:true,
  context:'#componentContainer'
});

jQuery(document)
  .ready(function() {
    // show dropdown on hover
    jQuery('.secondary.menu .ui.dropdown').dropdown({
      on: 'hover'
    });
    jQuery('.dropdown')
      .dropdown({
        // you can use any ui transition
        transition: 'drop'
      })
    ;
    // accordion function
    $('.ui.accordion')
    .accordion();
  });
