$('#portfolio').mixItUp({
    //denfination start sort style
    load: {
    	filter: '.18',
        sort: 'order:asc'
    },
    animation: {
        //effects: 'fade rotateZ(-180deg)',
        easing: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
        duration: 700,
        animateResizeContainer: false
    },
    selectors: {
        target: '.mix-target',
        filter: '.filter-btn',
        sort: '.sort-btn'
    },
    callbacks: {
        onMixEnd: function (state) {
            console.log(state)
        }
    }
});

