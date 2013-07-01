/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'AweFont\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-awehome' : '&#xe000;',
			'icon-awecalendar' : '&#xe005;',
			'icon-awezoom-in' : '&#xe006;',
			'icon-awecog' : '&#xe008;',
			'icon-aweusers' : '&#xe009;',
			'icon-awefile' : '&#xe00b;',
			'icon-awecopy' : '&#xe00c;',
			'icon-awebubbles' : '&#xe00e;',
			'icon-aweaddress-book' : '&#xe004;',
			'icon-aweeye-blocked' : '&#xe003;',
			'icon-awepencil' : '&#xe001;',
			'icon-awecheckmark' : '&#xe007;',
			'icon-aweclose' : '&#xe00a;',
			'icon-awecabinet' : '&#xe00d;',
			'icon-awedownload' : '&#xe002;',
			'icon-awestorage' : '&#xe010;',
			'icon-awemenu' : '&#xe011;',
			'icon-aweimages' : '&#xe00f;',
			'icon-awenewspaper' : '&#xe012;',
			'icon-awesearch' : '&#xe013;',
			'icon-awetags' : '&#xe014;',
			'icon-aweenvelop' : '&#xe015;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
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
		c = c.match(/icon-awe[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};