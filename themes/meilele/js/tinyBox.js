// themes/meilele/js/jq.js文件与 jquery.rotate.min.js 有冲突, 使用tinyBox.js代替

$.insertStyle = function(a) {
	try {
		style = document.createStyleSheet();
		style.cssText = a
	} catch(b) {
		style = document.createElement("style");
		style.type = "text/css";
		style.textContent = a;
		document.getElementsByTagName("HEAD").item(0).appendChild(style)
	}
};
$.lightBox = function(m, o, g, p, c, q, a) {
	o = o || {};
	p = p || 300;
	var j = document.createElement("div");
	var n = new Date();
	var b = n.getTime().toString(36);
	var s = true;
	n = "JS_lightBox_" + b;
	j.className = "lightBox " + (a ? a: "");
	j.id = n;
	if (c) {
		j.style.cssText = c
	}
	j.style.zIndex = p;
	var l = '<div class="htmls">' + (m + "").replace(/\{=id\}/g, b) + "</div>";
	var f = "";
	var e = 1;
	for (var i in o) {
		f += '<a href="javascript:;" id="' + n + "_" + i + '" class="lightbox_btns_' + i + " lightbox_btnsi_" + e + '">' + i + "</a>";
		e++
	}
	if (f) {
		f = '<div class="btns">' + f + "</div>"
	}
	l = g ? l + f: '<div class="in">' + l + f + "</div>";
	j.innerHTML = l;
	j._showMask = q;
	if (q) {
		$.showMask(p - 1)
	}
	document.body.appendChild(j);
	for (var i in o) {
		var r = $("#" + n + "_" + i);
		if (o[i] == "close") {
			r[0].onclick = function() {
				$.closeLightBox(n)
			}
		} else {
			if (typeof o[i] === "function") {
				r[0].onclick = o[i]
			}
		}
		if (s) {
			r.focus();
			s = false
		}
	}
	$.lightBoxId = n;
	$.lightBoxTempId = b;
	return j
};
$.closeLightBox = function(c, b) {
	if (!c) {
		c = $.lightBoxId
	}
	c = "JS_lightBox_" + ((c + "").replace("JS_lightBox_", ""));
	var a = $("#" + c);
	if (a.length) {
		if (a[0]._showMask) {
			$.hideMask()
		}
		a.remove()
	}
	if (typeof b == "function") {
		b(c)
	}
};


$.alert = function(a, c) {
	c = $.extend({
			title: "提示",
			onOk: null,
			mask: true,
			type: "warn"
		},
		(c || {}));
	var b = '<div class="clearfix title"><div class="Left"><i style="display:inline-block;"></i><span>' + c.title + '</span></div><a href="javascript:;" class="Right" onclick="$.closeLightBox( \'{=id}\' , $.alert.setting.onOk );">&times;</a></div><div class="content"><table style="width:100%"><tr><td class="icons_td"><span class="icons icons_' + c.type + '"></span></td><td class="content_td">' + a + "</td></tr></table></div>";
	$.lightBox(b, {
			"确定": function() {
				$.closeLightBox(false, c.onOk)
			}
		},
		null, null, null, c.mask, "MALERT");
	$.alert.setting = c
};
$.confirm = function(a, c) {
	c = $.extend({
			title: "提示",
			onOk: null,
			onCancel: null,
			mask: true,
			type: "confirm"
		},
		(c || {}));
	var b = '<div class="clearfix title"><div class="Left"><i style="display:inline-block;"></i><span>' + c.title + '</span></div><a href="javascript:;" class="Right" onclick="$.closeLightBox( \'{=id}\' , $.confirm.setting.onCancel );">&times;</a></div><div class="content"><table style="width:100%"><tr><td class="icons_td"><span class="icons icons_' + c.type + '"></span></td><td class="content_td">' + a + "</td></tr></table></div>";
	$.lightBox(b, {
			"确定": function() {
				$.closeLightBox(false, c.onOk)
			},
			"取消": function() {
				$.closeLightBox(false, c.onCancel)
			}
		},
		null, null, null, c.mask, "MALERT MCONFIRM");
	$.confirm.setting = c
};
$.showMask = function(c) {
	if ($._maskDom) {
		$.hideMask()
	}
	c = c || 290;
	var a = document.createElement("div"),
		b = (document.body.scrollHeight >= window.screen.availHeight) ? document.body.scrollHeight: window.screen.availHeight;
	a.id = "JS_mask";
	a.className = "c-mask";
	a.style.cssText = "height:" + b + "px;width:100%;position:absolute;background:#000;z-index:900;top:0;left:0;opacity:0.5;filter:alpha(opacity=50);z-index:" + c;
	$._maskDom = $(a);
	$("body").append($._maskDom);
	return $._maskDom
};
$.hideMask = function() {
	if ($._maskDom) {
		$._maskDom.remove();
		$._maskDom = null
	}
};
