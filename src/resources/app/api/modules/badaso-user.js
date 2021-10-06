import resource from "../../../../../../core/src/resources/js/api/resource";

let apiPrefix = process.env.MIX_API_ROUTE_PREFIX
  ? "/" + process.env.MIX_API_ROUTE_PREFIX + "/module/commerce"
  : "/badaso-api/module/commerce";

export default {
  edit(data) {
    let ep = apiPrefix + "/v1/user/public/edit";
    return resource.put(ep, data);
  },

  changePassword(data) {
    let ep = apiPrefix + "/v1/user/public/change";
    return resource.post(ep, data);
  }
};
