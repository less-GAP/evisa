import {UseFeature} from "@/utils/UseFeature";

const prefix = 'country'
const {
  back,
  routerPath,
  defaultNewValue,
  createApi,
  updateApi,
  formConfig,
  fetchListApi,
  fetchDetailApi,
  tableConfig
} = UseFeature(prefix, {
  tableConfig: {
    selectionColumn: false,
    actionColumn: false,
  },
  columns: [
    {
      title: 'Hình ảnh',
      key: 'image',
      width: '100px'
    },
    {
      title: 'Name',
      key: 'name',

    },
    {
      title: 'Code',
      key: 'code',
    },
    {
      title: 'Status',
      key: 'status',
      width: 100

    },
  ],
  newModel: {
    content: '',
    type: 'post',
    tags: []
  }
})
export {
  back,
  routerPath,
  defaultNewValue,
  createApi,
  updateApi,
  formConfig,
  fetchListApi,
  fetchDetailApi,
  tableConfig
}
