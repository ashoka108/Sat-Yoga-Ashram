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
    // fix secondary menu to page on passing
    jQuery('.secondary-menu').visibility({
      type: 'fixed',
      offset: 44,
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
      offset: 120,
      offsetBottom: 60,
      observeChanges:true,
      context:'#sidebarContext'
    });
    //dimm on card
    jQuery('.special.cards .segment.lCard').dimmer({
      on: 'hover'
    });
    //dimm on small card
    jQuery('.special.cards .segment.sCard').dimmer({
      on: 'hover'
    });
    // Hover on Feedback button
    jQuery('.feedback-modal')
    .popup({
      position : 'top center',
      hoverable: true,
      content    : 'User feedback',
    });

    jQuery('.coupled.modal')
    .modal({
    blurring: true
    //allowMultiple: false
    })
    jQuery('.second.modal.feedback')
    // Trigger thank you message
    .modal('attach events', '.ui.button.btn-primary.button.submit', 'show');
    // Close second modal
   //.modal('attach events', '.ui.secondary.feedback_ty', 'hide');

    // show first when clicked
    jQuery('.first.modal.feedback')
    .modal('attach events', '.ui.button.feedback-modal', 'show');

    // Email subscription thank you message
    jQuery('.basic.modal.news-sub')
  .modal('attach events', '.ui.button.news-sub', 'show')
;

  });
