import moment from "moment";

export default {

  formatMoney: function (value, defaultValue = '-', symbol = ' đ', locale = 'vi-VN') {
    if (!value) {
      return defaultValue
    }
    value = parseFloat(value)

    return Number((value).toFixed(0)).toLocaleString(locale) + ' ' + symbol
  },

  formatNumber: function (value, defaultValue = '-', locale = 'vi-VN') {
    if (!value) {
      return defaultValue
    }
    value = parseInt(value)

    return Number((value).toFixed(0)).toLocaleString(locale)
  },

  truncate: function (str, n) {
    if (str.length > n) {
      return str.substring(0, n) + "...";
    } else {
      return str;
    }
  },

  formatPercent: function (value, defaultValue = '-',) {
    if (!value) {
      return defaultValue
    }
    value = parseInt(value)

    return value + '%'
  },

  formatDateTime: function (value, defaultValue = '-') {
    if (!value) {
      return defaultValue
    }
    return moment(value).format("HH:mm DD/MM/YYYY")
  },

  formatDate: function (value, defaultValue = '-') {
    if (!value) {
      return defaultValue
    }
    return moment(value).format("DD/MM/YYYY")
  }

}
