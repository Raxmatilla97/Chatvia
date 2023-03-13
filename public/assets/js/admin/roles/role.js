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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/admin/roles/role.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/admin/roles/role.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
  var roleTable = $('#roles-table').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
      url: roleUrl
    },
    columnDefs: [{
      'targets': [1],
      'orderable': false,
      'className': 'text-center',
      'width': '7%'
    }],
    columns: [{
      data: 'name',
      name: 'name'
    }, {
      data: function data(row) {
        if (row.is_default) {
          return '';
        }

        return '<button title="Edit" class="index__btn btn btn-ghost-success btn-sm edit-btn" data-id="' + row.id + '">' + '<i class="cui-pencil action-icon"></i>' + '</button>' + '<button title="Delete" class="index__btn btn btn-ghost-danger btn-sm delete-btn" data-id="' + row.id + '">' + '<i class="cui-trash action-icon"></i></button>';
      },
      name: 'id'
    }]
  });
  $(document).on('click', '.edit-btn', function () {
    var id = $(this).data('id');
    $.ajax({
      type: 'get',
      url: roleUrl + id + '/edit',
      success: function success(data) {
        if (data.success) {
          $('#edit_role_name').val(htmlSpecialCharsDecode(data.data.name));
          $('#edit_role_id').val(data.data.id);
          $('#edit_role_modal').modal('show');
        }
      },
      error: function error(_error) {
        displayToastr('Error', 'error', result.responseJSON.message);
      }
    });
  });
  $('#createRoleForm').on('submit', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnCreateRole');
    loadingButton.button('loading');
    $.ajax({
      url: createRoleUrl,
      type: 'post',
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          displayToastr('Success', 'success', result.message);
          $('#create_role_modal').modal('hide');
          roleTable.ajax.reload(null, false);
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
  $('#editRoleForm').on('submit', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    var id = $('#edit_role_id').val();
    $.ajax({
      url: roleUrl + id + '/update',
      type: 'post',
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          $('#edit_role_modal').modal('hide');
          roleTable.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        printErrorMessage('#editValidationErrorsBox', result.responseJSON.message);
        console.log(result.responseJSON.message);
      },
      complete: function complete() {
        loadingButton.button('reset');
      }
    });
  });
  $('#create_role_modal').on('hidden.bs.modal', function () {
    resetModalForm('#createRoleForm', '#validationErrorsBox');
  });
  $('#edit_role_modal').on('hidden.bs.modal', function () {
    resetModalForm('#editRoleForm', '#editValidationErrorsBox');
  });

  function resetModalForm(formId, validationBox) {
    $(formId)[0].reset();
    $(validationBox).hide();
  }

  function printErrorMessage(selector, errorMessage) {
    $(selector).show().html('');
    $(selector).append('<div>' + errorMessage + '</div>');
  }

  var swalDelete = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger mr-2 btn-lg',
      cancelButton: 'btn btn-secondary btn-lg'
    },
    buttonsStyling: false
  }); // open delete confirmation model

  $(document).on('click', '.delete-btn', function (event) {
    var roleId = $(this).data('id');
    swalDelete.fire({
      title: 'Qaroringiz qatiymi?',
      html: 'Are you sure you want to delete this role ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          url: roleUrl + roleId,
          type: 'DELETE',
          dataType: 'json',
          success: function success(obj) {
            displayToastr('Success', 'success', 'Role deleted successfully.');
            roleTable.ajax.reload(null, false);
          },
          error: function error(data) {
            displayToastr('Error', 'error', data.responseJSON.message);
          }
        });
      }
    });
  });
});

/***/ }),

/***/ 10:
/*!*******************************************************!*\
  !*** multi ./resources/assets/js/admin/roles/role.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\admin\roles\role.js */"./resources/assets/js/admin/roles/role.js");


/***/ })

/******/ });