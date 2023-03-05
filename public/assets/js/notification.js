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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/notification.js":
/*!*********************************************!*\
  !*** ./resources/assets/js/notification.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var totalNotification = 0;
var mediaTypeImage = 1;
var mediaTypePdf = 2;
var mediaTypeDocx = 3;
var mediaTypeVoice = 4;
var mediaTypeVideo = 5;
var mediaTypeTxt = 7;
var mediaTypeXls = 8;

window.getNotificationMsgTime = function (dateTime) {
  var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'h:mma';
  return moment.utc(dateTime).local().format(format);
};

window.hideNoNotification = function () {
  $('#noNewNotification').hide();
};

window.showNoNotification = function () {
  $('#noNewNotification').show();
};

window.setTotalNotificationCount = function (totalNotification) {
  $('.totalNotificationCount').text(totalNotification).attr('data-total_count', totalNotification).show();

  if (totalNotification > 0) {
    $('.read-all-notification').show();
    $('.totalNotificationCount').show();
    hideNoNotification();
  } else {
    $('.read-all-notification').hide();
    $('.totalNotificationCount').hide();
    showNoNotification();
  }
};

window.getMessageByItsTypeForNotificationList = function (message, message_type) {
  var file_name = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';

  if (message_type === mediaTypeImage) {
    return '<i class="fa fa-camera mx-0 text-left" aria-hidden="true"></i>' + ' Photo';
  } else if (message_type === mediaTypePdf) {
    return '<i class="fa fa-file-pdf-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else if (message_type === mediaTypeDocx) {
    return '<i class="fa fa-file-word-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else if (message_type === mediaTypeVoice) {
    return '<i class="fa fa-file-audio-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else if (message_type === mediaTypeVideo) {
    return '<i class="fa fa-file-video-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else if (message_type === mediaTypeTxt) {
    return '<i class="fa fa-file-text-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else if (message_type === mediaTypeXls) {
    return '<i class="fa fa-file-excel-o mx-0 text-left" aria-hidden="true"></i>' + ' ' + file_name;
  } else {
    return message;
  }
};

window.renderNotifications = function () {
  var template = $.templates('#tmplNotification');
  var myHelpers = {
    getNotificationMsgTime: getNotificationMsgTime,
    getMessageByItsTypeForNotificationList: getMessageByItsTypeForNotificationList
  };
  var notificationHtml = template.render(notifications, myHelpers);
  totalNotification = notifications.length;
  setTotalNotificationCount(totalNotification);
  $('.notification__popup').append(notificationHtml);
};

renderNotifications();
window.Echo["private"]("user.".concat(loggedInUserId)).listen('UserEvent', function (notification) {
  if (notification.type !== 6) {
    // message deleted for everyone
    return false;
  }

  var currentUrl = window.location.href;

  if (currentUrl.indexOf(conversationsURL) != -1 && getCurrentUserId() === notification.owner_id) {
    return false;
  }

  hideNoNotification();
  var isUserElePresent = $('.notification__popup').find('#owner-' + notification.owner_id).length;
  var myHelpers = {
    getNotificationMsgTime: getNotificationMsgTime,
    getMessageByItsTypeForNotificationList: getMessageByItsTypeForNotificationList
  };

  if (isUserElePresent) {
    var template = $.templates('#tmplOldNotification');
    var notificationHtml = template.render(notification, myHelpers);
    $('#owner-' + notification.owner_id).html(notificationHtml);
  } else {
    totalNotification += 1;
    setTotalNotificationCount(totalNotification);

    var _template = $.templates('#tmplNotification');

    var _notificationHtml = _template.render(notification, myHelpers);

    $('.notification__popup').append(_notificationHtml);
  }
});
$(document).on('click', '.notification-item', function (e) {
  e.preventDefault();
  var notificationId = $(this).data('notification_id');
  var selector = $(this).attr('id');
  readNotification(notificationId, '#' + selector);
});

window.readNotification = function (notificationId, selector) {
  $.ajax({
    type: 'get',
    url: '/notification/' + notificationId + '/read',
    success: function success(data) {
      totalNotification = totalNotification - 1;
      setTotalNotificationCount(totalNotification);
      var ownerId = data.data.owner_id;
      $(selector).remove();
      displayToastr('Success', 'success', data.message);
      var currentUrl = window.location.href;

      if (currentUrl.indexOf(conversationsURL) != -1) {
        var conversationEle = $(document).find('#user-' + ownerId);
        conversationEle.trigger('click');
      } else {
        window.location.replace(conversationsURL + '?conversationId=' + ownerId);
      }
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    }
  });
};

window.readNotificationWhenChatWindowOpen = function (notificationId, selector) {
  $.ajax({
    type: 'get',
    url: '/notification/' + notificationId + '/read',
    success: function success() {
      $(selector).remove();
      var notifications = $('.notification__popup').find('.notification-item').length;
      totalNotification = notifications;
      setTotalNotificationCount(totalNotification);
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    }
  });
};

window.getCurrentUserId = function () {
  return $('.chat__person-box--active').data('id');
};

window.readNotificationWhenOpenChatWindow = function (senderId) {
  $('#owner-' + senderId).remove();
  var notifications = $('.notification__popup').find('.notification-item').length;
  totalNotification = notifications;
  setTotalNotificationCount(totalNotification);
};

$(document).on('click', '.read-all-notification', function (e) {
  e.preventDefault();

  if (!totalNotification > 0) {
    return false;
  }

  readAllNotification();
});

window.readAllNotification = function (notificationId, selector) {
  $.ajax({
    type: 'get',
    url: '/notification/read-all',
    success: function success(data) {
      var senderIds = data.data.sender_ids;
      $.each(senderIds, function (index, val) {
        $("#user-" + val).find('.chat__person-box-count').text(0).hide();
      });
      totalNotification = 0;
      setTotalNotificationCount(totalNotification);
      $('.notification__popup').find('.notification-item').remove();
      displayToastr('Success', 'success', data.message);
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    }
  });
};

/***/ }),

/***/ 2:
/*!***************************************************!*\
  !*** multi ./resources/assets/js/notification.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp\www\infy-chat\resources\assets\js\notification.js */"./resources/assets/js/notification.js");


/***/ })

/******/ });