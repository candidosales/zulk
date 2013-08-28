/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-house' : '&#xe002;',
			'icon-mail' : '&#xe003;',
			'icon-heart' : '&#xe004;',
			'icon-export' : '&#xe005;',
			'icon-reorder' : '&#xf0c9;',
			'icon-th-large' : '&#xf009;',
			'icon-eye' : '&#xe000;',
			'icon-comment' : '&#xe001;',
			'icon-arrow-right' : '&#xe006;',
			'icon-arrow-left' : '&#xe007;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};