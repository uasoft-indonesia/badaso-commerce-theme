import resource from "../../../../../../core/src/resources/js/api/resource";

let apiPrefix = process.env.MIX_API_ROUTE_PREFIX
  ? "/" + process.env.MIX_API_ROUTE_PREFIX
  : "/badaso-api";

export default {
  user() {
    return resource.get(apiPrefix + "/v1/auth/user");
  },
};
