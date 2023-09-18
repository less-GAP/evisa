import router from "@/router";
import {UseFeature} from "@/utils/UseFeature";

const prefix = 'post'

const itemActions = [{
  label: 'Edit',
  action: (item,reload) => {
    //showEditUser({}, reload)
    router.replace('/' + prefix + '/'+item.id)
  }
}]
const listActions = [
  {
    label: 'Add',
    action: (reload) => {
      //showEditUser({}, reload)
      router.replace('/' + prefix + '/new')
    }
  }
]
const columns = [
  {
    title: 'Hình ảnh',
    key: 'image',
    width: '100px'
  },
  {
    title: 'Title',
    key: 'title',

  },

  {
    title: 'Loại',
    key: 'type',
    width: 100
  },

  {
    title: 'Publish',
    key: 'status',
    width: 100

  },
  {
    title: 'Created at',
    key: 'created_at',
    width: 200
  },
]
const newModel = {
  content: '',
  type: 'post',
  tags: [],
  categories: []
}

const {
  back,
  formConfig,
  fetchListApi,
  fetchDetailApi,
  createApi,
  deleteApi,
  updateApi,
  routerPath,
  tableConfig
} = UseFeature(prefix, {
  columns,
  listActions,
  itemActions,
  newModel
})
export {
  back,
  routerPath,
  newModel,
  fetchListApi,
  fetchDetailApi,
  createApi,
  deleteApi,
  updateApi,
  formConfig,
  tableConfig
}
