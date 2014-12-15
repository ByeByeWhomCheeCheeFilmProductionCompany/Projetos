$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
$(function() {
    $(window).bind("load resize", function() {
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    })
})
    $(window).load(function() {
        $('.tab-content')
            .masonry({
            itemSelector: '.cards'
        })
            //.hide()
            //.css('visibility', 'visible')
            //.css('top','100px')
            //.fadeIn();
    });