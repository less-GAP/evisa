import{p as h,r as n,v as i,w as a,n as x,g as b,u as r,o as c,a as y,h as k,a1 as v,z as g,e as l,t as d,d as A,A as m,f as u,m as C}from"./index.7ddb33e0.js";import"./InputUpload.vue_vue_type_script_lang.1043165f.js";import{D}from"./DataTable.d1348dd9.js";const N=["src","alt"],w={class:"pl-3 float-left"},B={class:"text-base font-semibold"},T={class:"font-normal text-gray-500"},V=l("div",{class:"flex items-center"},[l("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"}),A(" Offline ")],-1),U={__name:"indexTemplates",setup(z){h({visible:!1,value:null,success:()=>{},cancel:()=>{}});const p={api:e=>m.get("email-template/list",{params:e}),addAction:e=>{u.push("/email/templates/form/")},itemActions:[{label:"Edit",key:"edit",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",action(e,o){u.push("/email/templates/form/"+e.id)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:C,key:"delete",action(e,o){m.delete("email-template/"+e.id).then(o)}}],columns:[{title:"Title",key:"email_title"},{title:"Status",key:"status"},{title:"Updated By",key:"updated_by"},{title:"Updated At",key:"updated_at"}],selectionActions:[]};return(e,o)=>{const _=n("a-button"),f=n("a-popconfirm");return c(),i(r(D),x(b(p)),{"cellAction[delete]":a(({item:t,actionMethod:s})=>[y(f,{title:"Are you sure?","ok-text":"Yes","cancel-text":"No",onConfirm:s},{default:a(()=>[t.role!=="admin"?(c(),i(_,{key:0,type:"text",danger:"",icon:k(r(v)),label:"",outline:!0},null,8,["icon"])):g("",!0)]),_:2},1032,["onConfirm"])]),"cell[full_name]":a(({item:t,column:s})=>[l("img",{class:"w-10 h-10 float-left rounded-full",src:t.profile_photo_url,alt:t.full_name},null,8,N),l("div",w,[l("div",B,d(t.full_name),1),l("div",T,d(t.email),1)])]),"cell[status]":a(()=>[V]),_:1},16)}}};export{U as default};
