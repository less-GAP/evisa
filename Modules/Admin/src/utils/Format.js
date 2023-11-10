import moment from "moment";

export default {
  getObjValue(object, path) {
    if(!object){
      return object
    }
    return [object].concat(path.split('.')).reduce(function (a, b) {
      if(!a){
        return a;
      }
      return a[b]
    });
  },
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
  , humanFileSize(bytes, si = false, dp = 1) {
    const thresh = si ? 1000 : 1024;

    if (Math.abs(bytes) < thresh) {
      return bytes + ' B';
    }

    const units = si
      ? ['kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
      : ['KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
    let u = -1;
    const r = 10 ** dp;

    do {
      bytes /= thresh;
      ++u;
    } while (Math.round(Math.abs(bytes) * r) / r >= thresh && u < units.length - 1);


    return bytes.toFixed(dp) + ' ' + units[u];
  }
}
