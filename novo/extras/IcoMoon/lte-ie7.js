/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-thumbs-up' : '&#xe000;',
			'icon-twitter' : '&#xe001;',
			'icon-google-plus' : '&#xe002;',
			'icon-pinterest' : '&#xe003;',
			'icon-arrow-left' : '&#xe007;',
			'icon-arrow-right' : '&#xe006;',
			'icon-baloon' : '&#xe004;',
			'icon-eye' : '&#xe005;',
			'icon-menu' : '&#xf0c9;',
			'icon-export' : '&#xe008;',
			'icon-heart' : '&#xe009;',
			'icon-email' : '&#xe00a;',
			'icon-home' : '&#xe00b;',
			'icon-lightbulb' : '&#xf0eb;',
			'icon-th' : '&#xf00a;',
			'icon-instagram' : '&#xf16d;',
			'icon-rss' : '&#xf09e;',
			'icon-youtube' : '&#xf167;',
			'icon-vimeo' : '&#xe00c;',
			'icon-camera' : '&#xf030;',
			'icon-question' : '&#xf128;',
			'icon-facebook' : '&#xf09a;',
			'icon-uniF470' : '&#xf470;',
			'icon-windows' : '&#xf019;',
			'icon-expand' : '&#xe00d;',
			'icon-uniF48A' : '&#xf48a;',
			'icon-uniF489' : '&#xf489;',
			'icon-uniF488' : '&#xf488;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
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