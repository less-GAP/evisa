import{r as d,c as m,a,w as n,_ as x,F as C,o as u,b as T,u as p,n as w,g as A,h as _,a1 as D,e as l,d as c,t as g,A as r,f,m as y,i as h}from"./index.e9f28c59.js";import"./InputUpload.vue_vue_type_script_lang.0f5c8a09.js";import{D as B}from"./DataTable.7d2f9362.js";import{F}from"./FormOutlined.0442b15f.js";const N=["src","alt"],V={key:0,class:"flex items-center"},H=l("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),M={key:1,class:"flex items-center"},P=l("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),$={controls:""},L=["src"],U={__name:"index",setup(O){const b={api:e=>r.get("shipping-method/list",{params:e}),addAction:e=>{f.push("/shipping-method/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:y,key:"edit",action(e,o){f.push("/shipping-method/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:y,key:"delete",action(e,o){r.delete("shipping-method/"+e.id).then(i=>{h[i.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:i.data.message})}).finally(()=>{o()})}}],columns:[{title:"H\xECnh \u0111\u1EA1i di\u1EC7n",key:"image"},{title:"M\xE3 ph\u01B0\u01A1ng th\u1EE9c",key:"code"},{title:"T\xEAn ph\u01B0\u01A1ng th\u1EE9c",key:"name"},{title:"Ph\xED v\u1EADn chuy\u1EC3n",key:"cost"},{title:"M\xF4 t\u1EA3 ng\u1EAFn",key:"short_description"},{title:"T\xECnh tr\u1EA1ng",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(e){return r.post("shipping-method/activeList",{items:e,status:"A"}).then(o=>{h[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message})})}},{title:"T\u1EAFt",action(e){return r.post("shipping-method/activeList",{items:e,status:"D"}).then(o=>{h[o.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:o.data.message})})}}]};return(e,o)=>{const i=d("a-button"),k=d("a-popconfirm"),v=d("a-modal");return u(),m(C,null,[a(x,null,{default:n(()=>[a(T,null,{default:n(()=>[a(p(B),w(A(b)),{"cellAction[delete]":n(({item:t,actionMethod:s})=>[a(k,{title:"B\u1EA1n mu\u1ED1n x\xF3a ph\u01B0\u01A1ng th\u1EE9c v\u1EADn chuy\u1EC3n n\xE0y?","ok-text":"Yes","cancel-text":"No",onConfirm:s},{default:n(()=>[a(i,{type:"text",danger:"",icon:_(p(D)),label:"",outline:!0},null,8,["icon"])]),_:2},1032,["onConfirm"])]),"cellAction[edit]":n(({item:t,actionMethod:s})=>[a(i,{type:"text",icon:_(p(F)),label:"",outline:!0,onClick:s},null,8,["icon","onClick"])]),"cell[image]":n(({item:t,column:s})=>[l("img",{class:"w-20 h-auto float-left rounded-full",src:t.image_url,alt:t.name},null,8,N)]),"cell[name]":n(({item:t,column:s})=>[c(g(t.name),1)]),"cell[cost]":n(({item:t,column:s})=>[c(g(e.$format.formatMoney(t.cost)),1)]),"cell[status]":n(({item:t,column:s})=>[t.status=="D"?(u(),m("div",V,[H,c(" T\u1EAFt ")])):(u(),m("div",M,[P,c(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)]),_:1})]),_:1}),a(v,{open:e.previewVisible,title:e.previewTitle,footer:null,onCancel:e.handleCancel},{default:n(()=>[l("video",$,[l("source",{src:e.previewUrl},null,8,L)])]),_:1},8,["open","title","onCancel"])],64)}}};export{U as default};
