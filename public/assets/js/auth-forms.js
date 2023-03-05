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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/auth-forms.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/auth-forms.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).on('click', '#loginBtn', function (event) {
  event.preventDefault();

  if (!validateEmail() || !validatePassword()) {
    return false;
  }

  $('#loginForm').submit();
});
$(document).on('click', '#registerBtn', function (event) {
  event.preventDefault();

  if (!validateName() || !validateEmail() || !validatePassword() || !validatePasswordConfirmation() || !validateMatchPasswords()) {
    return false;
  }

  $('#registerForm').submit();
});
$(document).on('click', '#forgetPasswordBtn', function (event) {
  event.preventDefault();

  if (!validateEmail()) {
    return false;
  }

  $('#forgetPasswordForm').submit();
});
$(document).on('click', '#resetPasswordBtn', function (event) {
  event.preventDefault();

  if (!validateEmail() || !validatePassword() || !validatePasswordConfirmation() || !validateMatchPasswords()) {
    return false;
  }

  $('#resetPasswordForm').submit();
});
var form = $('form');
form.on('keypress', function (e) {
  if (e.keyCode === 13) {
    var loginBtn = form.find('#loginBtn');
    var registerBtn = form.find('#registerBtn');
    var forgetPasswordBtn = form.find('#forgetPasswordBtn');
    var resetPasswordBtn = form.find('#resetPasswordBtn');

    if (loginBtn.length > 0) {
      loginBtn.trigger('click');
    } else if (registerBtn.length > 0) {
      registerBtn.trigger('click');
    } else if (forgetPasswordBtn.length > 0) {
      forgetPasswordBtn.trigger('click');
    } else if (resetPasswordBtn.length > 0) {
      resetPasswordBtn.trigger('click');
    }
  }
}); //validations

var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

window.validateName = function () {
  var name = $('#name').val();

  if (name === '') {
    displayToastr('Error', 'error', 'The name field is required.');
    return false;
  }

  return true;
};

window.validatePasswordConfirmation = function () {
  var passwordConfirmation = $('#password_confirmation').val();

  if (passwordConfirmation === '') {
    displayToastr('Error', 'error', 'The password confirmation field is required.');
    return false;
  }

  return true;
};

window.validateMatchPasswords = function () {
  var passwordConfirmation = $('#password_confirmation').val();
  var password = $('#password').val();

  if (passwordConfirmation !== password) {
    displayToastr('Error', 'error', 'The password and password confirmation did not match.');
    return false;
  }

  return true;
};

window.validatePassword = function () {
  var password = $('#password').val();

  if (password === '') {
    displayToastr('Error', 'error', 'The password field is required.');
    return false;
  }

  return true;
};

window.validateEmail = function () {
  var email = $('#email').val();

  if (email === '') {
    displayToastr('Error', 'error', 'The email field is required.');
    return false;
  } else if (!validateEmailFormat(email)) {
    displayToastr('Error', 'error', 'Please enter valid email.');
    return false;
  }

  return true;
};

window.validateEmailFormat = function (email) {
  return emailReg.test(email);
};

window.avoidSpace = function (event) {
  var k = event ? event.which : window.event.keyCode;

  if (k === 32) {
    event.stopPropagation();
    return false;
  }
};

/***/ }),

/***/ 6:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/auth-forms.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\auth-forms.js */"./resources/assets/js/auth-forms.js");


/***/ })

/******/ });