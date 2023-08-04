import{r as D,a as h,b as o,o as _,c as w,w as a,d as l,e as m,m as E,A as r,f as F,_ as L,F as P,g as V,h as M,u as y,i as R,n as T,j,k as z,D as Y,l as A,p as c,t as U,q as G,s as H,v as I}from"./index.6dbccf15.js";import{D as J}from"./DataTable.7accfe93.js";const K={__name:"FormUser",props:{value:Object},emits:["success","cancel"],setup(x,{emit:n}){const p=x,f={required:"${label} is required!",types:{email:"${label} is not a valid email!",number:"${label} is not a valid number!"},number:{range:"${label} must be between ${min} and ${max}"}},t=D(!1),e=h(p.value||{isNew:!0,full_name:"",username:"",email:"",role:"user",password:""}),v=h({validateTrigger:"submit","label-align":"top",model:e,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":f}),b=async function(){t.value=!0;const s=await r.post("user",e.value);n("success",s.data)},g=function(){n("cancel")};return(s,u)=>{const k=o("a-input"),d=o("a-form-item"),C=o("a-radio"),N=o("a-radio-group"),S=o("LockOutlined"),q=o("a-input-password"),$=o("a-button"),O=o("a-space"),B=o("a-form");return _(),w(B,E(v,{onFinish:b}),{default:a(()=>[l(d,{name:"full_name",label:"Full Name",rules:[{required:!0}]},{default:a(()=>[l(k,{value:e.full_name,"onUpdate:value":u[0]||(u[0]=i=>e.full_name=i)},null,8,["value"])]),_:1}),l(d,{name:"email",label:"Email",rules:[{type:"email",required:!0}]},{default:a(()=>[l(k,{value:e.email,"onUpdate:value":u[1]||(u[1]=i=>e.email=i)},null,8,["value"])]),_:1}),l(d,{label:"Role",name:"role"},{default:a(()=>[l(N,{value:e.role,"onUpdate:value":u[2]||(u[2]=i=>e.role=i)},{default:a(()=>[l(C,{value:"user",name:"type"},{default:a(()=>[m("User")]),_:1}),l(C,{value:"admin",name:"type"},{default:a(()=>[m("Admin")]),_:1})]),_:1},8,["value"])]),_:1}),l(d,{label:"Password",name:"password",rules:[{required:!0,message:"Please input your password!"}]},{default:a(()=>[l(q,{value:e.password,"onUpdate:value":u[3]||(u[3]=i=>e.password=i)},{prefix:a(()=>[l(S,{class:"site-form-item-icon"})]),_:1},8,["value"])]),_:1}),l(d,null,{default:a(()=>[l(O,null,{default:a(()=>[l($,{loading:t.value,type:"primary","html-type":"submit"},{default:a(()=>[m("Submit")]),_:1},8,["loading"]),l($,{onClick:g,"html-type":"button"},{default:a(()=>[m("Cancel")]),_:1})]),_:1})]),_:1})]),_:1},16)}}},Q=["src","alt"],W={class:"pl-3 float-left"},X={class:"text-base font-semibold"},Z={class:"font-normal text-gray-500"},ee=c("div",{class:"flex items-center"},[c("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"}),m(" Offline ")],-1),ae={__name:"index",setup(x){const n=D({visible:!1,value:null,success:()=>{},cancel:()=>{}});function p(t,e){n.value.visible=!0,n.value.value=t,n.value.success=e}const f={api:t=>r.get("user/list",{params:t}),addAction:t=>{p(null,t)},itemActions:[{label:"View",key:"view",icon:G,class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",action(t,e){H.push("/users/"+t.id)}},{label:"Edit User",key:"edit",class:"font-medium text-blue-600 dark:text-blue-500 hover:underline",action(t,e){p(t,e)}},{label:"",class:"font-medium text-red-600 dark:text-red-500 hover:underline",icon:I,key:"delete",action(t,e){r.delete("user/"+t.id).then(e)}}],columns:[{title:"Name",key:"full_name"},{title:"Role",key:"role"},{title:"Status",key:"status"}],selectionActions:[{title:"Active",action(t){return r.post("user/activeList",t)},complete(){alert("success")}},{title:"DeActive",action(t){return r.post("user/activeList",t)},complete(){alert("success")}},{title:"Delete",action(t){return r.post("user/deleteList",t)},complete(){alert("success")}}]};return(t,e)=>{const v=o("a-button"),b=o("a-popconfirm"),g=o("a-modal");return _(),F(P,null,[l(L,null,{default:a(()=>[l(V,null,{default:a(()=>[l(M,{icon:y(R),title:"User Management",main:""},null,8,["icon"]),l(y(J),T(j(f)),{"cellAction[delete]":a(({item:s,actionMethod:u})=>[l(b,{title:"Are you sure delete this user?","ok-text":"Yes","cancel-text":"No",onConfirm:u},{default:a(()=>[s.role!=="admin"?(_(),w(v,{key:0,type:"text",danger:"",icon:z(y(Y)),label:"",outline:!0},null,8,["icon"])):A("",!0)]),_:2},1032,["onConfirm"])]),"cell[full_name]":a(({item:s,column:u})=>[c("img",{class:"w-10 h-10 float-left rounded-full",src:s.profile_photo_url,alt:s.full_name},null,8,Q),c("div",W,[c("div",X,U(s.full_name),1),c("div",Z,U(s.email),1)])]),"cell[status]":a(()=>[ee]),_:1},16)]),_:1})]),_:1}),l(g,{footer:null,width:"800px",open:n.value.visible,"onUpdate:open":e[2]||(e[2]=s=>n.value.visible=s)},{default:a(()=>[n.value.visible?(_(),w(K,{key:0,onSuccess:e[0]||(e[0]=s=>{t.isShowModal=!1,n.value.reload()}),onCancel:e[1]||(e[1]=s=>n.value.visible=!1),value:n.value.value},null,8,["value"])):A("",!0)]),_:1},8,["open"])],64)}}};export{ae as default};