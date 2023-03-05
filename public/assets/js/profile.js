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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/profile.js":
/*!****************************************!*\
  !*** ./resources/assets/js/profile.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$('#editProfileForm').on('submit', function (event) {
  if (!validateName() || !validateEmail() || !validatePhone()) {
    return false;
  }

  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: profileURL,
    type: 'post',
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
$(':checkbox').iCheck({
  checkboxClass: 'icheckbox_square-green',
  radioClass: 'iradio_square',
  increaseArea: '20%' // optional

});
$('#upload-photo').on('change', function () {
  readURL(this);
});
var on = $('#btnCancelEdit').on('click', function () {
  $('#editProfileForm').trigger('reset');
}); // profile js

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#upload-photo-img').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

window.printErrorMessage = function (selector, errorResult) {
  $(selector).show().html('');
  $(selector).text(errorResult.responseJSON.message);
}; //validations


var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

window.validateName = function () {
  var name = $('#user-name').val();

  if (name === '') {
    displayToastr('Error', 'error', 'The name field is required.');
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

window.validatePhone = function () {
  var phone = $('#phone').val();

  if (phone !== '' && phone.length !== 10) {
    displayToastr('Error', 'error', 'The phone number must be 10 digits long.');
    return false;
  }

  return true;
};

$('#phone').on('keypress keyup blur', function (e) {
  $(this).val($(this).val().replace(/[^\d].+/, ''));

  if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
    e.preventDefault();
    return false;
  }
});
var swalDelete = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-danger mr-2 btn-lg',
    cancelButton: 'btn btn-secondary btn-lg'
  },
  buttonsStyling: false
});
$('.remove-profile-img').on('click', function (e) {
  e.preventDefault();
  swalDelete.fire({
    title: 'Are you sure?',
    html: 'Your profile image removed by clicking on YES.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, remove it!'
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        type: 'DELETE',
        url: removeProfileImage,
        success: function success(result) {
          displayToastr('Success', 'success', result.message);
          setTimeout(function () {
            location.reload();
          }, 2000);
        },
        error: function error(_error) {
          displayToastr('Error', 'error', _error.message);
        }
      });
    }
  });
});

/***/ }),

/***/ 4:
/*!**********************************************!*\
  !*** multi ./resources/assets/js/profile.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\profile.js */"./resources/assets/js/profile.js");


/***/ })

/******/ });