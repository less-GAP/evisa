import Api from "@/utils/Api";
import {notification} from "ant-design-vue";

export function UseEloquentRouter(prefix,options={}) {
  const fetchListApi = function (params) {
    return Api.get(prefix + '/list', {params:{...options,...params}})
  };

  const fetchDetailApi = function (id) {
    return Api.get(prefix + '/' + id)
  };
  const createApi = function (params) {
    return Api.post(prefix, params)
  };
  const updateApi = function (id, params) {
    return Api.put(prefix + '/' + id, params)
  };
  const deleteApi = function (id) {
    return Api.delete(prefix + '/' + id)
  };
  return {
    fetchListApi,
    fetchDetailApi,
    createApi,
    deleteApi,
    updateApi
  }
}
