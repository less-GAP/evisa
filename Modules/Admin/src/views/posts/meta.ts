import Api from "@/utils/Api";
import router from "@/router";
import {formConfig} from "@/config";
import {mdiDelete} from "@mdi/js";
import {notification} from "ant-design-vue";

const prefix = 'post'
const fetchListApi = function (params) {
  return Api.get(prefix + '/list', {params})
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
const tableConfig = {
  tableConfig: {
    sticky: true,
    scroll: "{ x: 1500, y: 300 }",
    bordered: true,
    showHeader: true
  },
  api: fetchListApi,
  addAction: (reload) => {
    //showEditUser({}, reload)
    router.push('/' + prefix + '/new')
  },
  itemActions: [
    {
      label: '',
      class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
      icon: mdiDelete,
      key: 'edit',
      action(item, reload) {
        router.push('/' + prefix + '/' + item.id)
      }
    },
    {
      label: '',
      class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
      icon: mdiDelete,
      key: 'delete',
      action(item, reload) {
        Api.delete(prefix + '/' + item.id).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });
        }).finally(() => {
          reload();
        });
      }
    }

  ],
  columns: [
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
      title: 'Tags',
      key: 'tags',
      width: '150px'

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
  ],
  selectionActions: [
    {
      title: 'Hoạt động',
      action(selectedKeys) {
        return Api.post('product/activeList', {
          'items': selectedKeys,
          'status': 'A'
        }).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });
        })
      },
      // complete() {
      //   alert('success')
      // }
    },
    {
      title: 'Tắt',
      action(selectedKeys) {
        return Api.post('product/activeList', {
          'items': selectedKeys,
          'status': 'D'
        }).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });
        })
      },
      // complete() {
      //   alert('success')
      // }
    },
    // {
    //   title: 'Delete',
    //   action(selectedKeys) {
    //     return Api.post('user/deleteList', selectedKeys)
    //   },
    //   complete() {
    //     alert('success')
    //   }
    // }
  ]
}
const defaultNewValue = {
  content: '',
  type: 'post',
  tags: []
}
const back = () => {
  router.push('/'+prefix);
};
const routerPath = '/'+prefix

export {
  routerPath,
  back,
  defaultNewValue,
  createApi,
  updateApi,
  formConfig,
  fetchListApi,
  fetchDetailApi,
  tableConfig
}
