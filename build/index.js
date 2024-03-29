!(function () {
	"use strict";
	var e,
		t = {
			741: function () {
				var e = window.wp.blocks,
					t = JSON.parse(
						'{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"gutenberg-examples/dynamic-block-02","version":"0.1.1","title":"Example: Dynamic Block (ESNext)","category":"text","icon":"universal-access-alt","attributes":{"message":{"type":"string","default":"Hello from a dynamic block!"}},"example":{"attributes":{"message":"Example Dynamic Block"}},"supports":{"html":false},"textdomain":"dynamic-block-02","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}'
					);
				function n() {
					return (
						(n =
							Object.assign ||
							function (e) {
								for (
									var t = 1;
									t < arguments.length;
									t++
								) {
									var n = arguments[t];
									for (var r in n)
										Object.prototype.hasOwnProperty.call(
											n,
											r
										) && (e[r] = n[r]);
								}
								return e;
							}),
						n.apply(this, arguments)
					);
				}
				var r = window.wp.element,
					o = window.wp.blockEditor;
				const { name: i } = t;
				(0, e.registerBlockType)(i, {
					edit: function (e) {
						let {
							attributes: { message: t },
							setAttributes: i,
						} = e;
						return (0, r.createElement)(
							o.RichText,
							n({}, (0, o.useBlockProps)(), {
								tagName: "p",
								value: t,
								onChange: (e) => i({ message: e }),
							})
						);
					},
				});
			},
		},
		n = {};
	function r(e) {
		var o = n[e];
		if (void 0 !== o) return o.exports;
		var i = (n[e] = { exports: {} });
		return t[e](i, i.exports, r), i.exports;
	}
	(r.m = t),
		(e = []),
		(r.O = function (t, n, o, i) {
			if (!n) {
				var a = 1 / 0;
				for (u = 0; u < e.length; u++) {
					(n = e[u][0]), (o = e[u][1]), (i = e[u][2]);
					for (var s = !0, c = 0; c < n.length; c++)
						(!1 & i || a >= i) &&
						Object.keys(r.O).every(function (e) {
							return r.O[e](n[c]);
						})
							? n.splice(c--, 1)
							: ((s = !1), i < a && (a = i));
					if (s) {
						e.splice(u--, 1);
						var l = o();
						void 0 !== l && (t = l);
					}
				}
				return t;
			}
			i = i || 0;
			for (var u = e.length; u > 0 && e[u - 1][2] > i; u--)
				e[u] = e[u - 1];
			e[u] = [n, o, i];
		}),
		(r.o = function (e, t) {
			return Object.prototype.hasOwnProperty.call(e, t);
		}),
		(function () {
			var e = { 826: 0, 431: 0 };
			r.O.j = function (t) {
				return 0 === e[t];
			};
			var t = function (t, n) {
					var o,
						i,
						a = n[0],
						s = n[1],
						c = n[2],
						l = 0;
					if (
						a.some(function (t) {
							return 0 !== e[t];
						})
					) {
						for (o in s) r.o(s, o) && (r.m[o] = s[o]);
						if (c) var u = c(r);
					}
					for (t && t(n); l < a.length; l++)
						(i = a[l]),
							r.o(e, i) && e[i] && e[i][0](),
							(e[i] = 0);
					return r.O(u);
				},
				n = (self.webpackChunkdynamic_block =
					self.webpackChunkdynamic_block || []);
			n.forEach(t.bind(null, 0)),
				(n.push = t.bind(null, n.push.bind(n)));
		})();
	var o = r.O(void 0, [431], function () {
		return r(741);
	});
	o = r.O(o);
})();
