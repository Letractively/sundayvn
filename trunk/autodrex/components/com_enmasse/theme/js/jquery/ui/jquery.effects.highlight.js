
(function( $, undefined ) {

$.effects.highlight = function(o) {
	return this.queue(function() {
		var elem = $(this),
			props = ['backgroundImage', 'backgroundColor', 'opacity'],
			mode = $.effects.setMode(elem, o.options.mode || 'show'),
			animation = {
				backgroundColor: elem.css('backgroundColor')
			};

		if (mode == 'hide') {
			animation.opacity = 0;
		}

		$.effects.save(elem, props);
		elem
			.show()
			.css({
				backgroundImage: 'none',
				backgroundColor: o.options.color || '#ffff99'
			})
			.animate(animation, {
				queue: false,
				duration: o.duration,
				easing: o.options.easing,
				complete: function() {
					(mode == 'hide' && elem.hide());
					$.effects.restore(elem, props);
					(mode == 'show' && !$.support.opacity && this.style.removeAttribute('filter'));
					(o.callback && o.callback.apply(this, arguments));
					elem.dequeue();
				}
			});
	});
};

})(jQuery);
