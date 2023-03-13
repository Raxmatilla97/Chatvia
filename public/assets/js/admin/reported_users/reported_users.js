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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/admin/reported_users/reported_users.js":
/*!********************************************************************!*\
  !*** ./resources/assets/js/admin/reported_users/reported_users.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
  var tbl = $('#reportedUsersTable').DataTable({
    processing: true,
    serverSide: true,
    'bStateSave': true,
    'order': [[2, 'desc']],
    ajax: {
      url: reportedUsersUrl
    },
    columnDefs: [{
      'targets': [3, 4],
      'orderable': false,
      'className': 'text-center',
      'width': '7%'
    }, {
      'targets': [2],
      'width': '10%'
    }],
    columns: [{
      data: function data(_data) {
        return htmlSpecialCharsDecode(_data.reported_by.name);
      },
      name: 'reported_by.name'
    }, {
      data: function data(_data2) {
        return htmlSpecialCharsDecode(_data2.reported_to.name);
      },
      name: 'reported_to.name'
    }, {
      data: function data(row) {
        return row;
      },
      render: function render(row) {
        return '<span data-toggle="tooltip" title="' + format(row.created_at, 'hh:mm:ss a') + '">' + format(row.created_at) + '</span>';
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        if (row.reported_to.id == loggedInUserId) {
          return row.reported_to.is_active ? 'Active' : 'Deactive';
        }

        row.checked = row.reported_to.is_active === 0 ? '' : 'checked';
        return $.templates('#isActiveSwitch').render(row);
      },
      name: 'id'
    }, {
      data: function data(row) {
        return $.templates('#viewDelIcons').render(row);
      },
      name: 'id'
    }],
    drawCallback: function drawCallback() {
      this.api().state.clear();
      $('[data-toggle="tooltip"]').tooltip();
    }
  });

  window.format = function (dateTime) {
    var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'DD-MMM-YYYY';
    return moment(dateTime).format(format);
  };

  var swalDelete = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger mr-2 btn-lg',
      cancelButton: 'btn btn-secondary btn-lg'
    },
    buttonsStyling: false
  }); // open delete confirmation model

  $(document).on('click', '.delete-btn', function () {
    var reportedUsersId = $(this).data('id');
    var deleteReportedUsersUrl = reportedUsersUrl + '/' + reportedUsersId;
    deleteItem(deleteReportedUsersUrl, '#reportedUsersTable', 'Reported User');
  });
  $(document).on('click', '.view-btn', function () {
    var reportId = $(this).data('id');
    var viewReportedUsersUrl = reportedUsersUrl + '/' + reportId;
    $.ajax({
      type: 'GET',
      url: viewReportedUsersUrl,
      success: function success(data) {
        $('.reported-user-notes').html(data.notes);
        $('.reported-by').text(data.reported_by.name);
        $('.reported-to').text(data.reported_to.name);
        $('#viewReportNoteModal').modal('show');
      }
    });
  });

  function deleteItem(url, tableId, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
    swalDelete.fire({
      title: 'Qaroringiz qatiymi?',
      html: 'you want to delete this record ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
    }).then(function (result) {
      if (result.value) {
        deleteItemAjax(url, tableId, header, callFunction = null);
      }
    });
  } // listen user activation deactivation change event


  $(document).on('change', '.is-active', function (event) {
    var userId = $(event.currentTarget).data('id');
    activeDeActiveUser(userId);
  }); // activate de-activate user

  window.activeDeActiveUser = function (id) {
    $.ajax({
      url: usersUrl + '/' + id + '/active-de-active',
      method: 'post',
      cache: false,
      success: function success(result) {
        if (result.success) {
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(_error) {
        displayToastr('Error', 'error', _error.responseJSON.message);
      }
    });
  };
});

/***/ }),

/***/ 11:
/*!**************************************************************************!*\
  !*** multi ./resources/assets/js/admin/reported_users/reported_users.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\admin\reported_users\reported_users.js */"./resources/assets/js/admin/reported_users/reported_users.js");


/***/ })

/******/ });