import{r as d,c as f,a as l,w as o,_ as y,F as x,o as b,b as k,u as c,n as w,g as v,h as C,d as i,t as s,e as m,A as r,f as p,m as I,i as u}from"./index.bfd5160c.js";import"./InputUploadGetPath.vue_vue_type_script_lang.f59caf96.js";import{D as T}from"./DataTable.4852cd42.js";import{F as A}from"./FormOutlined.41ed6b82.js";const $={controls:""},D=["src"],P={__name:"index",setup(M){const h={tableConfig:{sticky:!0,scroll:"{ x: 1500, y: 300 }",bordered:!0,showHeader:!0},api:t=>r.get("orders/list",{params:t}),addAction:t=>{p.push("/orders/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:I,key:"edit",action(t,a){p.push("/orders/"+t.id)}}],columns:[{title:"M\xE3 \u0111\u01A1n h\xE0ng",key:"id",dataIndex:"id",width:"120px"},{title:"Kh\xE1ch h\xE0ng",key:"customer_name",dataIndex:"customer_name",width:"200px"},{title:"\u0110i\u1EC7n tho\u1EA1i",key:"customer_phone",dataIndex:"customer_phone",width:"160px"},{title:"V\u1EADn chuy\u1EC3n",key:"shipping",dataIndex:"shipping",width:"250px"},{title:"Thanh to\xE1n",key:"payment",dataIndex:"payment",width:"250px"},{title:"Th\xE0nh ti\u1EC1n",key:"subtotal",dataIndex:"subtotal",width:"150px",align:"right"},{title:"Ph\xED v\u1EADn chuy\u1EC3n",key:"shipping_cost",dataIndex:"shipping_cost",width:"150px",align:"right"},{title:"Gi\u1EA3m gi\xE1",key:"discount",dataIndex:"discount",width:"150px",align:"right"},{title:"T\u1ED5ng ti\u1EC1n",key:"total",dataIndex:"total",width:"150px",align:"right",fixed:"left"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(t){return r.post("orders/activeList",{items:t,status:"A"}).then(a=>{u[a.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:a.data.message})})}},{title:"T\u1EAFt",action(t){return r.post("orders/activeList",{items:t,status:"D"}).then(a=>{u[a.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:a.data.message})})}}]};return(t,a)=>{const g=d("a-button"),_=d("a-modal");return b(),f(x,null,[l(y,null,{default:o(()=>[l(k,null,{default:o(()=>[l(c(T),w(v(h)),{"cellAction[edit]":o(({item:e,actionMethod:n})=>[l(g,{type:"text",icon:C(c(A)),label:"",outline:!0,onClick:n},null,8,["icon","onClick"])]),"cell[id]":o(({item:e,column:n})=>[i(" #"+s(e.id),1)]),"cell[shipping]":o(({item:e,column:n})=>[i(s(e.shipping_name),1)]),"cell[payment]":o(({item:e,column:n})=>[i(s(e.payment_name),1)]),"cell[subtotal]":o(({item:e,column:n})=>[i(s(t.$format.formatMoney(e.subtotal)),1)]),"cell[shipping_cost]":o(({item:e,column:n})=>[i(s(t.$format.formatMoney(e.shipping_cost)),1)]),"cell[discount]":o(({item:e,column:n})=>[i(s(t.$format.formatMoney(e.discount)),1)]),"cell[total]":o(({item:e,column:n})=>[i(s(t.$format.formatMoney(e.total)),1)]),_:1},16)]),_:1})]),_:1}),l(_,{open:t.previewVisible,title:t.previewTitle,footer:null,onCancel:t.handleCancel},{default:o(()=>[m("video",$,[m("source",{src:t.previewUrl},null,8,D)])]),_:1},8,["open","title","onCancel"])],64)}}};export{P as default};
