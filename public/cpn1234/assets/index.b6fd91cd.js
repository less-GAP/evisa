import{p as N,k as $,r as n,o as _,v as A,w as a,a as e,d as m,Z as B,A as p,c as g,_ as L,F as V,b as E,u as M,n as O,g as z,e as c,t as C,z as b,i as T}from"./index.7ddb33e0.js";import"./InputUpload.vue_vue_type_script_lang.1043165f.js";import{D as H}from"./DataTable.d1348dd9.js";const R={__name:"FormUser",props:{value:Object},emits:["success","cancel"],setup(y,{emit:o}){const f=y,u={required:"${label} is required!",types:{email:"${label} is not a valid email!",number:"${label} is not a valid number!"},number:{range:"${label} must be between ${min} and ${max}"}},t=N(!1),s=$(f.value||{isNew:!0,full_name:"",username:"",email:"",role:"user",password:""}),l=$({validateTrigger:"submit","label-align":"top",model:s,labelCol:{span:24},wrapperCol:{span:24},"validate-messages":u}),v=async function(){t.value=!0;const h=await p.post("user",s.value);o("success",h.data)},U=function(){o("cancel")};return(h,i)=>{const k=n("a-input"),d=n("a-form-item"),w=n("a-radio"),S=n("a-radio-group"),q=n("LockOutlined"),D=n("a-input-password"),x=n("a-button"),F=n("a-space"),P=n("a-form");return _(),A(P,B(l,{onFinish:v}),{default:a(()=>[e(d,{name:"full_name",label:"Full Name",rules:[{required:!0}]},{default:a(()=>[e(k,{value:s.full_name,"onUpdate:value":i[0]||(i[0]=r=>s.full_name=r)},null,8,["value"])]),_:1}),e(d,{name:"email",label:"Email",rules:[{type:"email",required:!0}]},{default:a(()=>[e(k,{value:s.email,"onUpdate:value":i[1]||(i[1]=r=>s.email=r)},null,8,["value"])]),_:1}),e(d,{label:"Role",name:"role"},{default:a(()=>[e(S,{value:s.role,"onUpdate:value":i[2]||(i[2]=r=>s.role=r)},{default:a(()=>[e(w,{value:"user",name:"type"},{default:a(()=>[m("User")]),_:1}),e(w,{value:"admin",name:"type"},{default:a(()=>[m("Admin")]),_:1})]),_:1},8,["value"])]),_:1}),e(d,{label:"Password",name:"password",rules:[{required:!0,message:"Please input your password!"}]},{default:a(()=>[e(D,{value:s.password,"onUpdate:value":i[3]||(i[3]=r=>s.password=r)},{prefix:a(()=>[e(q,{class:"site-form-item-icon"})]),_:1},8,["value"])]),_:1}),e(d,null,{default:a(()=>[e(F,null,{default:a(()=>[e(x,{loading:t.value,type:"primary","html-type":"submit"},{default:a(()=>[m("Submit")]),_:1},8,["loading"]),e(x,{onClick:U,"html-type":"button"},{default:a(()=>[m("Cancel")]),_:1})]),_:1})]),_:1})]),_:1},16)}}},j=["src","alt"],Z={class:"pl-3 float-left"},G={class:"text-base font-semibold"},I={class:"font-normal text-gray-500"},J={key:0,class:"flex items-center"},K=c("div",{class:"h-2.5 w-2.5 rounded-full bg-red-500 mr-2"},null,-1),Q={key:1,class:"flex items-center"},W=c("div",{class:"h-2.5 w-2.5 rounded-full bg-green-500 mr-2"},null,-1),ae={__name:"index",setup(y){const o=N({visible:!1,value:null,success:()=>{},cancel:()=>{}}),f={api:u=>p.get("customer/list",{params:u}),itemActions:[],columns:[{title:"Nh\xF3m kh\xE1ch h\xE0ng",key:"customer_group_name"},{title:"T\xEAn \u0111\u0103ng nh\u1EADp",key:"username"},{title:"T\xEAn",key:"name"},{title:"Email",key:"email"},{title:"\u0110i\u1EC7n tho\u1EA1i",key:"phone"},{title:"Ng\xE0y x\xE1c nh\u1EADn",key:"email_verified_at"},{title:"M\xE3 gi\u1EDBi thi\u1EC7u",key:"referral_code"},{title:"T\xECnh tr\u1EA1ng",key:"status"}],selectionActions:[{title:"Ho\u1EA1t \u0111\u1ED9ng",action(u){return p.post("customer/activeList",{items:u,status:"A"}).then(t=>{T[t.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:t.data.message})})}},{title:"T\u1EAFt",action(u){return p.post("customer/activeList",{items:u,status:"D"}).then(t=>{T[t.data.code==0?"error":"success"]({message:"Th\xF4ng b\xE1o",description:t.data.message})})}}]};return(u,t)=>{const s=n("a-modal");return _(),g(V,null,[e(L,null,{default:a(()=>[e(E,null,{default:a(()=>[e(M(H),O(z(f)),{"cell[full_name]":a(({item:l,column:v})=>[c("img",{class:"w-10 h-10 float-left rounded-full",src:l.profile_photo_url,alt:l.full_name},null,8,j),c("div",Z,[c("div",G,C(l.full_name),1),c("div",I,C(l.email),1)])]),"cell[status]":a(({item:l,column:v})=>[l.status=="D"?(_(),g("div",J,[K,m(" T\u1EAFt ")])):b("",!0),l.status=="A"?(_(),g("div",Q,[W,m(" Ho\u1EA1t \u0111\u1ED9ng ")])):b("",!0)]),_:1},16)]),_:1})]),_:1}),e(s,{footer:null,width:"800px",open:o.value.visible,"onUpdate:open":t[2]||(t[2]=l=>o.value.visible=l)},{default:a(()=>[o.value.visible?(_(),A(R,{key:0,onSuccess:t[0]||(t[0]=l=>{u.isShowModal=!1,o.value.reload()}),onCancel:t[1]||(t[1]=l=>o.value.visible=!1),value:o.value.value},null,8,["value"])):b("",!0)]),_:1},8,["open"])],64)}}};export{ae as default};
