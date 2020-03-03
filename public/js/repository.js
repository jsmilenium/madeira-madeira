(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/repository"],{

/***/ "./resources/js/repository/repository.js":
/*!***********************************************!*\
  !*** ./resources/js/repository/repository.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var length = 0;

  function load_data() {
    var repository = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
    $.ajax({
      url: "https://api.github.com/search/repositories",
      method: "GET",
      data: {
        q: repository
      },
      dataType: "jsonp",
      success: function success(result) {
        var output = '';

        if (result.data.items != '') {
          length = result.data.items.length;

          for (var count = 0; count < result.data.items.length; count++) {
            output += '<tr>';
            output += '<td>' + result.data.items[count].name + '</td>';
            output += '<td>' + result.data.items[count].owner.login + '</td>';
            output += '<td>' + result.data.items[count].stargazers_count + '</td>';
            output += '</tr>';
          }
        } else {
          output += '<tr>';
          output += '<td colspan="6">No Data Found</td>';
          output += '</tr>';
        }

        $('tbody').html(output);
        $('#repository_table').dataTable({
          "order": [[2, "asc"]]
        });
      }
    });
  }

  $('#search').click(function () {
    var repository = $('#search_text').val();
    load_data(repository);
  });
});

/***/ }),

/***/ 1:
/*!*****************************************************!*\
  !*** multi ./resources/js/repository/repository.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\josue.silva\Documents\madeira-madeira\resources\js\repository\repository.js */"./resources/js/repository/repository.js");


/***/ })

},[[1,"/js/manifest"]]]);