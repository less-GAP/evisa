import{r as u,v as _,w as o,_ as v,o as l,a,u as c,a7 as T,n as A,g as C,h as g,X as B,z as D,d,t as N,c as f,b as w,e as k,A as r,f as h,m as b,i as m}from"./index.bfd5160c.js";import"./InputUploadGetPath.vue_vue_type_script_lang.f59caf96.js";import{D as L}from"./DataTable.4852cd42.js";import{F as V}from"./FormOutlined.41ed6b82.js";const O={key:0,class:"flex items-center"},S=k("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),z={key:1,class:"flex items-center"},F=k("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),M={__name:"index",setup(H){const x={api:e=>r.get("customer-group/list",{params:e}),addAction:e=>{h.push("/customer-group/0")},itemActions:[{label:"",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",icon:b,key:"edit",action(e,t){h.push("/customer-group/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:b,key:"delete",action(e,t){r.delete("customer-group/"+e.id).then(i=>{m[i.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:i.data.message})}).finally(()=>{t()})}}],columns:[{title:"T\xEAn nh\xF3m",key:"name"},{title:"T\xECnh tr\u1EA1ng",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(e){return r.post("customer-group/activeList",{items:e,status:"A"}).then(t=>{m[t.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:t.data.message})})}},{title:"T\u1EAFt",action(e){return r.post("customer-group/activeList",{items:e,status:"D"}).then(t=>{m[t.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:t.data.message})})}}]};return(e,t)=>{const i=u("SectionTitleLineWithButton"),p=u("a-button"),y=u("a-popconfirm");return l(),_(v,null,{default:o(()=>[a(w,null,{default:o(()=>[a(i,{icon:c(T),title:"User Management",main:""},null,8,["icon"]),a(c(L),A(C(x)),{"cellAction[delete]":o(({item:n,actionMethod:s})=>[a(y,{title:"Are you sure delete this user?","ok-text":"Yes","cancel-text":"No",onConfirm:s},{default:o(()=>[n.role!=="admin"?(l(),_(p,{key:0,type:"text",danger:"",icon:g(c(B)),label:"",outline:!0},null,8,["icon"])):D("",!0)]),_:2},1032,["onConfirm"])]),"cellAction[edit]":o(({item:n,actionMethod:s})=>[a(p,{type:"text",icon:g(c(V)),label:"",outline:!0,onClick:s},null,8,["icon","onClick"])]),"cell[full_name]":o(({item:n,column:s})=>[d(N(n.name),1)]),"cell[status]":o(({item:n,column:s})=>[n.status=="D"?(l(),f("div",O,[S,d(" T\u1EAFt ")])):(l(),f("div",z,[F,d(" Ho\u1EA1t \u0111\u1ED9ng ")]))]),_:1},16)]),_:1})]),_:1})}}};export{M as default};