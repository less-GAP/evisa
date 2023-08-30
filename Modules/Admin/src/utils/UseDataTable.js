export function UseDataTable(fetchListApi, _tableConfig = {}) {
  const tableConfig = {
    api: fetchListApi,
    filter: {..._tableConfig.filter},
    columns:  _tableConfig.columns?_tableConfig.columns:[],
    config: {
      columns: [],
      sticky: true,
      selectionColumn: true,
      actionColumn: true,
      scroll: "{ x: 1500, y: 300 }",
      bordered: true,
      showHeader: true,
      ..._tableConfig.config
    },
    listActions: _tableConfig.listActions?_tableConfig.listActions:[],
    itemActions: _tableConfig.itemActions?_tableConfig.itemActions:[],

  }
  return tableConfig
}
