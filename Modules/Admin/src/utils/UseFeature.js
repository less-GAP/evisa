import router from "@/router";
import {UseDataTable} from "@/utils/UseDataTable";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {formConfig} from "@/config";

export function UseFeature(prefix, options = {}) {
  const routerPath = '/' + prefix
  const {
    fetchListApi,
    fetchDetailApi,
    createApi,
    deleteApi,
    updateApi
  } = UseEloquentRouter(prefix)
  const tableConfig = UseDataTable(fetchListApi, options)
  const defaultNewValue = {...options.newModel}
  const back = () => {
    router.replace('/' + prefix);
  };
  return {
    back,
    routerPath,
    formConfig,
    defaultNewValue,
    tableConfig,
    fetchListApi,
    fetchDetailApi,
    createApi,
    deleteApi,
    updateApi
  }
}
