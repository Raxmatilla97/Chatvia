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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/custom.js":
/*!***************************************!*\
  !*** ./resources/assets/js/custom.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


window.displayToastr = function (heading, icon, message) {
  $.toast({
    heading: heading,
    text: message,
    showHideTransition: 'slide',
    icon: icon,
    position: 'top-right'
  });
};

window.htmlSpecialCharsDecode = function (string) {
  return jQuery('<div />').html(string).text();
};

window.setLocalStorageItem = function (variable, data) {
  localStorage.setItem(variable, data);
};

window.getLocalStorageItem = function (variable) {
  return localStorage.getItem(variable);
};

window.removeLocalStorageItem = function (variable) {
  localStorage.removeItem(variable);
};
/** Change Password */


$('#changePasswordForm').on('submit', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: changePasswordURL,
    type: 'POST',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        displayToastr('Success', 'success', result.message);
        setTimeout(function () {
          location.reload();
        }, 2000);
      }
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});

window.avoidSpace = function (event) {
  var k = event ? event.which : window.event.keyCode;

  if (k === 32) {
    event.stopPropagation();
    return false;
  }
};

window.resetModalForm = function (formId, validationBox) {
  $(formId)[0].reset();
  $(validationBox).hide();
};

window.deleteItemAjax = function (url, tableId, header) {
  var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
  $.ajax({
    url: url,
    type: 'DELETE',
    dataType: 'json',
    success: function success(obj) {
      if (obj.success) {
        $(tableId).DataTable().ajax.reload(null, false);
      }

      displayToastr('Success', 'success', header + " o'chirildi!");
    },
    error: function error(data) {
      displayToastr('Error', 'error', data.responseJSON.message);
    }
  });
};

/***/ }),

/***/ 5:
/*!*********************************************!*\
  !*** multi ./resources/assets/js/custom.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\custom.js */"./resources/assets/js/custom.js");


/***/ })

/******/ });