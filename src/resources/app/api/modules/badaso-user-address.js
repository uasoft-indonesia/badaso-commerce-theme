import resource from "../../../../../../core/src/resources/js/api/resource";
import QueryString from "../../../../../../core/src/resources/js/api/query-string";

let apiPrefix = process.env.MIX_API_ROUTE_PREFIX
  ? "/" + process.env.MIX_API_ROUTE_PREFIX + "/module/commerce"
  : "/badaso-api/module/commerce";

export default {
  browse(data = {}) {
    let ep = apiPrefix + "/v1/user-address/public";
    let qs = QueryString(data);
    let url = ep + qs;
    return resource.get(url);
  },

  read(data) {
    let ep = apiPrefix + "/v1/user-address/public/read";
    let qs = QueryString(data);
    let url = ep + qs;
    return resource.get(url);
  },

  add(data) {
    let ep = apiPrefix + "/v1/user-address/public/add";
    return resource.post(ep, data);
  },

  edit(data) {
    let ep = apiPrefix + "/v1/user-address/public/edit";
    return resource.put(ep, data);
  },

  delete(data) {
    let paramData = {
      data: data,
    };
    return resource.delete(apiPrefix + "/v1/user-address/public/delete", paramData);
  },

  setToMain(data) {
    let ep = apiPrefix + "/v1/user-address/public/main";
    return resource.post(ep, data);
  }
};
