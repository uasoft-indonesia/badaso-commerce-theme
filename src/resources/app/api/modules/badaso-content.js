import resource from "../../../../../../core/src/resources/js/api/resource";
import QueryString from "../../../../../../core/src/resources/js/api/query-string";

let apiPrefix = process.env.MIX_API_ROUTE_PREFIX
  ? "/" + process.env.MIX_API_ROUTE_PREFIX + "/module/content"
  : "/badaso-api/module/content";

export default {
  fetch(data) {
    let ep = apiPrefix + "/v1/content/fetch";
    let qs = QueryString(data);
    let url = ep + qs;
    return resource.get(url);
  },
};
