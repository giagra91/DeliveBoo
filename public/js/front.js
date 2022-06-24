/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/front.js":
/*!*******************************!*\
  !*** ./resources/js/front.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\resources\\js\\front.js: Identifier 'Vue' has already been declared. (16:7)\n\n\u001b[0m \u001b[90m 14 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 15 |\u001b[39m window\u001b[33m.\u001b[39m\u001b[33mVue\u001b[39m \u001b[33m=\u001b[39m require(\u001b[32m'vue'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 16 |\u001b[39m \u001b[36mimport\u001b[39m \u001b[33mVue\u001b[39m \u001b[36mfrom\u001b[39m \u001b[32m'vue'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m        \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 18 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 19 |\u001b[39m\u001b[0m\n    at instantiate (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:72:32)\n    at constructor (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:358:12)\n    at Parser.raise (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:3341:19)\n    at ScopeHandler.checkRedeclarationInScope (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:3525:19)\n    at ScopeHandler.declareName (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:3491:12)\n    at Parser.declareNameFromIdentifier (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:12147:16)\n    at Parser.checkIdentifier (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:12142:12)\n    at Parser.checkLVal (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:12068:12)\n    at Parser.finishImportSpecifier (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16296:10)\n    at Parser.parseImportSpecifierLocal (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16292:31)\n    at Parser.maybeParseDefaultImportSpecifier (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16409:12)\n    at Parser.parseImport (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16257:31)\n    at Parser.parseStatementContent (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:14748:27)\n    at Parser.parseStatement (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:14638:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:15281:25)\n    at Parser.parseBlockBody (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:15272:10)\n    at Parser.parseProgram (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:14556:10)\n    at Parser.parseTopLevel (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:14543:25)\n    at Parser.parse (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16506:10)\n    at parse (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\parser\\lib\\index.js:16558:38)\n    at parser (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\core\\lib\\parser\\index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\core\\lib\\transformation\\index.js:31:50)\n    at run.next (<anonymous>)\n    at Function.transform (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\@babel\\core\\lib\\transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\gensync\\index.js:261:32)\n    at C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\gensync\\index.js:273:13\n    at async.call.result.err.err (C:\\Users\\aless\\Documents\\Boolean\\DeliveBoo-2\\node_modules\\gensync\\index.js:223:11)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./resources/js/front.js ./resources/sass/app.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\aless\Documents\Boolean\DeliveBoo-2\resources\js\front.js */"./resources/js/front.js");
module.exports = __webpack_require__(/*! C:\Users\aless\Documents\Boolean\DeliveBoo-2\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });