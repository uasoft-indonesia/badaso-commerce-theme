import resource from "../../../../../../core/src/resources/js/api/resource";
import QueryString from "../../../../../../core/src/resources/js/api/query-string";

let apiPrefix = process.env.MIX_API_ROUTE_PREFIX
  ? "/" + process.env.MIX_API_ROUTE_PREFIX + "/module/commerce"
  : "/badaso-api/module/commerce";

export default {
  browse(data = {}) {
    let ep = apiPrefix + "/v1/review/public";
    let qs = QueryString(data);
    let url = ep + qs;
    return resource.get(url);
  },

  read(data = {}) {
    let ep = apiPrefix + "/v1/review/public/read";
    let qs = QueryString(data);
    let url = ep + qs;
    return resource.get(url);
  },

  submit(data) {
    let ep = apiPrefix + "/v1/review/public/submit";
    return resource.post(ep, data);
  },
};
