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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/tolocaledate.js":
/*!**************************************!*\
  !*** ./resources/js/tolocaledate.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var timeElm = document.querySelector('time');\nvar d = new Date(Date.parse(timeElm.innerText));\ntimeElm.innerText = d.toLocaleString(navigator.language || 'en-US', {\n  day: 'numeric',\n  month: 'short',\n  year: 'numeric'\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdG9sb2NhbGVkYXRlLmpzPzE3M2IiXSwibmFtZXMiOlsidGltZUVsbSIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsImQiLCJEYXRlIiwicGFyc2UiLCJpbm5lclRleHQiLCJ0b0xvY2FsZVN0cmluZyIsIm5hdmlnYXRvciIsImxhbmd1YWdlIiwiZGF5IiwibW9udGgiLCJ5ZWFyIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFNQSxPQUFPLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBVCxDQUF1QixNQUF2QixDQUFoQjtBQUNBLElBQU1DLENBQUMsR0FBRyxJQUFJQyxJQUFKLENBQVNBLElBQUksQ0FBQ0MsS0FBTCxDQUFXTCxPQUFPLENBQUNNLFNBQW5CLENBQVQsQ0FBVjtBQUNBTixPQUFPLENBQUNNLFNBQVIsR0FBb0JILENBQUMsQ0FBQ0ksY0FBRixDQUFpQkMsU0FBUyxDQUFDQyxRQUFWLElBQXNCLE9BQXZDLEVBQWdEO0FBQ2xFQyxLQUFHLEVBQUUsU0FENkQ7QUFFbEVDLE9BQUssRUFBRSxPQUYyRDtBQUdsRUMsTUFBSSxFQUFFO0FBSDRELENBQWhELENBQXBCIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3RvbG9jYWxlZGF0ZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHRpbWVFbG0gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCd0aW1lJyk7XG5jb25zdCBkID0gbmV3IERhdGUoRGF0ZS5wYXJzZSh0aW1lRWxtLmlubmVyVGV4dCkpO1xudGltZUVsbS5pbm5lclRleHQgPSBkLnRvTG9jYWxlU3RyaW5nKG5hdmlnYXRvci5sYW5ndWFnZSB8fCAnZW4tVVMnLCB7XG4gIGRheTogJ251bWVyaWMnLFxuICBtb250aDogJ3Nob3J0JyxcbiAgeWVhcjogJ251bWVyaWMnXG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/tolocaledate.js\n");

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/tolocaledate.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/kn/Documents/private/kaleidoscope/resources/js/tolocaledate.js */"./resources/js/tolocaledate.js");


/***/ })

/******/ });