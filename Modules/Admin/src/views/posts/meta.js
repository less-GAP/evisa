import Api from "@/utils/Api";
import router from "@/router";
import {mdiDelete} from "@mdi/js";
import {notification} from "ant-design-vue";

const prefix = 'post'
const fetchApi = function (params) {
  return Api.get(prefix + '/list', {params})
};
const tableConfig = {
  tableConfig: {
    sticky: true,
    scroll: "{ x: 1500, y: 300 }",
    bordered: true,
    showHeader: true
  },
  api: fetchApi,
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
        Api.delete(prefix+'/' + item.id).then(rs => {
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
      render({item,column}){
        return 'hello world!'
      }
    },
    {
      title: 'Loại sản phẩm',
      key: 'type'
    },
    {
      title: 'Tên sản phẩm',
      key: 'name'
    },
    {
      title: 'Giá niêm yết',
      key: 'price',
      align: 'right',
    },
    {
      title: 'Giá sản phẩm',
      key: 'price',
      align: 'right',
    },
    {
      title: 'Điểm thưởng(Point)',
      key: 'point',
      align: 'right',
    },
    {
      title: 'Tình trạng',
      key: 'status'
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

export {
  fetchApi ,
  tableConfig
}
