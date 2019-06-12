/**
 * plugin.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('advlist', function(editor) {
	var ulMenuClasses, ulMenuItems, lastStyles = {};

	var hasPlugin = function (editor, plugin) {
		var plugins = editor.settings.plugins ? editor.settings.plugins : '';
		return tinymce.util.Tools.inArray(plugins.split(/[ ,]/), plugin) !== -1;
	};

	function isChildOfBody(elm) {
		return editor.$.contains(editor.getBody(), elm);
	}

	function isListNode(node) {
		return node && (/^(OL|UL|DL)$/).test(node.nodeName) && isChildOfBody(node);
	}

	function buildMenuItems(listName, styleValues) {
		var items = [];
		if (styleValues) {
			tinymce.each(styleValues.split(/[,]/), function(styleValue) {
				items.push({
					text: styleValue.replace(/\-/g, ' ').replace(/\b\w/g, function(chr) {
						return chr.toUpperCase();
					}),
					data: styleValue == 'default' ? '' : styleValue
				});
			});
		}
		return items; 
	}

	olMenuClasses = 'default';
	olMenuItems = buildMenuItems('OL', editor.getParam("advlist_number_styles",olMenuClasses));
	
	ulMenuClasses = "default,affiliates";
	ulMenuItems = buildMenuItems('UL', editor.getParam("advlist_bullet_styles", ulMenuClasses));
	
	function applyListFormat(listName, styleValue) {
		editor.undoManager.transact(function() {
			var list, dom = editor.dom, sel = editor.selection;
			
			// Check for existing list element
			list = dom.getParent(sel.getNode(), 'ol,ul');

			// Switch/add list type if needed
			if (!list || list.nodeName != listName || styleValue === false) {
				editor.execCommand(listName == 'UL' ? 'InsertUnorderedList' : 'InsertOrderedList', false, false);
			}

			// Set style
			styleValue = styleValue === false ? lastStyles[listName] : styleValue;
			lastStyles[listName] = styleValue;

			list = dom.getParent(sel.getNode(), 'ol,ul');
			if (list) {
				list.setAttribute('class', styleValue);
			}

			editor.focus();
		});
	}

	function updateSelection(e) {
		var listStyleType = editor.dom.getStyle(editor.dom.getParent(editor.selection.getNode(), 'ol,ul'), 'listStyleType') || '';

		e.control.items().each(function(ctrl) {
			ctrl.active(ctrl.settings.data === listStyleType);
		});
	}

	var listState = function (listName) {
		return function () {
			var self = this;

			editor.on('NodeChange', function (e) {
				var lists = tinymce.util.Tools.grep(e.parents, isListNode);
				self.active(lists.length > 0 && lists[0].nodeName === listName);
			});
		};
	};

	if (hasPlugin(editor, "lists")) {
		editor.addCommand('ApplyUnorderedListStyle', function (ui, value) {
			applyListFormat('UL', value['list-style-type']);
		});

		editor.addCommand('ApplyOrderedListStyle', function (ui, value) {
			applyListFormat('OL', value['list-style-type']);
		});

		editor.addButton('numlist', {
			type: (olMenuItems.length > 0) ? 'splitbutton' : 'button',
			tooltip: 'Numbered list',
			menu: olMenuItems,
			onPostRender: listState('OL'),
			onshow: updateSelection,
			onselect: function(e) {
				applyListFormat('OL', e.control.settings.data);
			},
			onclick: function() {
				applyListFormat('OL', false);
			}
		});

		editor.addButton('bullist', {
			type: (ulMenuItems.length > 0) ? 'splitbutton' : 'button',
			tooltip: 'Bullet list',
			onPostRender: listState('UL'),
			menu: ulMenuItems,
			onshow: updateSelection,
			onselect: function(e) {
				applyListFormat('UL', e.control.settings.data);
			},
			onclick: function() {
				applyListFormat('UL', false);
			}
		});
	}
});
