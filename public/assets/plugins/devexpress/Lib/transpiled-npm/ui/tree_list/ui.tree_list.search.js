"use strict";

var _uiTree_list = _interopRequireDefault(require("./ui.tree_list.core"));

var _uiGrid_core = _interopRequireDefault(require("../grid_core/ui.grid_core.search"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_uiTree_list.default.registerModule('search', _uiGrid_core.default);