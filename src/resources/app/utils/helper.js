import store from "../store"
import * as _ from "lodash"

export default {
  displayErrors(error) {
    console.error(error);

    if (Array.isArray(error.errors)) {
      if (error.errors.length > 0) {
        _.forEach(error.errors, (value, key) => {
          value.forEach((val) => {
            this.alert(val)
          })
        })
        return
      }
    }

    if (_.isString(error)) {
      this.alert(error)
      return
    }

    this.alert(error.message)
    return
  },
  alert(message, timeout = 3000, backgroundColor = "gray-800", textColor = "white") {
    store.dispatch("ADD_TOAST", {
      message,
      backgroundColor,
      timeout,
      textColor,
    })
  }
}