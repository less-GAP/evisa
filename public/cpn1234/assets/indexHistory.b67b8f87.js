import{p as g,r as n,c as C,a as i,w as o,F as U,o as u,u as m,n as w,g as N,v as p,h as B,a1 as D,z as _,e as s,t as f,d as E,A as v,m as F}from"./index.e9f28c59.js";import"./InputUpload.vue_vue_type_script_lang.0f5c8a09.js";import{D as S}from"./DataTable.7d2f9362.js";const T=["src","alt"],V={class:"pl-3 float-left"},z={class:"text-base font-semibold"},L={class:"font-normal text-gray-500"},O=s("div",{class:"flex items-center"},[s("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"}),E(" Offline ")],-1),Y={__name:"indexHistory",setup(P){const t=g({visible:!1,value:null,success:()=>{},cancel:()=>{}});function d(l,e){t.value.visible=!0,t.value.value=l,t.value.success=e}const y={api:l=>v.get("email-template/list",{params:l}),addAction:l=>{d(null,l)},itemActions:[{label:"Edit",key:"edit",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",action(l,e){d(l,e)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:F,key:"delete",action(l,e){v.delete("email-template/"+l.id).then(e)}}],columns:[{title:"Name",key:"name"},{title:"Type",key:"type"},{title:"Status",key:"status"},{title:"Title",key:"email_title"},{title:"Updated By",key:"updated_by"},{title:"Updated At",key:"updated_at"}],selectionActions:[]};return(l,e)=>{var r;const b=n("a-button"),k=n("a-popconfirm"),x=n("LayoutAuthenticated"),h=n("FormUser"),A=n("a-modal");return u(),C(U,null,[i(x,null,{default:o(()=>[i(m(S),w(N(y)),{"cellAction[delete]":o(({item:a,actionMethod:c})=>[i(k,{title:"Are you sure delete this user?","ok-text":"Yes","cancel-text":"No",onConfirm:c},{default:o(()=>[a.role!=="admin"?(u(),p(b,{key:0,type:"text",danger:"",icon:B(m(D)),label:"",outline:!0},null,8,["icon"])):_("",!0)]),_:2},1032,["onConfirm"])]),"cell[full_name]":o(({item:a,column:c})=>[s("img",{class:"w-10 h-10 float-left rounded-full",src:a.profile_photo_url,alt:a.full_name},null,8,T),s("div",V,[s("div",z,f(a.full_name),1),s("div",L,f(a.email),1)])]),"cell[status]":o(()=>[O]),_:1},16)]),_:1}),i(A,{title:(r=t.value.value)!=null&&r.id?"Edit User":"Add User",footer:null,width:"800px",open:t.value.visible,"onUpdate:open":e[2]||(e[2]=a=>t.value.visible=a)},{default:o(()=>[t.value.visible?(u(),p(h,{key:0,onSuccess:e[0]||(e[0]=a=>{t.value.visible=!1,t.value.success()}),onCancel:e[1]||(e[1]=a=>t.value.visible=!1),value:t.value.value},null,8,["value"])):_("",!0)]),_:1},8,["title","open"])],64)}}};export{Y as default};
